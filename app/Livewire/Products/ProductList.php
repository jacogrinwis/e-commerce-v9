<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedCategories = [];
    public $selectedColors = [];
    public $selectedMaterials = [];
    public $selectedTags = [];
    public $selectedStockStatuses = [];
    public $sortField = 'name';
    public $sortDirection = 'asc';

    protected $queryString = [
        'search' => ['except' => ''],
        'selectedCategories' => ['except' => ''],
        'selectedColors' => ['except' => ''],
        'selectedMaterials' => ['except' => ''],
        'selectedTags' => ['except' => ''],
        'selectedStockStatuses' => ['except' => ''],
    ];

    #[On('searchUpdated')]
    public function searchUpdated($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    #[On('sort')]
    public function updateSort($field, $direction)
    {
        $this->sortField = $field;
        $this->sortDirection = $direction;
    }

    #[On('applyCategoryFilter')]
    public function updateCategorySelection($categories)
    {
        $this->selectedCategories = $categories;
        $this->resetPage();
    }

    #[On('applyColorFilter')]
    public function updateColorSelection($colors)
    {
        $this->selectedColors = $colors;
        $this->resetPage();
    }

    #[On('applyMaterialFilter')]
    public function updateMaterialSelection($materials)
    {
        $this->selectedMaterials = $materials;
        $this->resetPage();
    }

    #[On('applyTagFilter')]
    public function updateTagSelection($tags)
    {
        $this->selectedTags = $tags;
        $this->resetPage();
    }

    #[On('applyStockStatusFilter')]
    public function updateStockStatusSelection($stockStatuses)
    {
        $this->selectedStockStatuses = $stockStatuses;
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhereHas('tags', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    });
            })
            ->when($this->selectedCategories, function ($query) {
                $query->whereIn('category_id', $this->selectedCategories);
            })
            ->when($this->selectedColors, function ($query) {
                $query->whereHas('colors', function ($q) {
                    $q->whereIn('colors.id', $this->selectedColors);
                });
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
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(12);

        $isFiltered = $this->search !== '' || ! empty($this->selectedCategories) || ! empty($this->selectedColors) || ! empty($this->selectedMaterials) || ! empty($this->selectedTags) || !empty($this->selectedStockStatuses);
        $this->dispatch('updateProductCount', $products->total(), $isFiltered);

        return view('livewire.products.product-list', [
            'products' => $products
        ]);
    }
}
