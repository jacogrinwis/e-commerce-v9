<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;

class ProductCount extends Component
{
    public $count;
    public $isFiltered = false;

    public function mount()
    {
        $this->count = Product::count();
    }

    #[On('updateProductCount')]
    public function updateProductCount($count, $isFiltered)
    {
        $this->count = $count;
        $this->isFiltered = $isFiltered;
    }

    public function render()
    {
        return view('livewire.products.product-count');
    }
}
