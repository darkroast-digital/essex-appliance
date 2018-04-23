<template>
    <li>
        <a href="#0" @click.prevent="showForm">{{ variation.sku }}</a>
        <span class="variation-trash" @click.prevent="deleteVariation">
            <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 20 20" width="20" height="20" class="icon table-icon trash">
                <g>
                    <path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"></path>
                </g>
            </svg>
        </span>
    </li>
</template>

<script>
    import eventHub from '../../event'

    export default {

        props: {
            variation: Object
        },

        mounted () {
            //
        },
        
        methods: {
            showForm () {
                eventHub.$emit('form:showCurrent', this.variation)
            },

            deleteVariation() {
                axios.post(`/panel/variations/delete/${this.variation.id}`)
                    .then(response => {
                        eventHub.$emit('variation:deleted', this.variation)
                    }).catch(error => {
                        console.log(error)
                    })
            }
        }

    }
</script>

<style lang="scss" scoped>
    li {
        display: flex;

        &:before {
            content: '•';
            margin-right: 0.5rem;
        }

        &:hover {

            span {
                opacity: 1;
                pointer-events: all;
            }
        }

        span {
            margin-left: auto;
            opacity: 0;
            pointer-events: none;
            transition: all .2s ease-in-out;
        }
    }
</style>
