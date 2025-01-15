<div>
    <img
        src="{{ asset($product->cover) }}"
        alt="{{ $product->name }}"
        class="aspect-square w-full rounded-lg object-cover"
    >
    <h3 class="mb-1 mt-2 truncate text-lg font-semibold">{{ $product->name }}</h3>
    <span class="mt-2 block text-sm text-gray-600">
        @switch($product->stock_status)
            @case(1)
                In Stock
            @break

            @case(2)
                On Order
            @break

            @case(3)
                Temporarily Out of Stock
            @break

            @default
                Unknown Status
        @endswitch
    </span>
    <div>
        @if ($product->discount > 0)
            <span class="text-gray-500 line-through">{{ $product->formatted_price }}</span>
            <span class="font-bold">{{ $product->formatted_discount_price }}</span>
            <span class="font-bold text-red-700">-{{ $product->discount }}%</span>
        @else
            <span class="font-bold">{{ $product->formatted_price }}</span>
        @endif
        {{-- <div class="mt-2 flex flex-wrap gap-2">
            @foreach ($product->tags as $tag)
                <span
                    class="inline-flex items-center px-2 py-1  text-sm font-medium text-blue-800 bg-blue-100 rounded dark:bg-blue-900 dark:text-blue-300">
                    {{ $tag->name }}
                    <button type="button"
                        class="inline-flex items-center p-1 ms-2 text-sm text-blue-400 bg-transparent rounded-sm hover:bg-blue-200 hover:text-blue-900 dark:hover:bg-blue-800 dark:hover:text-blue-300"
                        data-dismiss-target="#badge-dismiss-default" aria-label="Remove">
                        <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Remove badge</span>
                    </button>
                </span>
            @endforeach
        </div> --}}
    </div>
</div>
