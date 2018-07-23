<template>
    <tr v-if="show">
        <slot>
            <td>No data</td>
        </slot>
        <slot name="actions" :deleteQuiz="deleteQuiz" :toggleQuiz="toggleQuiz" :activeClass="activeClass">
            <td>No actions</td>
        </slot>
    </tr>
</template>

<script>
import axios from 'axios'
export default {
    data: function () {
        return {
            show: true,
            isActive: this.active
        }
    },
    props: {
        active: {
            type: Boolean,
            default: false
        }
    },
    computed: {
        activeClass: function () {
            return {
                'btn-success': this.isActive,
                'btn-secondary': !this.isActive
            }
        }
    },
    methods: {
        toggleQuiz(url) {
            console.log(url);
            this.isActive = !this.isActive;
        },
        doDelete(url) {
            axios.delete(url).then(_ => this.hide());
        },
        deleteQuiz(url) {
            this.$dialog.confirm("Some confirmation message")
                .then(_ => this.doDelete(url))
                .catch(_ => {});
        },
        hide() {
            this.show = false;
        }
    }
}
</script>

