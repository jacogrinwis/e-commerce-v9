<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public function render()
    {
        $products = Product::paginate(9);

        return view('livewire.products.product-list', ['products' => $products]);
    }
}
