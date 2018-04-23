<template>
    <div class="pagination">
        <div class="item-count">
            <p>{{ data.total }} item(s)</p>
        </div>

        <div class="pages">
            <p>Pages:</p> 
            <ul class="page-count">
                <li v-if="currentPage > '1'"><a href="#0" @click.prevent="paginationClicked(prevPage)"><i class="fas fa-caret-left"></i></a></li>
                <li v-if="prevPage > '0'"><a href="#0" @click.prevent="paginationClicked(prevPage)">{{ prevPage }}</a></li>
                <li class="current-page"><a href="#0" @click.prevent="paginationClicked(currentPage)">{{ currentPage }}</a></li>
                <li v-if="currentPage != data.total_pages"><a href="#0" @click.prevent="paginationClicked(nextPage)">{{ nextPage }}</a></li>
                <li v-if="currentPage != data.total_pages"><a href="#0" @click.prevent="paginationClicked(nextPage)"><i class="fas fa-caret-right"></i></a></li>
            </ul>
        </div>
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
                // 
            }
        },

        computed: {
            currentPage() {
                return this.data.current_page
            },

            nextPage() {
                return 1 + this.data.current_page
            },

            prevPage() {
                return -1 + this.data.current_page
            }
        },

        methods: {
            paginationClicked(pageNumber) {
                eventHub.$emit('pagination:clicked', pageNumber)
            }
        }
    }
</script>