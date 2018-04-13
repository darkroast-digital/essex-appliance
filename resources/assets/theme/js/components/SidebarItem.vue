<template>
    <div :class="{{ tag.tag_type }}" :query-string="{{ tag.tag_type }} + '?=' + {{ tag.name }}">
        <label class="checkbox" @click="buttonClicked">
            <input type="checkbox" :name="{{ tag.name }}">
            <span class="checkbox-button"></span>
            {{ tag.name }}
        </label>
        <div class="count">({{ tag.count }})</div>
    </div>
</template>

<script>
    import eventHub from '../event'

    export default {
        props: [
            'tag'
        ]
    }
</script>