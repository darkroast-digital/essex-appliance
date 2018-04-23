<template>
    <div class="sorting">
        <div class="sort-by">
            <p>Sort By</p>
            <select name="sort-vars" @change="sortByChanged" ref="sortBy">
                <option value="sortBy=created_at-desc" selected>Newest</option>
                <option value="sortBy=name-asc">A-Z</option>
                <option value="sortBy=name-desc">Z-A</option>
            </select>
        </div>

        <div class="show">
            <p>Show</p>
            <select name="show-vars" @change="pageLengthChanged" ref="pageLength">
                <option value="pageLength=6">6</option>
                <option value="pageLength=9" selected>9</option>
                <option value="pageLength=12">12</option>
                <option value="pageLength=15">15</option>
            </select>
        </div>
    </div>
</template>

<script>
    import eventHub from '../event'

    export default {

        props: [
            'query'
        ],

        methods: {
            sortByChanged(e) {
                eventHub.$emit('item:changed', this.$refs.sortBy.value)
            },

            pageLengthChanged(e) {
                eventHub.$emit('item:changed', this.$refs.pageLength.value)
            }
        }
    }
</script>