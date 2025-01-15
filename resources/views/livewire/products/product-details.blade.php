<main class="container my-16">
    <h3 class="mb-2 mt-2 truncate text-4xl font-semibold">{{ $product->name }}</h3>
    <p class="mb-4 text-sm text-gray-500">Artikelnummer: {{ $product->product_number }}</p>
    <livewire:rating />
    <livewire:rating
        :rating="3.5"
        :review-count="12"
    />
    <livewire:rating
        :rating="4.5"
        :review-count="12"
        :readonly="true"
    />
    <div class="__place-items-center grid grid-cols-1 gap-6 md:grid-cols-2">

        <x-carousel :images="$product->images" />
        {{-- @dd($product->images) --}}

        <div class="rounded-lg bg-gray-50 p-6 shadow">
            <div class="mb-6 text-2xl">
                @if ($product->discount > 0)
                    <span class="text-gray-500 line-through">{{ $product->formatted_price }}</span>
                    <span class="font-bold">{{ $product->formatted_discount_price }}</span>
                    <span class="font-bold text-red-700">-{{ $product->discount }}%</span>
                @else
                    <span class="font-bold">{{ $product->formatted_price }}</span>
                @endif
            </div>
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
                    <a
                        href="#"
                        class="ml-2 text-xs font-bold text-blue-800 underline"
                    >Dit product wordt speciaal
                        voor
                        u
                        gemaakt.</a>
                @elseif ($product->stock_status == 3)
                    <span
                        class="rounded bg-red-100 px-2.5 py-0.5 text-xs font-bold text-red-800 dark:bg-red-900 dark:text-red-300"
                    >
                        Tijdelijk uitverkocht
                    </span>
                @else
                @endif
            </div>
            <div class="flex items-center gap-2">
                @if ($product->stock_status == 1)
                    <button
                        class="flex flex-grow items-center justify-center gap-2 rounded border border-primary-600 bg-primary-600 px-3 py-2 font-semibold text-white hover:bg-primary-700"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 -960 960 960"
                            class="mt-1 size-5"
                            fill="currentColor"
                        >
                            <path
                                d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z"
                            />
                        </svg>
                        In winkelwagen
                    </button>
                @elseif ($product->stock_status == 2)
                    <button
                        class="flex flex-grow items-center justify-center gap-2 rounded border border-primary-600 bg-primary-600 px-3 py-2 font-semibold text-white hover:bg-primary-700"
                    >
                        Reserveer
                    </button>
                @elseif ($product->stock_status == 3)
                    Sorry, dit product is tijdelijk uitverkocht.
                @else
                @endif
                <button
                    class="flex size-11 items-center justify-center rounded-full border border-gray-300 bg-white text-gray-900"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="size-6"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"
                        />
                    </svg>
                </button>
            </div>
        </div>
    </div>

</main>
