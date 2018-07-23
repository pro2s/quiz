<template>
    <button v-confirm="{ok: doDelete, message: 'Some confirmation message'}">
        <slot>Content</slot> 
    </button>
</template>

<script>
import axios from 'axios'
export default {
    props: {
        url: {
            type: String,
            required: true
        }
    },
    methods: {
        doDelete(e) {
            axios.delete(this.url).then(() => {
                this.$parent.$data.show = false
            });
        }
    }
}
</script>