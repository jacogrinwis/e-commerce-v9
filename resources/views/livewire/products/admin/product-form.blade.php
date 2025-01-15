<div class="mx-auto max-w-2xl rounded-lg bg-white p-4 shadow">
    <form
        wire:submit="save"
        class="space-y-4"
    >
        <div>
            <label
                for="name"
                class="block text-sm font-medium text-gray-700"
            >Product Name</label>
            <input
                type="text"
                id="name"
                wire:model="name"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
            @error('name')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label
                for="description"
                class="block text-sm font-medium text-gray-700"
            >Description</label>
            <textarea
                id="description"
                wire:model="description"
                rows="4"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            ></textarea>
            @error('description')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label
                for="price"
                class="block text-sm font-medium text-gray-700"
            >Price</label>
            <div class="relative mt-1 rounded-md shadow-sm">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <span class="text-gray-500 sm:text-sm">€</span>
                </div>
                <input
                    type="number"
                    step="0.01"
                    id="price"
                    wire:model="price"
                    class="block w-full rounded-md border-gray-300 pl-7 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >
            </div>
            @error('price')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Product Images</label>
            <input
                type="file"
                wire:model="images"
                multiple
                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:rounded-md file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-indigo-700 hover:file:bg-indigo-100"
            >
            @error('images.*')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror

            <div class="mt-2 grid grid-cols-4 gap-4">
                @if ($images)
                    @foreach ($images as $image)
                        <div class="relative">
                            <img
                                src="{{ $image->temporaryUrl() }}"
                                class="h-24 w-24 rounded object-cover"
                            >
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="flex justify-end">
            <button
                type="submit"
                class="rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
                Save Product
            </button>
        </div>
    </form>
</div>
