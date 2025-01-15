<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Breadcrumb extends Component
{
    public $breadcrumbs = [];

    public function mount()
    {
        $this->generateBreadcrumbs();
    }

    public function generateBreadcrumbs()
    {
        $routeName = Route::currentRouteName();
        $currentRoute = Route::current();
        $breadcrumbLinks = [];

        $breadcrumbLinks[] = [
            'name' => 'Home',
            'url' => route('home'),
        ];

        if ($routeName === 'products') {
            $breadcrumbLinks[] = [
                'name' => 'Products',
                'url' => route('products'),
            ];
        }

        if ($routeName === 'product.details') {
            $breadcrumbLinks[] = [
                'name' => 'Products',
                'url' => route('products'),
            ];

            $product = $currentRoute->parameter('product');

            $breadcrumbLinks[] = [
                'name' => $product->name,
                'url' => route('product.details', ['product' => $product->slug]),
            ];
        }

        $this->breadcrumbs = $breadcrumbLinks;
    }

    public function render()
    {
        return view('livewire.breadcrumb');
    }
}
