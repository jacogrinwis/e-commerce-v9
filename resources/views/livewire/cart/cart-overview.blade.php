{{-- @use('App\Facades\Price') --}}

<div class="container mx-auto px-4 py-8">

    <h1 class="mb-6 text-2xl font-bold">Shopping Cart</h1>

    @if ($itemCount > 0)
        <div class="rounded-lg bg-white p-6 shadow-md">
            <div class="flex flex-col space-y-4">
                @foreach ($cartItems as $item)
                    <div class="flex items-center justify-between border-b pb-4">
                        <div class="flex items-center space-x-4">
                            {{-- <img
                                src="{{ $item['product']->image_url }}"
                                alt="{{ $item['product']->name }}"
                                class="h-20 w-20 rounded object-cover"
                            > --}}
                            <div>
                                <h2 class="font-semibold">{{ $item['product']->name }}</h2>
                                <p class="text-gray-600">{{ $item['product']->formatted_price }}</p>
                                {{-- <p class="text-gray-600">{{ formatPrice($item['product']->price) }}</p> --}}
                            </div>
                        </div>

                        {{-- <div>
                            <div class="flex items-center rounded-md border border-gray-300 dark:border-gray-600">
                                <button class="px-1 py-1.5">
                                    <x-icons.minus class="size-5 text-gray-600" />
                                </button>
                                <input
                                    type="text"
                                    class="w-12 border-x border-gray-300 text-center focus:border-gray-500 dark:border-gray-600"
                                >
                                <button class="px-1 py-1.5">
                                    <x-icons.plus class="size-5 text-gray-600" />
                                </button>
                            </div>
                        </div> --}}

                        <div>
                            <div class="flex max-w-[8rem] items-center">
                                <button
                                    class="h-11 rounded-s-lg border border-gray-300 bg-gray-100 p-3 dark:border-gray-600 dark:bg-gray-700"
                                >
                                    <x-icons.minus class="size-3 text-gray-600" />
                                </button>
                                <input
                                    type="text"
                                    class="block h-11 w-full border border-x-0 border-gray-300 bg-gray-50 text-center text-sm focus:border-red-500 focus:outline-none focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:focus:ring-blue-500"
                                    placeholder="999"
                                >
                                <button
                                    class="h-11 rounded-e-lg border border-gray-300 bg-gray-100 p-3 dark:border-gray-600 dark:bg-gray-700"
                                >
                                    <x-icons.plus class="size-3 text-gray-600" />
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">


                            <input
                                type="number"
                                min="1"
                                wire:model.live="quantity"
                                wire:change="updateQuantity({{ $item['product']->id }}, $event.target.value)"
                                class="w-20 rounded border px-2 py-1"
                                value="{{ $item['quantity'] }}"
                            >
                            <button
                                wire:click="removeItem({{ $item['product']->id }})"
                                class="text-red-500 hover:text-red-700"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 border-t pt-4">
                <div class="flex justify-between text-xl font-semibold">
                    <span>Subtotal</span>
                    {{-- <span>{{ Price::format($subtotal) }}</span> --}}
                    {{-- <span>{{ Number::currency($subtotal / 100, in: 'EUR', locale: 'nl') }}</span> --}}
                    <span>{{ formatPrice($subtotal) }}</span>
                </div>
                <div class="mt-6">
                    <a
                        href="/checkout"
                        class="w-full rounded-lg bg-blue-600 px-4 py-3 text-center text-white hover:bg-blue-700"
                    >
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="py-8 text-center">
            <p class="text-xl text-gray-500">Your cart is empty</p>
            <a
                href="/products"
                class="mt-4 inline-block rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
            >
                Continue Shopping
            </a>
        </div>
    @endif
</div>
