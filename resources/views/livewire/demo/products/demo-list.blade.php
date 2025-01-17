<div>
    {{-- @dump($products) --}}

    <div x-data="{ products: @entangle('products') }">
        <ul>
            <template x-for="product in products">
                <li>
                    <p x-text="product.name"></p>
                    <p x-text="product.price"></p>
                    <p x-text="'€' + parseFloat(product.price).toFixed(2)"></p>
                    <p
                        x-text="new Intl.NumberFormat('nl-NL', { style: 'currency', currency: 'EUR' }).format(product.price)">
                    </p>
                </li>
            </template>
        </ul>
    </div>

    {{-- <div x-data="{ products: {{ Js::from($products) }} }">
        <ul>
            <template x-for="product in products">
                <li x-text="product.name"></li>
            </template>
        </ul>
    </div> --}}
</div>


{{-- <script>
    const products = @entangle('products').defer;
    console.log(products);
</script> --}}

{{-- @dump($products) --}}
