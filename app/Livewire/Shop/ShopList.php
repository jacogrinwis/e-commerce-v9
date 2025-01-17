<?php

namespace App\Livewire\Shop;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;

class ShopList extends Component
{
    public $filters = [
        'categories' => [],
        'colors' => [],
        'materials' => [],
        'tags' => []
    ];

    #[On('filters-updated')]
    public function handleFilters($filters)
    {
        // dump('Filters received:', $filters);
        $this->filters[$filters['type']] = (array)$filters['items'];
        $this->dispatch('products-updated');
        // dump('Updated filters:', $this->filters);
    }

    #[Computed]
    public function filteredProducts()
    {
        // dump('Current filters:', $this->filters);
        // $query = Product::query()->with(['category', 'tags']);

        // if (!empty($this->filters['categories'])) {
        //     $query->whereIn('category_id', $this->filters['categories']);
        // }

        // if (!empty($this->filters['colors'])) {
        //     $query->whereHas('colors', fn($q) => $q->whereIn('colors.id', $this->filters['colors']));
        // }

        // if (!empty($this->filters['materials'])) {
        //     $query->whereHas('materials', fn($q) => $q->whereIn('materials.id', $this->filters['materials']));
        // }

        // if (!empty($this->filters['tags'])) {
        //     $query->whereHas('tags', fn($q) => $q->whereIn('tags.id', $this->filters['tags']));
        // }

        // return $query->latest()->get();

        $query = Product::query()->with(['category', 'tags']);

        if (!empty($this->filters['categories'])) {
            $query->whereIn('category_id', $this->filters['categories']);
            // dump('SQL:', $query->toSql(), 'Bindings:', $query->getBindings());
        }

        $products = $query->latest()->get();
        // dump('Products:', $products->toArray());

        return $products;

        // dump('Filtered products count:', $products->count());
    }

    public function render()
    {
        return view('livewire.shop.shop-list', [
            'products' => $this->filteredProducts
        ]);
    }
}
