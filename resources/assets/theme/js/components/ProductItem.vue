<template>
    <div class="product">
        <a :href="'products/' + product.name">
            <div class="image-wrapper">
                <img src="/theme/img/product-1.jpg" draggable="false">
            </div>

            <p>{{ product.name }}</p>
        </a>
    </div>
</template>

<script>
    export default {
        props: [
            'product'
        ]
    }
</script>