<x-shop.shop-grid>

    @foreach ($products as $product)
        <livewire:shop.shop-card :product="$product" />
    @endforeach

</x-shop.shop-grid>
