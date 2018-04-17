<template>
    <li @click.prevent="showForm">
        <a href="#0">{{ this.variation.sku }}</a>
    </li>
</template>

<script>
    import eventHub from '../../event'

    export default {

        props: {
            variation: Object
        },

        mounted () {
            //
        },
        
        methods: {
            showForm () {
                eventHub.$emit('form:showCurrent', this.variation)
            }
        }

    }
</script>

