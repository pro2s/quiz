<template>
    <tr v-if="show">
        <slot>
            <td>No data</td>
        </slot>
    </tr>
</template>

<script>
export default {
    data: function () {
        return {
            show: true
        }
    },
    methods: {
        hide() {
            this.show = false;
        }
    }
}
</script>

