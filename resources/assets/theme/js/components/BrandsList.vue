<template>
    <div class="sidebarlist">
        <sidebar-item v-for="brand in brands" :data="brand" :key="brand.id" query="brand"></sidebar-item>
    </div>
</template>

<script>
    import eventHub from '../event'
    import sidebarItem from './SidebarItem'

    export default {
        
        components: {
            sidebarItem
        },

        props: [
            'api'
        ],

        data () {
            return {
                brands: []
            }
        },

        mounted () {
            axios.get(this.api)
                .then(response => {
                    this.brands = response.data.data.brands
                })
        }
    }
</script>