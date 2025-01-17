<x-shop.shop-card>

    <img
        src="{{ asset($product->cover) }}"
        alt="{{ $product->name }}"
        class="aspect-square w-full rounded object-cover"
    >

    <h2 class="truncate text-lg font-semibold">
        {{ $product->name }}
    </h2>

    <p>{{ $product->formatted_price }}</p>

</x-shop.shop-card>
