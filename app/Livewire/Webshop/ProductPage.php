<?php

namespace App\Livewire\Webshop;

use Spatie\Tags\Tag;
use App\Models\Color;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Material;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Log;

class ProductPage extends Component
{
    public $selectedCategories = [];
    public $selectedColors = [];
    public $selectedMaterials = [];
    public $selectedTags = [];
    public $selectedStockStatuses = [];

    #[Computed]
    public function filteredProducts()
    {
        // return Product::query()
        $query = Product::query()
            ->with(['category', 'colors', 'materials', 'tags']);

        Log::channel('filter')->info("Stock status filter:", [
            'selected' => $this->selectedStockStatuses,
            'available_statuses' => Product::distinct()->pluck('stock_status')->toArray()
        ]);

        return $query
            ->with(['category', 'colors', 'materials'])
            ->when($this->selectedCategories, function ($query) {
                $query->whereHas('category', function ($q) {
                    $q->whereIn('categories.id', $this->selectedCategories);
                });
            })
            ->when($this->selectedColors, function ($query) {
                $query->whereHas('colors', function ($q) {
                    $q->whereIn('colors.id', $this->selectedColors);
                }, '>=', count($this->selectedColors));
            })
            ->when($this->selectedMaterials, function ($query) {
                $query->whereHas('materials', function ($q) {
                    $q->whereIn('materials.id', $this->selectedMaterials);
                });
            })
            ->when($this->selectedTags, function ($query) {
                $query->whereHas('tags', function ($q) {
                    $q->whereIn('tags.id', $this->selectedTags);
                });
            })
            ->when($this->selectedStockStatuses, function ($query) {
                $query->whereIn('stock_status', $this->selectedStockStatuses);
            })
            ->latest()
            ->get();
    }

    #[Computed]
    public function categories()
    {
        return Category::withCount('products')->get();
    }

    #[Computed]
    public function colors()
    {
        $baseProducts = Product::query()
            ->when($this->selectedCategories, function ($query) {
                $query->whereHas('category', function ($q) {
                    $q->whereIn('categories.id', $this->selectedCategories);
                });
            })
            ->get();

        $colorIds = $baseProducts->pluck('colors')
            ->flatten()
            ->pluck('id')
            ->merge($this->selectedColors)
            ->unique();

        return Color::whereIn('id', $colorIds)->get();
    }

    #[Computed]
    public function materials()
    {
        $baseProducts = Product::query()
            ->when($this->selectedCategories, function ($query) {
                $query->whereHas('category', function ($q) {
                    $q->whereIn('categories.id', $this->selectedCategories);
                });
            })
            ->get();

        $materialIds = $baseProducts->pluck('materials')
            ->flatten()
            ->pluck('id')
            ->merge($this->selectedMaterials)
            ->unique();

        return Material::whereIn('id', $materialIds)->get();
    }

    #[Computed]
    public function tags()
    {
        $baseProducts = Product::query()
            ->when($this->selectedCategories, function ($query) {
                $query->whereHas('category', function ($q) {
                    $q->whereIn('categories.id', $this->selectedCategories);
                });
            })
            ->get();

        $tagIds = $baseProducts->pluck('tags')
            ->flatten()
            ->pluck('id')
            ->merge($this->selectedTags)
            ->unique();

        return Tag::whereIn('id', $tagIds)->get();
    }

    #[Computed]
    public function stockStatuses()
    {
        return collect([
            ['id' => 1, 'name' => 'Op voorraad'],
            ['id' => 2, 'name' => 'Op bestelling'],
            ['id' => 3, 'name' => 'Tijdelijk uitverkocht'],
        ]);
    }

    #[Computed]
    public function filterCounts()
    {
        $products = $this->filteredProducts;

        return [
            'categories' => Category::all()->mapWithKeys(fn($category) => [
                $category->id => $products->where('category_id', $category->id)->count()
            ]),
            'colors' =>  $this->colors->mapWithKeys(fn($color) => [
                $color->id => $products->filter(function ($product) use ($color) {
                    return $product->colors->contains('id', $color->id);
                })->count()
            ]),
            'materials' => $this->materials->mapWithKeys(fn($material) => [
                $material->id => $products->filter(function ($product) use ($material) {
                    return $product->materials->contains('id', $material->id);
                })->count()
            ]),
            'tags' => $this->tags->mapWithKeys(fn($tag) => [
                $tag->id => $products->filter(function ($product) use ($tag) {
                    return $product->tags->contains('id', $tag->id);
                })->count()
            ]),
            'stock_statuses' => $this->stockStatuses->mapWithKeys(fn($status) => [
                $status['id'] => $products->where('stock_status', $status['id'])->count()
            ])
        ];
    }

    #[On('filter-updated')]
    public function handleFilters($filters)
    {
        match ($filters['type']) {
            'categories' => $this->selectedCategories = $filters['selected'],
            'colors' => $this->selectedColors = $filters['selected'],
            'materials' => $this->selectedMaterials = $filters['selected'],
            'tags' => $this->selectedTags = $filters['selected'],
            'stock_statuses' => $this->selectedStockStatuses = $filters['selected'],
        };
    }

    public function render()
    {
        return view('livewire.webshop.product-page', [
            'products' => $this->filteredProducts,
            'filterCounts' => $this->filterCounts,
        ]);
    }
}
