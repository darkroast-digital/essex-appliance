<template>
    <li>
        <div class="variation-modal" :class="{ 'modal-open' : isActive }">
            <div class="block column-6">

                <h6>Add Product Variation: </h6>

                <hr>

                <form action="#0">

                    <div class="field">
                        <label for="variation-sku">Variation SKU</label>
                        <input type="text" name="variation-sku" :value="sku">
                    </div>

                    <!-- /.field -->

                    <div class="form-row">

                        <div class="field field-inline --has-no-margin-bottom">
                            <label>Available:</label>
                            <label class="toggle">
                                <input type="checkbox" name="available">

                                <span class="toggle-button"></span>
                            </label>
                        </div>

                        <!-- /.field -->

                        <div class="field field-inline --has-no-margin-bottom">
                            <label>Featured:</label>
                            <label class="toggle">
                                <input type="checkbox" name="featured">

                                <span class="toggle-button"></span>
                            </label>
                        </div>

                        <!-- /.field -->

                    </div>

                    <!-- /.form-row -->

                    <hr>

                    <div class="field">
                        <label>Variation Color</label>
                        <color-select></color-select>
                    </div>

                    <!-- /.field -->

                    <div class="field">
                        <label>Variation Images</label>
                        <image-upload></image-upload>
                    </div>

                    <!-- /.field -->
                    

                    <div class="button-group">
                        <button type="submit" @click.prevent="saveVariation" :class="{ 'is-loading' : isSaving }">Save Variation</button>
                        <a href="#0" class="--has-color-font" @click.prevent="toggleVisible">Cancel, and go back</a>
                    </div>

                    <!-- /.button-group -->

                </form>

                <!-- /form -->

            </div>

            <!-- /.block -->

        </div>

        <div class="variation-overlay" :class="{ 'overlay-active' : isActive }" @click.prevent="toggleVisible"><span class="overlay-close">&times;</span></div>

        <!-- /.variation-modal -->

        <a href="#0" @click.prevent="toggleVisible">{{ sku }}</a>
    </li>
</template>

<script>
    import ImageUpload from '../ImageUpload'
    import ColorSelect from '../ColorSelect'

    export default {

        components: {
            ImageUpload,
            ColorSelect
        },

        props: {
            sku: {
                default: ''
            }
        },

        data () {
            return {
                isActive: false,
                isSaving: false
            }
        },
        
        methods: {
            toggleVisible (e) {
                this.isActive = !this.isActive
            },

            saveVariation (e) {
                this.isSaving = !this.isSaving
            }
        }

    }
</script>

