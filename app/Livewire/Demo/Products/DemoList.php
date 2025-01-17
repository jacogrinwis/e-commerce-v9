<?php

namespace App\Livewire\Demo\Products;

use Livewire\Component;

class DemoList extends Component
{
    public $products;

    public function mount($products)
    {
        $this->products = $products->toArray();
    }

    public function render()
    {
        return view('livewire.demo.products.demo-list');
    }
}
