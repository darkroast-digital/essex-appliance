<template>
    <div class="pagination">
        <div class="item-count">
            <p>{{ data.total }} item(s)</p>
        </div>

        <div class="pages">
            <p>Pages:</p> 
            <ul class="page-count">
                <li v-if="currentPage > '1'"><a :href="'/products?page=' + prevPage"><i class="fas fa-caret-left"></i></a></li>
                <li v-if="prevPage >= '1'"><a :href="'/products?page=' + prevPage">{{ prevPage }}</a></li>
                <li class="current-page"><a :href="'/products?page=' + currentPage">{{ currentPage }}</a></li>
                <li v-if="currentPage != data.total_pages"><a :href="'/products?page=' + nextPage">{{ nextPage }}</a></li>
                <li v-if="currentPage != data.total_pages"><a :href="'/products?page=' + nextPage"><i class="fas fa-caret-right"></i></a></li>
            </ul>
        </div>
    </div>
</template>

<script>
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
                return 1 - this.data.current_page
            }
        }
    }
</script>