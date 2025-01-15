<div class="grid grid-cols-2 gap-x-6 gap-y-12 sm:grid-cols-3 xl:grid-cols-4">
    @foreach ($products as $product)
        <div class="transform transition duration-300 hover:scale-110">
            <a href="{{ route('product.details', $product) }}">
                <img
                    src="{{ asset($product->cover) }}"
                    alt="{{ $product->name }}"
                    class="aspect-square w-full rounded-lg object-cover"
                >
                <h3 class="mb-2 mt-2 truncate text-lg font-semibold">{{ $product->name }}</h3>
                <div class="relative mb-4">
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
                    <div class="absolute right-0 top-0 flex items-end">
                        <button
                            x-data
                            class="group relative mt-4 h-10 w-16 overflow-hidden rounded bg-red-600 font-medium text-white transition-all duration-300 ease-in-out focus:bg-green-600 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800"
                            @click="$el.focus(); setTimeout(() => $el.blur(), 2000)"
                            wire:click="addToCart({{ $product->id }})"
                        >
                            <span
                                class="_px-4 absolute inset-0 flex -translate-x-full items-center justify-center py-2 opacity-0 transition-all duration-1000 group-focus:translate-x-0 group-focus:opacity-100"
                            >
                                <x-icons.check class="text-white dark:text-white" />
                            </span>
                            <span
                                class="_px-4 absolute inset-0 flex transform items-center justify-center py-2 opacity-100 transition-all duration-1000 group-focus:translate-x-full group-focus:opacity-0"
                            >
                                <x-icons.plus class="text-white dark:text-white" />
                                <x-icons.cart class="text-white dark:text-white" />
                            </span>
                        </button>
                    </div>
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

                <div class="flex justify-end">

                </div>
            </a>
        </div>
    @endforeach
</div>
<div class="py-6">
    {{ $products->links() }}
</div>
