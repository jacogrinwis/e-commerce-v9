<div class="grid grid-cols-2 gap-x-6 gap-y-12 sm:grid-cols-3 xl:grid-cols-4">
    @foreach ($products as $product)
        <div class="transform transition hover:scale-105">
            <a href="{{ route('product.details', $product) }}">
                <img
                    src="{{ asset($product->cover) }}"
                    alt="{{ $product->name }}"
                    class="aspect-square w-full rounded-lg object-cover"
                >
                <h3 class="mb-2 mt-2 truncate text-lg font-semibold">{{ $product->name }}</h3>
                <div class="mb-4">
                    @if ($product->stock_status == 1)
                        <span
                            class="rounded bg-green-100 px-2.5 py-0.5 text-xs font-bold text-green-800 dark:bg-green-900 dark:text-green-300"
                        >
                            Op voorraad
                        </span>
                    @elseif ($product->stock_status == 2)
                        <span
                            class="rounded bg-blue-100 px-2.5 py-0.5 text-xs font-bold text-blue-800 dark:bg-blue-900 dark:text-blue-300"
                        >
                            Op bestelling
                        </span>
                    @elseif ($product->stock_status == 3)
                        <span
                            class="rounded bg-red-100 px-2.5 py-0.5 text-xs font-bold text-red-800 dark:bg-red-900 dark:text-red-300"
                        >
                            Tijdelijk uitverkocht
                        </span>
                    @else
                    @endif
                </div>

                <div>
                    @if ($product->discount > 0)
                        <span class="text-gray-500 line-through">{{ $product->formatted_price }}</span>
                        <span class="font-bold">{{ $product->formatted_discount_price }}</span>
                        <span class="font-bold text-red-700">-{{ $product->discount }}%</span>
                    @else
                        <span class="font-bold">{{ $product->formatted_price }}</span>
                    @endif
                </div>
            </a>
        </div>
    @endforeach
</div>
<div class="py-6">
    {{ $products->links() }}
</div>
