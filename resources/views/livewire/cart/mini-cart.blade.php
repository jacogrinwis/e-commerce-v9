<div class="mini-cart">
    <button
        class="relative flex size-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-gray-200 dark:hover:bg-gray-800 dark:focus:bg-gray-800 dark:focus:ring-gray-700"
        popovertarget="mini-cart"
    >
        <x-icons.cart />
        @if ($itemCount > 0)
            <span class="absolute -right-2 -top-2 min-w-5 rounded-full bg-red-500 px-0.5 text-sm font-medium text-white">
                {{ $itemCount }}
            </span>
        @endif
    </button>

    <div
        id="mini-cart"
        class="grid w-96 gap-1 rounded-lg border bg-white p-4 text-gray-900 shadow-lg dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100"
        popover
    >
        <header class="flex justify-end gap-2">
            <h2 class="mb-3 mr-auto text-2xl font-medium">Winkelwagen</h2>
        </header>
        <div>
            @if ($itemCount > 0)
                <div
                    class="flex max-h-64 flex-col divide-y overflow-y-auto overflow-x-hidden pr-2 scrollbar-thumb-radius-4 scrollbar-width-6 dark:divide-gray-700">
                    @foreach ($cartItems as $item)
                        <div class="flex justify-between gap-4 py-2 text-sm">
                            <div class="flex items-center gap-4">
                                <figure class="size-10 rounded-lg bg-gray-200 dark:bg-gray-700"></figure>
                                <div class="flex flex-col gap-1">
                                    <div>{{ $item['product']->name }}</div>
                                    @if ($item['quantity'] > 1)
                                        <div>Aantal {{ $item['quantity'] }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="flex flex-col items-end gap-1">
                                <div class="font-bold">{{ $item['product']->formatted_price }}</div>
                                <div>
                                    <button
                                        type="button"
                                        class="text-gray-500 dark:text-gray-400"
                                        wire:click="removeItem({{ $item['product']->id }})"
                                    >
                                        Verwijderen
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="flex items-center justify-end gap-3 py-2 text-sm">
                    <span class="font-medium text-gray-700 dark:text-gray-300">Totaalbedrag</span>
                    <span class="text-base font-bold">
                        {{ formatPrice($subtotal) }}
                    </span>
                </div>
            @else
                <p>Geen producten in winkelwagen</p>
            @endif
        </div>
        <footer>
            <menu class="flex items-center justify-end gap-4">
                <li>
                    <a
                        href="#"
                        class="text-sm underline"
                    >Wijzig winkelwagen</a>
                </li>
                <li>
                    <button class="btn">Bestellen</button>
                </li>
            </menu>
        </footer>
    </div>
</div>
