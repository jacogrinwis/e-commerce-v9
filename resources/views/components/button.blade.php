{{-- @php
    $sizeClasses = [
        'xs' => 'text-xs px-3 py-2',
        'sm' => 'text-sm px-3 py-2',
        'md' => 'text-base px-5 py-2.5',
        'lg' => 'text-base px-5 py-3',
        'xl' => 'text-base px-6 py-3.5',
    ];
    $buttonSize = $sizeClasses[$size];

    $variantClasses = [
        'solid' => 'bg-' . $color . '-500 hover:bg-' . $color . '-700 text-white',
        'pills' => 'bg-blue-500 hover:bg-blue-700',
        'outline' =>
            'border border-' . $color . '-500 text-' . $color . '-500 hover:bg-' . $color . '-500 hover:text-white',
    ];
    //
@endphp --}}

<button
    type="{{ $type }}"
    {{ $attributes->twMerge('font-medium ' . $getSizeClass() . ' rounded-lg ' . $getVariantClass()) }}
>
    {{ $slot }}
</button>
