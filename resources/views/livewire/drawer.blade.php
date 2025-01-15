@php
    $positionClasses = [
        'left' => 'ml-0 my-0 h-dvh max-h-dvh inset-y-0 min-w-64 left-0',
        'right' => 'mr-0 my-0 h-dvh max-h-dvh inset-y-0 min-w-64 right-0',
        'top' => 'mt-0 mx-0 w-dvw max-w-full inset-x-0',
        'bottom' => 'mb-0 mx-0 w-dvw max-w-full fixed inset-x-0 bottom-0',
    ];
@endphp

<div>
    <button id="open-drawer-{{ $id }}">{{ $trigger }}</button>

    <dialog
        id="drawer-{{ $id }}"
        class="{{ $positionClasses[$position] }} overflow-y-auto bg-white p-4 shadow-lg duration-1000 backdrop:bg-gray-900/50 backdrop:duration-1000 dark:bg-gray-800"
    >
        <button
            id="close-drawer-{{ $id }}"
            class="float-right -mr-1 -mt-1 ml-1 flex size-8 items-center justify-center rounded-lg text-gray-400 hover:bg-gray-200 hover:text-gray-900 hover:dark:bg-gray-600 hover:dark:text-white"
        >
            <span class="sr-only">Close drawer</span>
            <x-icons.close class="size-5" />
        </button>
        @if ($title)
            <h2 class="line-clamp-1 font-semibold uppercase text-gray-500 dark:text-gray-400">{{ $title }}</h2>
        @endif
    </dialog>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const {{ Str::camel($id) }} = document.getElementById('drawer-{{ $id }}');
            const {{ 'open' . Str::studly($id) . 'Button' }} = document.getElementById(
                'open-drawer-{{ $id }}');
            const {{ 'close' . Str::studly($id) . 'Button' }} = document.getElementById(
                'close-drawer-{{ $id }}');

            {{ 'open' . Str::studly($id) . 'Button' }}.addEventListener('click', () => {
                {{ Str::camel($id) }}.showModal();
                {{ Str::camel($id) }}.classList.add('animate-in', 'slide-in-from-{{ $position }}');
                {{ Str::camel($id) }}.classList.add('backdrop:animate-in', 'backdrop:fade-in');
            });

            {{ 'close' . Str::studly($id) . 'Button' }}.addEventListener('click', () => {
                {{ Str::camel($id) }}.classList.remove('animate-in', 'slide-in-from-{{ $position }}');
                {{ Str::camel($id) }}.classList.add('animate-out', 'slide-out-to-{{ $position }}');
                {{ Str::camel($id) }}.classList.add('backdrop:animate-out', 'backdrop:fade-out');
                setTimeout(() => {
                    {{ Str::camel($id) }}.close();
                    {{ Str::camel($id) }}.classList.remove('animate-out',
                        'slide-out-to-{{ $position }}');
                    {{ Str::camel($id) }}.classList.remove('backdrop:animate-out',
                        'backdrop:fade-out');
                }, 1000);
            });
        });
    </script>
</div>
