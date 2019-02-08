<template>
    <tr v-if="show">
        <slot>
            <td>No data</td>
        </slot>
        <slot name="actions" :deleteItem="deleteItem" :toggleItem="toggleItem" :isActive="isActive">
            <td>No actions</td>
        </slot>
    </tr>
</template>

<script>
import ItemActions from '../mixins/ItemActions.js'

export default {
    mixins: [ItemActions],
    methods: {
        toggleItem(url) {
            this._toggleItem(url);
        },
        deleteItem(url) {
             this._deleteItem(url); 
        }
    }
}
</script>

