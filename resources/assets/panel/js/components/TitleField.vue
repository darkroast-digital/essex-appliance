<template>
    <div class="title-field">
        <input type="text" name="name" autocomplete="off" :value="title" placeholder="Add Product Name">
    </div>
</template>

<script>
    export default {
        props: [
            'currentTitle'
        ],
        data () {
            return {
                title: this.currentTitle,
                editable: true
            }
        },
        mounted() {
            console.log('Here')
        }
    }
</script>
