<div class="relative">
    <x-drawer-trigger
        target="cart-overview-drawer"
        class="relative size-6"
    >
        <svg
            class="size-6 text-gray-800 dark:text-white"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
            viewBox="0 0 24 24"
        >
            <path
                fill-rule="evenodd"
                d="M4 4a1 1 0 0 1 1-1h1.5a1 1 0 0 1 .979.796L7.939 6H19a1 1 0 0 1 .979 1.204l-1.25 6a1 1 0 0 1-.979.796H9.605l.208 1H17a3 3 0 1 1-2.83 2h-2.34a3 3 0 1 1-4.009-1.76L5.686 5H5a1 1 0 0 1-1-1Z"
                clip-rule="evenodd"
            />
        </svg>
        @if ($itemCount > 0)
            <span class="absolute -right-2 -top-2 rounded-full bg-red-600 px-1 text-xs text-white">
                {{ $itemCount }}
            </span>
        @endif
    </x-drawer-trigger>

    <x-drawer
        id="cart-overview-drawer"
        position="right"
        class="w-[24rem]"
        class:header="flex items-center justify-start"
        class:body=""
        class:footer=""
    >
        <x-slot:header>
            Winkelwagen
        </x-slot:header>
        @if ($itemCount > 0)
            <div class="flex flex-col divide-y dark:divide-gray-700">
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
                            <div>Verwijderen</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Geen producten in winkelwagen</p>
        @endif

        @if ($itemCount > 0)
            <x-slot:footer>
                <menu class="flex flex-col gap-2">
                    <x-button>Wijzig winkelwagen</x-button>
                    <x-button>Bestellen</x-button>
                </menu>
            </x-slot:footer>
        @endif
    </x-drawer>
</div>
