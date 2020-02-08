<template>
    <button v-bind:class="{'btn-success': active, 'btn-secondary': !active}" @click="$emit('action', url)">
        <slot/>
    </button>    
</template>
<script>
export default {
    props: {
        active: {
            type: Boolean,
            default: false
        },
        url: {
            type: String,
            required: true
        },
    },
    methods: {
        clear() {
            this.$el.classList.remove("btn-outline-secondary");
        }
    },
    mounted() {
        this.clear();
    },
    updated() {
        this.clear();
    }
}
</script>
