<?php

namespace App\Livewire\Demo\Products;

use App\Models\Product;
use Livewire\Component;

class DemoContainer extends Component
{
    public function render()
    {
        $products = Product::all(); //->pluck('name');

        return view('livewire.demo.products.demo-container', [
            'products' => $products
        ]);
    }
}
