<div class="font-semibold">
    @if ($isFiltered)
        @if ($count === 0)
            Geen producten gevonden
        @elseif ($count === 1)
            1 resultaat gevonden
        @else
            {{ $count }} resultaten gevonden
        @endif
    @else
        {{ $count }} {{ $count === 1 ? 'product' : 'producten' }}
    @endif
</div>
