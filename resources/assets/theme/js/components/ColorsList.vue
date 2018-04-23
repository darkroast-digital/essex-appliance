<template>
    <div class="samples__container container--full">
        <color-item v-for="color in colors" :data="color" :key="color.id"></color-item>
    </div>
</template>

<script>
    import eventHub from '../event'
    import colorItem from './ColorItem'

    export default {

        components: {
            colorItem
        },

        props: [
            'api'
        ],

        data() {
            return {
                colors: []
            }
        },

        mounted() {
            axios.get(this.api)
                .then(response => {
                    this.colors = response.data.data.colors
                })
                .catch(errors => {
                    console.log(errors)
                })
        }
    }
</script>