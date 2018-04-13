<template>
    <div class="product">
        <div class="image-wrapper">
            <a :href="'products/' + product.name">
                <img src="/theme/img/product-1.jpg" draggable="false">
            </a>
        </div>
        
        <div class="content-wrapper">
            <a :href="'products/' + product.name">
                <p>{{ product.name }}</p>
            </a>
            <p v-if="product.price != null" class="price">${{ product.price }}</p>
            <p class="product-desc">{{ product.description }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'product'
        ]
    }
</script>