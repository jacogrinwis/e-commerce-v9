<div>
    <form class="flex items-center">
        <div class="relative w-full">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <svg
                    aria-hidden="true"
                    class="h-5 w-5 text-gray-500 dark:text-gray-400"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
            </div>
            <input
                wire:model.live="search"
                type="text"
                id="simple-search"
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 pr-12 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                placeholder="Search"
                required
            >
            @if ($search)
                <button
                    wire:click="clearSearch"
                    type="button"
                    class="absolute inset-y-0 right-0 flex items-center pr-3"
                >
                    <svg
                        class="h-5 w-5 text-gray-500 hover:text-gray-700"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                </button>
            @endif
        </div>
    </form>
</div>
