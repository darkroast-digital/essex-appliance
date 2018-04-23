<template>
    <div class="sidebarlist">
        <sidebar-item v-for="category in categories" :data="category" :key="category.id" query="category"></sidebar-item>
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

        data() {
            return {
                categories: []
            }
        },

        mounted() {
            axios.get(this.api)
                .then(response => {
                    this.categories = response.data.data.categories
                })
                .catch(errors => {
                    console.log(errors)
                })
        }
    }
</script>