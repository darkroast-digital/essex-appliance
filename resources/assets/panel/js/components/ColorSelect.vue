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
        <input v-if="selected" type="hidden" name="colors" :value="selected">
    </div>
</template>

<script>
    export default {
        props: [
            'productId'
        ],

        data () {
            return {
                colors: [],
                selected: []
            }
        },

        created() {
            axios.get('/api/colors')
                .then(response => {
                    this.colors = response.data.data.colors
                })

            if (this.productId !== '') {
                axios.get(`/api/products/${this.productId}`)
                    .then(response => {
                        this.selected = response.data.data.colors
                    })
            }
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

                e.target.classList.add('selected')

            }

        }
    }
</script>
