<template>
    <div :class="{ 'field-error': errors[this.sendAs] }">
        <label 
            class="image-upload"
            @dragover.prevent="enter"
            @dragenter.prevent="enter"
            @dragleave.prevent="leave"
            @dragend.prevent="leave"
            @drop.prevent="drop"
        >
            <input type="file" v-on:change="fileChange" :name="sendAs">

            <div v-if="image.path">
                <img :src="image.path" alt="Current image" draggable="false" class="image-image">
            </div>
            
            <span class="image-button" v-else>+</span>
        </label>

        <span class="field-helper" v-if="errors[this.sendAs]">
            {{ errors[this.sendAs][0] }}
        </span>

        <div v-if="image.path">
            <input type="hidden" name="image_id" :value="image.id">
        </div>
    </div>
</template>

<script>
    import upload from '../mixins/upload'

    export default {
        props: [
            'currentImage'
        ],
        data () {
            return {
                errors: [],
                image: {
                    id: null,
                    path: this.currentImage
                }
            }
        },
        mixins: [
            upload
        ],
        methods: {
            enter () {
                this.isDraggedOver = true
            },
            leave () {
                this.isDraggedOver = false
            },
            drop (e) {
                this.leave()
            },
            fileChange (e) {
                this.upload(e).then((response) => {

                    this.image.id = response.data.data.id
                    this.image.path = '/' + response.data.data.path
                    
                }).catch((error) => {

                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors

                        return
                    }

                    this.errors = 'Something went wrong. Try again.'
                })
            }
        }
    }
</script>
