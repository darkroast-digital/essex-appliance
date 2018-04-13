<template>
    <div>
        <div class="pagination__container column-12">
            <hr>
            <pagination-list :data="pagination"></pagination-list>
        </div>

        <product v-for="product in products" :product="product" :key="product.id" class="column-4"></product>

        <div class="pagination__container column-12">
            <hr>
            <pagination-list :data="pagination"></pagination-list>
        </div>
    </div>
</template>

<script>
    import product from './ProductItem'
    import paginationList from './PaginationList'
    import eventHub from '../event'

    export default {
        components: {
            product,
            paginationList
        },

        props: [
            'endpoint'
        ],

        data() {
            return {
                products: [],
                pagination: []
            }
        },

        created() {
            axios.get(this.endpoint)
                .then(response => {
                    this.products = response.data.data
                    this.pagination = response.data.meta.pagination
                })
        }, 

        mounted() {
            eventHub.$on('button:clicked', this.fetchNewData)
        },

        methods: {
            fetchNewData(queryString) {
                console.log('working')
                axios.get(`${this.endpoint}/${queryString}`)
                    .then(response => {
                        this.products = response.data.data
                        this.pagination = response.data.meta.pagination
                    })
            }
        }

    }
</script>