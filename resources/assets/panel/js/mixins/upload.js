export default {
    props: {
        endpoint: {
            type: String
        },
        sendAs: {
            type: String,
            default: 'file'
        }
    },
    data () {
        return {
            uploading: false
        }
    },
    methods: {
        upload (e, files = null) {
            this.uploading = true

            if (!files) {
                files = e.target.files
            }

            return axios.post(this.endpoint, this.packageUploads(files)).then((response) => {
                this.uploading = false

                return Promise.resolve(response)
            }).catch((error) => {
                this.uploading = false

                return Promise.reject(error)
            })
        },
        packageUploads (files) {
            let fileData = new FormData()

            for (let i = 0; i < files.length; i++) {
                fileData.append(this.sendAs, files[i])
            }

            return fileData
        }
    }
}
