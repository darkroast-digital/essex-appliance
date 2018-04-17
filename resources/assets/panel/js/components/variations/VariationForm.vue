<template>
    <div>
        <div class="variation-modal" :class="{ 'modal-open' : isActive }">
            <div class="block column-6">

                <h6>{{ mode }} Product Variation: </h6>

                <hr>

                <form action="#0" @submit.prevent="saveVariation" ref="variationForm">

                    <div class="field">
                        <label for="variation-sku">SKU</label>
                        <input type="text" name="variation-sku" v-model="variation.sku">
                    </div>

                    <hr>

                    <div class="field">
                        <label>Variation Color:</label>
                        <color-select 
                            :product-id="variation.id ? variation.id : ''"
                            model="variation"
                        ></color-select>
                    </div>

                    <div class="field">
                        <label>Variation Images</label>
                        <multi-image-upload
                            endpoint="/media/product"
                            :product-id="variation.id ? variation.id : ''" 
                            model="model"
                        ></multi-image-upload>
                    </div>

                    <button type="submit" :class="{ 'is-loading' : isSaving }">Save Variation</button>

                </form>

                <!-- /form -->

            </div>

            <!-- /.block -->

        </div>

        <div class="variation-overlay" :class="{ 'overlay-active' : isActive }" @click.prevent="toggleVisible"><span class="overlay-close">&times;</span></div>

        <!-- /.variation-modal -->
    </div>
</template>

<script>
    import eventHub from '../../event'
    import ColorSelect from '../ColorSelect'
    import MultiImageUpload from '../MultiImageUpload'

    export default {

        components: {
            ColorSelect,
            MultiImageUpload
        },

        props: {
            sku: {
                default: ''
            },
            id: {
                default: null
            }
        },

        data () {
            return {
                isActive: false,
                isSaving: false,
                mode: 'Edit',
                variation: {
                    id: this.id,
                    sku: this.sku
                },
                images: [],
                colors: []
            }
        },

        mounted () {
            
            window.addEventListener('keyup', e => {
                
                if (e.keyCode === 27) {
                    this.toggleVisible
                }

            })

            if (this.variation.sku === '') {
                this.mode = 'Add'
            }

            eventHub.$on('form:toggle', this.toggleVisible)
            eventHub.$on('form:showCurrent', this.toggleCurrent)
            eventHub.$on('variation:imagesAdded', (data) => {
                this.images = data
            })

            eventHub.$on('variation:colorsAdded', (data) => {
                this.colors = data
            })

        },
        
        methods: {
            toggleVisible () {
                this.isActive = !this.isActive
                this.clearVariation()
            },

            toggleCurrent (data) {
                this.variation.id = data.id
                this.variation.sku = data.sku

                // this.images = data.images
                // this.colors = data.colors

                this.isActive = !this.isActive
            },

            saveVariation (e) {
                this.isSaving = true

                let data = {
                    sku: this.variation.sku,
                    _variation_images: this.images,
                    variation_colors: this.colors
                }

                axios.post('/panel/variations/store', data)
                    .then(response => {
                        eventHub.$emit('variation:saved', response.data.data)

                        this.isSaving = false
                        this.toggleVisible()

                        this.$refs.variationForm.reset()
                        this.clearVariation()
                    }).catch(error => {
                        console.log(error)
                    })

            },

            clearVariation () {
                this.variation.sku = ''
            }
        }

    }
</script>

