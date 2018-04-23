<template>
    <div>
        <variation-form></variation-form>
        <ul class="variation-list">
            <variation-item v-for="(variation, i) in variations" :key="i" :variation="variation"></variation-item>
        </ul>
        <hr v-if="this.variations.length > 0">
        <input type="hidden" name="_variations" v-if="this.variations.length > 0" :value="variationIds">
        <button @click.prevent="toggleForm">Add variation</button>
    </div>
</template>

<script>
    import VariationItem from './VariationItem'
    import VariationForm from './VariationForm'
    import eventHub from '../../event'

    export default {
        
        components: {
            VariationForm,
            VariationItem
        },

        props: [
            'productId'
        ],

        data () {
            return {
                variations: [],
                variationIds: []
            }
        },

        mounted () {
            if (this.productId !== '') {
                axios.get(`/api/variations/product/${this.productId}`)
                    .then(response => {

                        this.variations = response.data.data

                    }).catch(error => {
                        console.log(error)
                    })
            }

            eventHub.$on('variation:saved', this.pushVariation)
            eventHub.$on('variation:deleted', this.removeVariation)
        },

        methods: {
            toggleForm () {
                eventHub.$emit('form:toggle')
            },

            pushVariation (data) {
                for (let index = 0; index < this.variations.length; index++) {
                    let variation = this.variations[index];
                    
                    if (data.sku === variation.sku) {
                        variation = data
                        return
                    }
                }

                this.variationIds.push(data.id)
                this.variations.push(data)
            },

            removeVariation (data) {
                for (let i = 0; i < this.variations.length; i++) {
                    let variation = this.variations[i]
                    
                    if (data.sku === variation.sku) {
                        let index = this.variations.indexOf(5)
                        this.variations.splice(index, 1)

                        return
                    }
                }

            }
        }

    }
</script>

