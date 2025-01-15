<?php

use App\Livewire\TestPage;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test-page', TestPage::class);

Route::get('/shop', App\Livewire\Products\ProductList::class)->name('shop.product-list');

Route::get('/admin/products/create', App\Livewire\Products\Admin\ProductForm::class)->name('admin.products.create');


Route::get('/cart', App\Livewire\Cart\CartOverview::class)->name('cart.cart-overview');
