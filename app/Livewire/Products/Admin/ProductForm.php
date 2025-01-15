<?php

namespace App\Livewire\Products\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;

class ProductForm extends Component
{
    use WithFileUploads;

    public $name = '';
    public $description = '';
    public $price = '';
    public $images = [];

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required|min:10',
        'price' => 'required|numeric|min:0',
        'images.*' => 'image|max:2048'
    ];

    public function save()
    {
        $this->validate();

        // Here you'll add the logic to save the product
    }

    public function render()
    {
        return view('livewire.products.admin.product-form');
    }
}
