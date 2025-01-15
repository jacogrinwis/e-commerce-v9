<?php

namespace App\Livewire\Products;

use Livewire\Component;

class ProductSort extends Component
{
    public $sortOption = 'name_asc';

    public function updatedSortOption()
    {
        $parts = explode('_', $this->sortOption);
        $direction = array_pop($parts);
        $field = implode('_', $parts);
        $this->dispatch('sort', $field, $direction);
    }

    public function render()
    {
        return view('livewire.products.product-sort');
    }
}
