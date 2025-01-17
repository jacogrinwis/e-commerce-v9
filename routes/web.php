<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', App\Livewire\Home::class)->name('home');

// Route::get('test-page', App\Livewire\TestPage::class);

// Route::get('/shop', App\Livewire\Products\ProductList::class)->name('shop.product-list');

Route::get('/products', App\Livewire\Products\ProductList::class)->name('products');
Route::get('/product/{product:slug}', App\Livewire\Products\ProductDetails::class)->name('product.details');

Route::get('/admin/products/create', App\Livewire\Products\Admin\ProductForm::class)->name('admin.products.create');


Route::get('/cart', App\Livewire\Cart\CartOverview::class)->name('cart.cart-overview');

Route::get('demo/products/filters', App\Livewire\Demo\Products\ProductFilters::class)->name('demo.products.filters');

Route::get('demo/products/container', App\Livewire\Demo\Products\DemoContainer::class)->name('demo.products.container');

Route::get('/shop', App\Livewire\Shop\ShopList::class)->name('shop.shop-list');

Route::get('/webshop', App\Livewire\Webshop\ProductPage::class)->name('webshop.product-page');
