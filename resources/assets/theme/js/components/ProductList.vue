<template>
    <div :class="{ 'is-loading' : isFetchingNewData }">
        <div class="pagination__container column-12">
            <hr>
            <pagination-list :data="pagination"></pagination-list>
        </div>
        
        <div class="container container-full products-wrapper">
            <product v-for="product in products" :product="product" :key="product.id" class="column-4"></product>
            <p v-if="emptyProducts" class="no-products">Sorry, no products match your search.</p>
        </div>

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
            'endpoint',
            'initialQuery'
        ],

        data() {
            return {
                products: [],
                pagination: [],
                isFetchingNewData: false,
                queries: {
                    category: [],
                    brand: [],
                    color: []
                },
                urlAppend: '',
                sortingType: '',
                pageLength: '',
                apiEndpoint: this.endpoint + this.initialQuery,
                emptyProducts: false
            }
        },

        created() {
            // Add spinner overlay to products
            this.isFetchingNewData = true

            axios.get(this.apiEndpoint)
                .then(response => {
                    this.products = response.data.data
                    this.pagination = response.data.meta.pagination

                    // Add spinner overlay to products
                    this.isFetchingNewData = false
                })
        }, 

        mounted() {
            eventHub.$on('item:clicked', this.fetchNewData)
            eventHub.$on('item:changed', this.sortNewData)
            eventHub.$on('pagination:clicked', this.newPage)
        },

        methods: {
            fetchNewData(queryString) {
                console.log(queryString)

                this.apiEndpoint = this.endpoint

                // Add spinner overlay to products
                this.isFetchingNewData = true

                /**
                 * If query string is passed through, check type and push 
                 * into corresponding array:
                 *
                 * Category types into categories array
                 * Brand types into brands array
                 * Color types into colors array
                 */
                if (queryString != undefined) {
                    if (queryString.type == 'category') {
                        this.queries.category.push(queryString.query)
                    } else if (queryString.type == 'brand') {
                        this.queries.brand.push(queryString.query)
                    } else if (queryString.type == 'color') {
                        this.queries.color.push(queryString.query)
                    }
                }

                // Set variables to be used to create query string
                var catString = 'category='
                var brandString = 'brand='
                var colorString = 'color='

                var firstQuery = ''
                var featuredItems = ''

                if (this.initialQuery.includes('category')) {
                    firstQuery = this.initialQuery.slice(1)
                    catString = firstQuery + ','
                } else if (this.initialQuery.includes('brand')) {
                    firstQuery = this.initialQuery.slice(1)
                    brandString = firstQuery + ','
                } else if (this.initialQuery.includes('color')) {
                    firstQuery = this.initialQuery.slice(1)
                    colorString = firstQuery + ','
                } else if (this.initialQuery.includes('featured')) {
                    featuredItems = this.initialQuery.slice(1)

                    if (!this.urlAppend.includes('featured')) {
                        this.urlAppend += featuredItems
                    }
                }

                /**
                 * Loop for the number of items in the categories array.
                 * Check array to see if category item already exists in array.
                 * 
                 * If not, add the category item and a comma to variable catString.
                 * 
                 * If category item exists, replace it and the following comma with 
                 * an empty string to remove it from the query, as it has been deselected
                 */
                for (let i = 0; i < this.queries.category.length; i++) {
                    if (!catString.includes(this.queries.category[i])) {
                        catString += this.queries.category[i] + ','
                    } else {
                        catString = catString.replace(this.queries.category[i] + ',', '')
                    }
                }

                /**
                 * Loop for the number of items in the brands array.
                 * Check array to see if brand item already exists in array.
                 * 
                 * If not, add the brand item and a comma to variable brandString.
                 * 
                 * If brand item exists, replace it and the following comma with 
                 * an empty string to remove it from the query, as it has been deselected
                 */
                for (let i = 0; i < this.queries.brand.length; i++) {
                    if (!brandString.includes(this.queries.brand[i])) {
                        brandString += this.queries.brand[i] + ','
                    } else {
                        brandString = brandString.replace(this.queries.brand[i] + ',', '')
                    }
                }

                /**
                 * Loop for the number of items in the colors array.
                 * Check array to see if color item already exists in array.
                 * 
                 * If not, add the color item and a comma to variable colorString.
                 * 
                 * If color item exists, replace it and the following comma with 
                 * an empty string to remove it from the query, as it has been deselected
                 */
                for (let i = 0; i < this.queries.color.length; i++) {
                    if (!colorString.includes(this.queries.color[i])) {
                        colorString += this.queries.color[i] + ','
                    } else {
                        colorString = colorString.replace(this.queries.color[i] + ',', '')
                    }
                }

                // Split current url query string at every '&' and set in an array variable
                var checkForItem = this.urlAppend.split('&')

                // Set variables to test strings against

                var currentPageNumber = ''  // Checks if there is a page number in url string
                var catExists = ''          // Checks if a 'category' query string exists
                var brandExists = ''        // Checks if a 'brand' query string exists
                var colorExists = ''        // Checks if a 'color' query string exists

                /**
                 * For the number of items in the original query string:
                 * 
                 * Check if item contains 'page', 'category', 'brand', or 'color'
                 * If so, assign that item to the corresponding variable.
                 *
                 * Containing 'page' => currentPageNumber
                 * Containing 'category' => catExists
                 * Containing 'brand' => brandExists
                 * Containing 'color' => colorExists
                 */
                for (let i = 0; i < checkForItem.length; i++) {
                    if (checkForItem[i].includes('page')) {
                        currentPageNumber = checkForItem[i]
                    }

                    if (checkForItem[i].includes('category')) {
                        catExists = checkForItem[i]
                    }

                    if (checkForItem[i].includes('brand')) {
                        brandExists = checkForItem[i]
                    }

                    if (checkForItem[i].includes('color')) {
                        colorExists = checkForItem[i]
                    }
                }

                /**
                 * If catString variable includes more than 'category=':
                 *
                 * 1) Remove last comma from string
                 * 2) Check if the catExists (existing category string) variable is equal to the new 
                 *     query string passed in and set catString (new category string) to an empty string
                 *     if it does
                 * 3) Check if catString variable contains only 'category' and set it to
                 *     an empty string if it does
                 */
                if (catString.length >= 9) {
                    catString = catString.slice(0, -1)
                    
                    if (catExists == ('category=' + queryString.query)) {
                        catString = ''
                    }

                    if (catString == 'category') {
                        catString = ''
                    }

                    /**
                     * If the url string doesn't already contain a 'category' section, run 
                     * the following checks:
                     *
                     * 1) If the url string is empty, replace catExists (existing category string) with catString (new category string) and append
                     *     catString to end of url string
                     * 2) If the url string begins with 'category', replace catExists with catString 
                     *     and append catString to end of url string
                     * 3) If neither is true, replace catExists with catString and append 
                     *     catString to end of url string, followed by an '&'
                     *
                     * If the url string already contains the 'category' section, replace catExists
                     *     with catString and append to end of url string, followed by an '&'
                     */
                    if (!this.urlAppend.includes('&category')) {
                        if (this.urlAppend == '') {
                            this.urlAppend = this.urlAppend.replace(catExists, catString)
                        } else if (this.urlAppend.substring(0, 3) == 'cat') {
                            this.urlAppend = this.urlAppend.replace(catExists, catString)
                        } else {
                            this.urlAppend = this.urlAppend.replace(catExists, catString + '&')
                        }
                    } else {
                        this.urlAppend = this.urlAppend.replace(catExists, catString + '&')
                    }
                }

                /**
                 * If brandString variable includes more than 'brand=':
                 *
                 * 1) Remove last comma from string
                 * 2) Check if the brandExists (existing brand string) variable is equal to the new 
                 *     query string passed in and set brandString (new brand string) to an empty string
                 *     if it does
                 * 3) Check if brandString variable contains only 'brand' and set it to
                 *     an empty string if it does
                 */
                if (brandString.length >= 6) {
                    brandString = brandString.slice(0, -1)

                    if (brandExists == ('brand=' + queryString.query)) {
                        brandString = ''
                    }

                    if (brandString == 'brand') {
                        brandString = ''
                    }

                    /**
                     * If the url string doesn't already contain a 'brand' section, run 
                     * the following checks:
                     *
                     * 1) If the url string is empty, replace brandExists (existing brand string) with
                     *     brandString (new brand string) and append brandString to end of url string
                     * 2) If the url string begins with 'brand', replace brandExists with brandString 
                     *     and append brandString to end of url string
                     * 3) If neither is true, replace brandExists with brandString and append 
                     *     brandString to end of url string, followed by an '&'
                     *
                     * If the url string already contains the 'brand' section, replace brandExists
                     *     with brandString and append to end of url string, followed by an '&'
                     */
                    if (!this.urlAppend.includes('&brand')) {
                        if (this.urlAppend == '') {
                            this.urlAppend = this.urlAppend.replace(brandExists, brandString)
                        } else if (this.urlAppend.substring(0, 3) == 'bra') {
                            this.urlAppend = this.urlAppend.replace(brandExists, brandString)
                        } else {
                            this.urlAppend = this.urlAppend.replace(brandExists, brandString + '&')
                        }
                    } else {
                        this.urlAppend = this.urlAppend.replace(brandExists, brandString + '&')
                    }

                }

                /**
                 * If colorString variable includes more than 'color=':
                 *
                 * 1) Remove last comma from string
                 * 2) Check if the colorExists (existing color string) variable is equal to the new 
                 *     query string passed in and set colorString (new color string) to an empty string
                 *     if it does
                 * 3) Check if colorString variable contains only 'color' and set it to
                 *     an empty string if it does
                 */
                if (colorString.length >= 6) {
                    colorString = colorString.slice(0, -1)
                    
                    if (colorExists == ('color=' + queryString.query)) {
                        colorString = ''
                    }

                    if (colorString == 'color') {
                        colorString = ''
                    }

                    /**
                     * If the url string doesn't already contain a 'color' section, run 
                     * the following checks:
                     *
                     * 1) If the url string is empty, replace colorExists (existing color string) with
                     *     colorString (new color string) and append colorString to end of url string
                     * 2) If the url string begins with 'color', replace colorExists with colorString 
                     *     and append colorString to end of url string
                     * 3) If neither is true, replace colorExists with colorString and append 
                     *     colorString to end of url string, followed by an '&'
                     *
                     * If the url string already contains the 'color' section, replace colorExists
                     *     with colorString and append to end of url string, followed by an '&'
                     */
                    if (!this.urlAppend.includes('&color')) {
                        if (this.urlAppend == '') {
                            this.urlAppend = this.urlAppend.replace(colorExists, colorString)
                        } else if (this.urlAppend.substring(0, 3) == 'col') {
                            this.urlAppend = this.urlAppend.replace(colorExists, colorString)
                        } else {
                            this.urlAppend = this.urlAppend.replace(colorExists, colorString + '&')
                        }
                    } else {
                        this.urlAppend = this.urlAppend.replace(colorExists, colorString + '&')
                    }
                }
                
                // Replace current page number with an empty string
                this.urlAppend = this.urlAppend.replace(currentPageNumber, '')

                // Replace any instances of '&&' with a single '&'
                this.urlAppend = this.urlAppend.replace(/&&/g, '&')

                // If first character of url string is '&', remove it
                if (this.urlAppend.charAt(0) == '&') {
                    this.urlAppend = this.urlAppend.slice(1)
                }

                // If last character of url string is '&', remove it
                if (this.urlAppend.charAt(this.urlAppend.length - 1) == '&') {
                    this.urlAppend = this.urlAppend.slice(0, -1)
                }

                // If url ends with '&', remove it
                if (this.apiEndpoint.charAt(this.apiEndpoint.length - 1) == '?') {
                    this.apiEndpoint = this.apiEndpoint.slice(0, -1)
                }

                // console.log(this.urlAppend)

                // Pass url string to endpoint
                axios.get(`${this.apiEndpoint}?${this.urlAppend}`)
                    .then(response => {
                        // Get products
                        this.products = response.data.data

                        if (this.products.length < 1) {
                            this.emptyProducts = true
                        } else {
                            this.emptyProducts = false
                        }

                        // Get pagination
                        this.pagination = response.data.meta.pagination

                        //Remove spinner from products
                        this.isFetchingNewData = false
                    })
            },

            sortNewData(queryString) {

                // Add spinner to products
                this.isFetchingNewData = true

                /**
                 * If the query string includes 'sortBy', check if the sortingType also includes 
                 * the query string. 
                 *
                 * If no, set sortingType to the query string
                 * If yes, replace the sortingType with an empty string
                 */
                if (queryString.includes('sortBy')) {
                    if (!this.sortingType.includes(queryString)) {
                        this.sortingType = queryString
                    } else {
                        this.sortingType = this.sortingType.replace(queryString, '')
                    }
                }

                /**
                 * If the query string includes 'pageLength', check if the pageLength also includes 
                 * the query string. 
                 *
                 * If no, set pageLength to the query string
                 * If yes, replace the pageLength with an empty string
                 */
                if (queryString.includes('pageLength')) {
                    if (!this.pageLength.includes(queryString)) {
                        this.pageLength = queryString
                    } else {
                        this.pageLength = this.pageLength.replace(queryString, '')
                    }
                }

                // Split current url query string at every '&' and set in an array variable
                var checkForItem = this.urlAppend.split('&')

                // Set variables to test strings against
                var sortExists = ''  // Checks if a sorting query string exists
                var pageExists = ''  // Checks if a page length query string exists

                /**
                 * For the number of items in the original query string:
                 * 
                 * Check if item contains 'sort' or 'page'
                 * If so, assign that item to the corresponding variable.
                 *
                 * Containing 'sort' => sortExists
                 * Containing 'page' => pageExists
                 */
                for (let i = 0; i < checkForItem.length; i++) {
                    if (checkForItem[i].includes('sort')) {
                        sortExists = checkForItem[i]
                    }

                    if (checkForItem[i].includes('page')) {
                        pageExists = checkForItem[i]
                    }
                }

                /**
                 * If sort string is not empty, replace existing sort string with the new one
                 * 
                 * If sort string is empty, append sortingType to the url string, prefaced by a
                 * '&' if url string is empty
                 */
                if (sortExists != '') {
                    this.urlAppend = this.urlAppend.replace(sortExists, '&' + this.sortingType)
                } else {
                    if (this.urlAppend == '') {
                        this.urlAppend += this.sortingType
                    } else {
                        this.urlAppend += '&' + this.sortingType
                    }
                }

                 /**
                 * If page length string is not empty, replace existing page length string with the new one
                 * 
                 * If page length string is empty, append pageLength to the url string, prefaced by a
                 * '&' if url string is empty
                 */
                if (pageExists != '') {
                    this.urlAppend = this.urlAppend.replace(pageExists, '&' + this.pageLength)
                } else {
                    if (this.urlAppend == '') {
                        this.urlAppend += this.pageLength
                    } else {
                        this.urlAppend += '&' + this.pageLength
                    }
                }


                // Replace any instances of '&&' with a single '&'
                this.urlAppend = this.urlAppend.replace(/&&/g, '&')

                // If first character of url string is '&', remove it
                if (this.urlAppend.charAt(0) == '&') {
                    this.urlAppend = this.urlAppend.slice(1)
                }

                // If last character of url string is '&', remove it
                if (this.urlAppend.charAt(this.urlAppend.length - 1) == '&') {
                    this.urlAppend = this.urlAppend.slice(0, -1)
                }

                // If url ends with '&', remove it
                if (this.apiEndpoint.charAt(this.apiEndpoint.length - 1) == '?') {
                    this.apiEndpoint = this.apiEndpoint.slice(0, -1)
                }
                
                // console.log(this.urlAppend)

                // Append url string to url
                axios.get(`${this.apiEndpoint}?${this.urlAppend}`)
                    .then(response => {
                        // Get products
                        this.products = response.data.data

                        // Get pagination
                        this.pagination = response.data.meta.pagination

                        // Remove spinner
                        this.isFetchingNewData = false
                    })
            },

            newPage(pageNumber) {

                // Add spinner to products
                this.isFetchingNewData = true

                var prev = -1 + pageNumber      // Previous page = current page - 1
                var next = 1 + pageNumber       // Next page = current page + 1

                // If url string includes previous page, replace it with empty string
                if (this.urlAppend.includes('page=' + prev)) {
                    this.urlAppend = this.urlAppend.replace('page=' + prev, '')
                }

                // If url string includes next page, replace it with empty string
                if (this.urlAppend.includes('page=' + next)) {
                    this.urlAppend = this.urlAppend.replace('page=' + next, '')
                }

                // Append chosen page number to url
                this.urlAppend += '&' + `page=${pageNumber}`

                // Replace '&&' with '&'
                this.urlAppend = this.urlAppend.replace(/&&/g, '&')

                // If url starts with '&', remove it
                if (this.urlAppend.charAt(0) == '&') {
                    this.urlAppend = this.urlAppend.slice(1)
                }

                // If url ends with '&', remove it
                if (this.urlAppend.charAt(this.urlAppend.length - 1) == '&') {
                    this.urlAppend = this.urlAppend.slice(0, -1)
                }

                // If url ends with '&', remove it
                if (this.apiEndpoint.charAt(this.apiEndpoint.length - 1) == '?') {
                    this.apiEndpoint = this.apiEndpoint.slice(0, -1)
                }

                // Append url string to endpoint
                axios.get(`${this.apiEndpoint}?${this.urlAppend}`)
                    .then(response => {
                        // Get products
                        this.products = response.data.data

                        // Get pagination
                        this.pagination = response.data.meta.pagination

                        // Remove spinner
                        this.isFetchingNewData = false
                    })

            }
        }

    }
</script>