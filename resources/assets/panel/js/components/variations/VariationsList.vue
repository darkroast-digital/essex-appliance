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

        data () {
            return {
                variations: [],
                variationIds: []
            }
        },

        mounted () {
            eventHub.$on('variation:saved', this.pushVariation)
        },

        methods: {
            toggleForm () {
                eventHub.$emit('form:toggle')
            },

            pushVariation (data) {
                console.log(data)

                this.variationIds.push(data.id)
                this.variations.push(data)
            }
        }

    }
</script>

