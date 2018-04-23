<template>
    <div 
        class="color" 
        :class="{ 'clicked' : colorSelected }" 
        :style="'background-color:' + data.hex" 
        :title="data.name" 
        @click="itemClicked">
        <span class="checked"></span>
    </div>
</template>

<script>
    import eventHub from '../event'

    export default {
        props: [
            'data'
        ],

        data() {
            return {
                colorSelected: false
            }
        },

        methods: {
            itemClicked (e) {

                if (this.colorSelected) {
                    this.colorSelected = false
                } else {
                    this.colorSelected = true
                }

                eventHub.$emit('item:clicked', {
                    type: 'color',
                    query: this.data.slug
                })

            }
        }
    }
</script>