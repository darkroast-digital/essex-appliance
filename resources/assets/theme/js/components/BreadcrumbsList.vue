<template>
    <div>
        <ul class="breadcrumbs">
            <li>
                <a href="/"><i class="fas fa-home"></i></a>
            </li>
            <li v-for="(path, key) in pathParts" :key="key"><a :href="path.fullPath">{{ path.name.replace(/%20/g, ' ').replace(/%C2%AE/g, '&reg;').replace(/%22/g, '"').replace(/-/g, ' ') }}</a></li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: [
            'url'
        ],
        data () {
            return {
                pathParts: []
            }
        },
        mounted() {
            this.splitPath()
        },
        methods: {
            splitPath () {
                let split = this.url.split('/')
                split.splice(0, 3)

                let paths = split.map((part, i) => {

                    let fullPath = '/'

                    if (i === 0) {
                        fullPath = `/${split[i]}/`
                    } else {
                        fullPath = `/${split.splice(0, i + 1).join('/')}/`
                    }

                    return {
                        name: part,
                        fullPath: fullPath || '/'
                    }
                })

                this.pathParts = paths
            }
        }
    }
</script>