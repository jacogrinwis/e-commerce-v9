<?php

namespace App\Livewire\Products;

use Spatie\Tags\Tag;
use App\Models\Color;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Material;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;

enum StockStatus: int
{
    case InStock = 1;
    case OnOrder = 2;
    case OutOfStock = 3;

    public function label(): string
    {
        return match ($this) {
            self::InStock => 'Op voorraad',
            self::OnOrder => 'Op bestelling',
            self::OutOfStock => 'Tijdelijk uitverkocht',
        };
    }
}

class ProductFilters extends Component
{
    public $selectedCategories = [];
    public $selectedColors = [];
    public $selectedMaterials = [];
    public $selectedTags = [];
    public $selectedStockStatuses = [];

    private function handleFilterUpdate($type, $selectedItems)
    {
        $this->{"selected{$type}"} = $selectedItems;
        $this->dispatch("apply{$type}Filter", $selectedItems);
    }

    public function updatedSelectedCategories()
    {
        $availableColors = $this->colorsWithCount()->pluck('id')->toArray();
        $availableMaterials = $this->materialsWithCount()->pluck('id')->toArray();
        $availableTags = $this->tagsWithCount()->pluck('name')->toArray();

        $this->selectedColors = array_intersect($this->selectedColors, $availableColors);
        $this->selectedMaterials = array_intersect($this->selectedMaterials, $availableMaterials);
        $this->selectedTags = array_intersect($this->selectedTags, $availableTags);

        $this->applyFilters();
    }

    #[On('updateCategorySelection')]
    public function updateCategorySelection($categories)
    {
        $this->handleFilterUpdate('Categories', $categories);
    }

    #[On('updateColorSelection')]
    public function updateColorSelection($colors)
    {
        $this->handleFilterUpdate('Colors', $colors);
    }

    #[On('updateMaterialSelection')]
    public function updateMaterialSelection($materials)
    {
        $this->handleFilterUpdate('Materials', $materials);
    }

    #[On('updateTagSelection')]
    public function updateTagSelection($tags)
    {
        $this->handleFilterUpdate('Tags', $tags);
    }

    #[On('updateStockStatusSelection')]
    public function updateStockStatusSelection($stockStatuses)
    {
        $this->handleFilterUpdate('StockStatuses', $stockStatuses);
    }

    public function applyFilters()
    {
        $this->dispatch('filtersUpdated', [
            'categories' => $this->selectedCategories,
            'colors' => $this->selectedColors,
            'materials' => $this->selectedMaterials,
            'tags' => $this->selectedTags,
            'stockStatuses' => $this->selectedStockStatuses,
        ]);
    }

    #[Computed]
    public function filterCounts()
    {
        return [
            'categories' => $this->categoriesWithCount()->count(),
            'colors' => $this->colorsWithCount()->count(),
            'materials' => $this->materialsWithCount()->count(),
            'tags' => $this->tagsWithCount()->count(),
            'stockStatuses' => $this->stockStatusesWithCount()->count(),
        ];
    }

    #[Computed]
    public function categoriesWithCount()
    {
        // return cache()->tags(['categories'])->remember(
        //     'categories_with_count',
        //     now()->addHour(),
        //     fn() => Category::withCount('products')->get()
        // );
        return cache()->remember(
            'categories_with_count',
            now()->addHour(),
            fn() => Category::withCount('products')->get()
        );
    }

    public function colorsWithCount()
    {
        $query = Color::withCount('products');

        if (!empty($this->selectedCategories)) {
            $query->whereHas('products', function ($q) {
                $q->whereIn('category_id', $this->selectedCategories);
            });
        }

        return $query->get();
    }

    public function materialsWithCount()
    {
        $query = Material::withCount('products');

        if (!empty($this->selectedCategories)) {
            $query->whereHas('products', function ($q) {
                $q->whereIn('category_id', $this->selectedCategories);
            });
        }

        return $query->get();
    }

    public function tagsWithCount()
    {
        $query = Tag::query()
            ->select('tags.*')
            ->selectRaw('COUNT(DISTINCT taggables.taggable_id) as products_count')
            ->join('taggables', 'tags.id', '=', 'taggables.tag_id')
            ->where('taggables.taggable_type', Product::class)
            ->groupBy('tags.id');

        if (!empty($this->selectedCategories)) {
            $query->whereExists(function ($subquery) {
                $subquery->select(DB::raw(1))
                    ->from('products')
                    ->whereColumn('products.id', 'taggables.taggable_id')
                    ->whereIn('products.category_id', $this->selectedCategories);
            });
        }

        return $query->get();
    }

    public function stockStatusesWithCount()
    {
        $query = Product::query();

        if (!empty($this->selectedCategories)) {
            $query->whereIn('category_id', $this->selectedCategories);
        }

        return $query->groupBy('stock_status')
            ->selectRaw('stock_status, count(*) as count')
            ->pluck('count', 'stock_status');
    }

    #[On('resetAllFilters')]
    public function clearAllFilters()
    {
        $this->selectedCategories = [];
        $this->selectedColors = [];
        $this->selectedMaterials = [];
        $this->selectedTags = [];
        $this->selectedStockStatuses = [];
        $this->applyFilters();
    }

    public function render()
    {
        return view('livewire.products.product-filters', [
            'categories' => $this->categoriesWithCount(),
            'colors' => $this->colorsWithCount(),
            'materials' => $this->materialsWithCount(),
            'tags' => $this->tagsWithCount(),
            'stockStatuses' => $this->stockStatusesWithCount(),
            'counts' => $this->filterCounts(),
        ]);
    }
}
