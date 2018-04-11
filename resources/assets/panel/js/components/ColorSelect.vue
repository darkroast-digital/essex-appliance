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
            >
            <span class="checked"></span>
            </li>
        </ul>
        <input v-if="selected" type="hidden" name="colors" :value="selected">
    </div>
</template>

<script>
    export default {
        props: {
            initialColors: {
                type: Array,
                default: () => []
            }
        },
        data () {
            return {
                colors: [],
                selected: this.initialColors
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

        },

        created() {
            axios.get('/api/colors')
                .then(response => {
                    this.colors = response.data.data.colors
                })
        },

        mounted() {
          //
        }
    }
</script>
