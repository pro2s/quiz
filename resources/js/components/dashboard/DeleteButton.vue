<template>
    <button @click="deleteItem">
        <slot/>
    </button>    
</template>
<script>
import ItemActions from '@/mixins/ItemActions.js'

export default {
    mixins: [ItemActions],
    props: {
        url: {
            type: String,
            required: true
        },
    },
    methods: {
        deleteItem() {
            this._deleteItem(this.url);
        },
        hide() {
             this.$el.parentElement.style.display = 'none';   
        }
    }
}
</script>
