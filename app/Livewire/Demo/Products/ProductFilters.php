<?php

namespace App\Livewire\Demo\Products;

use Livewire\Component;

class ProductFilters extends Component
{
    public $items;
    public $selectedItems = [];
    public $title;

    public function mount($items, $title)
    {
        $this->items = $items;
        $this->title = $title;
    }

    public function render()
    {
        return view('livewire.demo.products.product-filters');
    }
}
