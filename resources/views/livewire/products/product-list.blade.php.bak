<div class="inline">
    {{-- <livewire:cart.cart-count /> --}}
    <a href="{{ route('cart.cart-overview') }}">Cart Overview</a>
    <h1 class="mb-4 text-2xl font-bold">Producten</h1>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($products as $product)
            <livewire:products.product-card
                :product="$product"
                :key="$product->id"
            />
        @endforeach
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>

    {{-- <livewire:demo.color-theme /> --}}

    {{-- <livewire:demo.buttons /> --}}
</div>
