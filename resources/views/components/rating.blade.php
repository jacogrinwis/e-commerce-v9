@props(['rating'])

<div class="flex items-center space-x-1">
    @for ($i = 1; $i <= $maxRating; $i++)
        <button
            @if (!$readonly) wire:click="setRating({{ $i }})" @endif
            class="transform text-2xl transition hover:scale-110 focus:outline-none"
        >
            @if ($i <= $rating)
                <svg
                    class="h-6 w-6 text-primary-400"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.54 4.737a1 1 0 00.95.69h4.973c.969 0 1.371 1.24.588 1.81l-4.02 2.92a1 1 0 00-.364 1.118l1.54 4.737c.3.921-.755 1.688-1.54 1.118l-4.02-2.92a1 1 0 00-1.176 0l-4.02 2.92c-.784.57-1.838-.197-1.54-1.118l1.54-4.737a1 1 0 00-.364-1.118L2.098 9.164c-.783-.57-.381-1.81.588-1.81h4.973a1 1 0 00.95-.69L9.049 2.927z"
                    />
                </svg>
            @else
                <svg
                    class="h-6 w-6 text-gray-300"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.54 4.737a1 1 0 00.95.69h4.973c.969 0 1.371 1.24.588 1.81l-4.02 2.92a1 1 0 00-.364 1.118l1.54 4.737c.3.921-.755 1.688-1.54 1.118l-4.02-2.92a1 1 0 00-1.176 0l-4.02 2.92c-.784.57-1.838-.197-1.54-1.118l1.54-4.737a1 1 0 00-.364-1.118L2.098 9.164c-.783-.57-.381-1.81.588-1.81h4.973a1 1 0 00.95-.69L9.049 2.927z"
                    />
                </svg>
            @endif
        </button>
    @endfor
</div>
