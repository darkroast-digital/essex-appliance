<template>
    <div>
        <ul class="color-select">
            <li v-for="(color, i) in colors" :key="i" :style="{ background: color}"></li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: [
            'selectedColors'
        ],
        data () {
            return {
                colors: {
                    white: '#ffffff',
                    black: '#000000',
                    copper: '#B76443',
                    gold: '#FAB005'
                },
                selected: this.initalColors
            }
        },
        mounted() {
            //
        }
    }
</script>
