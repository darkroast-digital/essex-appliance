<template>
    <div class="sidebarItem">
        <label class="checkbox">
            <input type="checkbox" :name="data.slug" @click="itemClicked">
            <span class="checkbox-button"></span>
            {{ data.name }}
        </label>
        <div class="count">({{ data.count }})</div>
    </div>
</template>

<script>
    import eventHub from '../event'

    export default {
        props: [
            'data',
            'query'
        ],

        methods: {
            itemClicked (e) {
                eventHub.$emit('item:clicked', {
                    type: this.query,
                    query: this.data.slug
                })
            }
        }
    }
</script>