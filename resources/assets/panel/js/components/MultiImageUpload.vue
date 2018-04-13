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
        <input type="hidden" :name="model === 'product' ? '_images' : '_variation_images'" :value="imageIds" v-if="imageIds.length > 0">
    </div>
</template>

<script>
    import eventHub from '../event'

    export default {
        props: [
            'endpoint',
            'productId',
            'model'
        ],

        data () {
            return {
                errors: [],
                images: [],
                uploading: false,
                imageIds: []
            }
        },

        created() {

            if (this.productId !== '') {
                axios.get(`/api/${this.model === 'product' ? 'products' : 'variations'}/${this.productId}`)
                    .then(response => {
                        this.images = response.data.data.images
                    })
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

                    this.upload(file)
                        .then(response => {
                            this.imageIds.push(response.data.data.id)

                            if (this.model !== 'product') {
                                eventHub.$emit('variation:imagesAdded', this.imageIds)
                            }

                            reader.readAsDataURL(file)
                        }).catch((error) => {

                        if (error.response.status == 422) {
                            this.errors = error.response.data.errors

                            return
                        }

                        this.errors = 'Something went wrong. Try again.'
                    })
                }

            },

            upload (file) {
                this.uploading = true

                return axios.post(this.endpoint, this.packageUpload(file))
                    .then(response => {
                        this.uploading = false

                        return Promise.resolve(response)
                    })
                    .catch(error => {
                        this.uploading = false

                        return Promise.reject(error)
                    })
            },

            packageUpload (file) {
                let fileData = new FormData()

                fileData.append('image', file)

                return fileData
            }
        }
    }
</script>
