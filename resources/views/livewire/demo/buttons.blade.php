<div class="space-y-4 divide-y dark:divide-gray-700">
    <div class="py-2">
        <h2 class="mb-1 text-lg font-bold"">Sizes</h2>
        <x-button size="xs">
            Extra small
        </x-button>

        <x-button size="sm">
            Small
        </x-button>

        <x-button size="md">
            Base
        </x-button>

        <x-button size="lg">
            Large
        </x-button>

        <x-button size="xl">
            Extra large
        </x-button>
    </div>

    <div class="py-2">
        <h2 class="mb-1 text-lg font-bold"">Variants</h2>
        <x-button
            size="sm"
            variant="pills"
        >
            Pills
        </x-button>

        <x-button
            size="sm"
            variant="solid"
        >
            Solid
        </x-button>

        <x-button
            size="sm"
            variant="outline"
        >
            Outline
        </x-button>
    </div>

    <div class="py-2">
        <h2 class="mb-1 text-lg font-bold"">Colors</h2>
        <x-button color="primary">
            Primary
        </x-button>

        <x-button color="secondary">
            Secondary
        </x-button>
    </div>

    <div class="py-2">

        @php
            $buttonBaseClasses =
                'rounded-lg px-5 py-2.5 text-sm font-medium transition duration-300 ease-in-out focus:outline-none focus:z-10 focus:ring-4';
        @endphp

        <button
            class="{{ $buttonBaseClasses }} bg-blue-700 text-white hover:bg-blue-800 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        >
            Primary
        </button>

        <button
            class="{{ $buttonBaseClasses }} border border-gray-200 bg-white text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700"
        >
            Secondary
        </button>

        {{-- text-primary dark:text-primary hover:text-primary dark:hover:text-primary --}}

        <button class="btn-base btn-primary">btn-primary</button>

        <button class="btn-base btn-secondary">btn-secondary</button>

        <button class="btn-base btn-red">btn-red</button>

        <button class="btn-base btn-green">btn-green</button>

        <button class="btn-base btn-primary-outline">btn-primary</button>

        <button class="btn-base btn-dark-outline">btn-primary-outline</button>

        <button class="btn-base btn-red-outline">btn-red-outline</button>

        <button class="btn-base btn-green-outline">btn-green-outline</button>

    </div>

</div>
