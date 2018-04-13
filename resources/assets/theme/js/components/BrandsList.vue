<template>
    <div class="brandlist">
        <sidebar-item v-for="brand in brands" :brand="brand" :key="brand.id"></sidebar-item>
    </div>
</template>

<script>
    import eventHub from '../event'
    import sidebarItem from './SidebarItem'

    export default {
        
        components: {
            brand
        },

        props: [
            'queryString'
        ],
    }
</script>