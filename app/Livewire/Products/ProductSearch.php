<?php

namespace App\Livewire\Products;

use Livewire\Component;

class ProductSearch extends Component
{
    public $search = '';

    public function updatedSearch()
    {
        $this->dispatch('searchUpdated', $this->search);
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->dispatch('searchUpdated', $this->search);
    }

    public function render()
    {
        return view('livewire.products.product-search');
    }
}
