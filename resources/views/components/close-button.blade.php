<button
    {{ $attributes->twMerge([
            'inline-flex items-center justify-center',
            'focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-200 dark:focus:ring-gray-700',
            'text-gray-400 hover:bg-gray-100 hover:text-gray-900  dark:hover:bg-gray-600 dark:hover:text-white',
            'p-0.5 rounded-md',
        ])->merge(['data-modal-hide' => true]) }}
>
    <x-icons.close class="size-5" />
</button>
