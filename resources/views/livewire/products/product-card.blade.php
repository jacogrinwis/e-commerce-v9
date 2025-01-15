<div class="rounded-lg border p-4 text-gray-900 shadow-md dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100">
    {{-- <img
        src="{{ $product->image_url }}"
        alt="{{ $product->name }}"
        class="mb-4 h-48 w-full rounded-md object-cover"
    > --}}
    <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
    <p class="">{{ $product->formatted_price }}</p>


    {{-- <button
        x-data
        @click="$el.focus(); setTimeout(() => $el.blur(), 2000)"
        class="rounded bg-red-600 px-4 py-2 text-white focus:animate-btn-add-to-cart"
    >
        test
    </button> --}}


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
