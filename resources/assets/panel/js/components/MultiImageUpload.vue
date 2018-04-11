<template>
    <div class="image-uploader" :class="{ 'has-images' : images.length > 0 }">
        <label 
            class="image-upload"
            :class="{ loading: uploading }"
            @dragover.prevent="enter"
            @dragenter.prevent="enter"
            @dragleave.prevent="leave"
            @dragend.prevent="leave"
            @drop.prevent="drop"
        >
            <input type="file" name="images[]" multiple>

            <span class="image-button">+</span>
        </label>
        <div class="gallery container container-full" v-if="images.length > 0">
            <div v-for="(image, index) in images" :key="index" class="gallery-image">
                <img :src="image" draggable="false" class="--is-image-cover">
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: {
            endpoint: {
                type: String,
                default: ''
            },
            currentImages: {
                type: Array,
                default: () => []
            }
        },

        data () {
            return {
                errors: [],
                images: this.currentImages,
                uploading: false
            }
        },
        
        methods: {
            enter () {
                this.isDraggedOver = true
            },

            leave () {
                this.isDraggedOver = false
            },

            drop (e) {
                let files = e.dataTransfer.files

                this.leave()
                this.readFiles(files)
            },

            readFiles (files) {

                for (let i = 0; i < files.length; i++) {
                    let file = files[i]
                    
                    let reader = new FileReader()

                    reader.onload = () => {
                        let dataURL = reader.result
                        this.images.push(dataURL)
                    }

                    reader.readAsDataURL(file)
                }

            }
        }
    }
</script>
