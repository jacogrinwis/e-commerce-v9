<div>
    <nav aria-label="breadcrumb">
        <ol>
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($loop->count > 1 && $loop->first)
                    <li class="inline-flex items-center">
                        <a
                            href="{{ route('home') }}"
                            class="dark:hover:text white inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-gray-400"
                        >
                            <svg
                                class="me-2.5 h-3 w-3"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"
                                />
                            </svg>
                            {{ $breadcrumb['name'] }}
                        </a>
                    </li>
                @elseif ($loop->first)
                    <li class="inline-flex items-center">
                        <div class="flex items-center">
                            <svg
                                class="me-2.5 h-3 w-3"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"
                                />
                            </svg>
                            <span class="ms:ms-2 ms-1 text-sm font-medium text-gray-700 dark:text-gray-400">
                                {{ $breadcrumb['name'] }}
                            </span>
                        </div>
                    </li>
                @elseif (!$loop->last)
                    <li class="inline-flex items-center">
                        <div class="flex items-center">
                            <svg
                                class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 6 10"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m1 9 4-4-4-4"
                                />
                            </svg>
                            <a
                                href="{{ $breadcrumb['url'] }}"
                                class="ms:ms-2 ms-1 text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-gray-400 dark:hover:text-white"
                            >
                                {{ $breadcrumb['name'] }}
                            </a>
                        </div>
                    </li>
                @else
                    <li class="inline-flex items-center">
                        <div class="flex items-center">
                            <svg
                                class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 6 10"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m1 9 4-4-4-4"
                                />
                            </svg>
                            <span class="ms:ms-2 ms-1 text-sm font-medium text-gray-700 dark:text-gray-400">
                                {{ $breadcrumb['name'] }}
                            </span>
                        </div>
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
</div>
