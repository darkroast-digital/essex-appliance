<template>
    <div>
        <ul class="color-select">
            <li 
                v-for="(color, i) in colors" 
                :key="i" 
                :style="{ background: color.hex}" 
                :data-color="color.slug" 
                @click="toggleSelection"
                :data-tooltip="color.name"
                :class="{ 'selected' : selected.includes(color.slug) }"
            >
            <span class="checked"></span>
            </li>
        </ul>
        <div v-if="model === 'variation'"></div>
        <input v-if="selected" type="hidden" :name="model === 'product' ? 'colors' : 'variation_colors'" :value="selected">
    </div>
</template>

<script>
    import eventHub from '../event'

    export default {
        props: [
            'productId',
            'model'
        ],

        data () {
            return {
                colors: [],
                selected: [],
                initial: []
            }
        },

        created() {
            axios.get('/api/colors')
                .then(response => {
                    this.colors = response.data.data.colors
                })

            if (this.productId !== '') {
                axios.get(`/api/${this.model === 'product' ? 'products' : 'variations'}/${this.productId}`)
                    .then(response => {

                        this.selected = response.data.data.colors

                    }).catch(error => {
                        console.log(error)
                    })
            }
        },

        mounted () {
            eventHub.$on('form:showCurrent', this.populateCurrentColors)
            eventHub.$on('variation:clear', this.clearSelectedColors)
        },

        methods: {

            toggleSelection (e) {
                let color = e.target.dataset.color

                if (this.selected.includes(color)) {
                    let index = this.selected.indexOf(color)
                    
                    this.selected.splice(index, 1)
                    e.target.classList.remove('selected')

                    return

                }

                this.selected.push(color)

                if (this.model !== 'product') {
                    eventHub.$emit('variation:colorsAdded', this.selected)
                }

                e.target.classList.add('selected')

            },

            populateCurrentColors (data) {
                if (data.colors !== null && this.model === 'variation') {
                        data.colors.forEach(color => {
                            this.selected.push(color)
                        })
                }
            },

            clearSelectedColors () {
                if (this.model === 'variation') {
                    this.selected = []
                }
            }

        }
    }
</script>
