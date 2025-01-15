<div>

    <select
        wire:model.live="sortOption"
        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
    >
        <option value="name_asc">Naam (A-Z)</option>
        <option value="name_desc">Naam (Z-A)</option>
        <option value="price_asc">Prijs (laag-hoog)</option>
        <option value="price_desc">Prijs (hoog-laag)</option>
        <option value="discount_desc">Hoogste korting</option>
        <option value="created_at_asc">Datum (oud-nieuw)</option>
        <option value="created_at_desc">Datum (nieuw-oud)</option>
    </select>
</div>
