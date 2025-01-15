<div
    x-data="{
        activeIndex: 0,
        imageList: {{ Js::from($images) }}
    }"
    class="relative mx-auto focus:outline-none"
    tabindex="0"
    @keydown.left.prevent="activeIndex = activeIndex === 0 ? imageList.length - 1 : activeIndex - 1"
    @keydown.right.prevent="activeIndex = activeIndex === imageList.length - 1 ? 0 : activeIndex + 1"
>
    {{-- Main image --}}
    <div class="aspect-square w-full overflow-hidden rounded-md border">
        <div
            class="flex transition-transform duration-500"
            :style="`transform: translateX(-${activeIndex * 100}%)`"
        >
            <template
                x-for="(image, index) in imageList"
                :key="index"
            >
                <img
                    :src="image"
                    alt="Product image"
                    class="w-full flex-shrink-0 object-cover shadow"
                >
            </template>
        </div>
    </div>

    {{-- Navigation arrows --}}
    <button
        @click="activeIndex = activeIndex === 0 ? imageList.length - 1 : activeIndex - 1"
        class="absolute left-2 top-[45%] -translate-y-1/2 rounded-full bg-white/80 p-2 shadow hover:bg-white"
    >
        <svg
            class="h-5 w-5"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 19l-7-7 7-7"
            />
        </svg>
    </button>

    <button
        @click="activeIndex = activeIndex === imageList.length - 1 ? 0 : activeIndex + 1"
        class="absolute right-2 top-[45%] -translate-y-1/2 rounded-full bg-white/80 p-2 shadow hover:bg-white"
    >
        <svg
            class="h-5 w-5"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 5l7 7-7 7"
            />
        </svg>
    </button>

    {{-- Thumbnails --}}
    <div class="scrollbar-hide mt-4 flex gap-2 overflow-x-auto scroll-smooth p-1">
        <template
            x-for="(image, index) in imageList"
            :key="index"
        >
            <img
                :src="image"
                alt="Thumbnail"
                class="h-16 w-16 flex-shrink-0 cursor-pointer rounded-md border object-cover shadow transition"
                :class="index === activeIndex ? 'ring-2 ring-primary-500' : 'hover:ring-2 hover:ring-gray-300'"
                @click="activeIndex = index"
            >
        </template>
    </div>
</div>
