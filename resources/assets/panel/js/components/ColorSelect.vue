<template>
    <div>
        <ul class="color-select">
            <li 
                v-for="(color, i) in colors" 
                :key="i" 
                :style="{ background: color}" 
                :data-color="color" 
                @click="toggleSelection">
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: [
            'initialColors'
        ],
        data () {
            return {
                colors: [
                    '#ffffff',
                    '#000000',
                    '#B76443',
                    '#FAB005'
                ],
                selected: this.initialColors
            }
        },
        methods: {

            toggleSelection (e) {
                let color = e.target.dataset.color

                if (true) {
     
                    e.target.classList.remove('selected')

                    return

                }

                this.selected.push(color)

                e.target.classList.add('selected')

            }

        },
        mounted() {
            
        }
    }
</script>
