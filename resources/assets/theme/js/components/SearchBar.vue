<template>
    <ais-index
    app-id="A0PU0KT5UC"
    api-key="f5e62f21a185fdd6073b160fee2b83af"
    index-name="products"
    >
        <ais-input placeholder="Search products..."></ais-input>
        <ais-results class="menu">
            <template slot-scope="{ result }">
            <p>
                <a :href="`/products/${result.name}`">
                    <ais-highlight :result="result" attribute-name="name"></ais-highlight>
                </a>
            </p>
            </template>
        </ais-results>
    </ais-index>
</template>

<script>
    import event from '../event'

    export default {
        props: [
            'id',
            'app-key',
            'name'
        ]
    }
</script>