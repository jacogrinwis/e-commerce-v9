<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/popover.css', 'resources/css/cart/mini-cart.css', 'resources/css/buttons.css'])
    @livewireStyles
    <script type="module">
        if (!("anchorName" in document.documentElement.style)) {
            import("https://unpkg.com/@oddbird/css-anchor-positioning");
        }
    </script>
</head>

<body class="bg-white text-gray-900 dark:bg-gray-900 dark:text-white">
    @include('partials.header')
    {{-- <div class="container mx-auto px-4 py-8">
        <div class="flex justify-end">
            <livewire:demo.popover />
            <x-popover>test</x-popover>
            <livewire:cart.mini-cart />
        </div>
    </div> --}}

    {{-- <main class="container mx-auto px-4 py-8"> --}}
    {{ $slot }}
    {{-- </main> --}}
    @livewireScripts
</body>

</html>
