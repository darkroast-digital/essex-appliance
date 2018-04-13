<template>
    <button @click="buttonClicked">Click me</button>
</template>

<script>
    import eventHub from '../event'

    export default {

        props: [
            'queryString'
        ],
        
        methods: {
            buttonClicked() {
                eventHub.$emit('button:clicked', this.queryString)
            }
        }
    }
</script>