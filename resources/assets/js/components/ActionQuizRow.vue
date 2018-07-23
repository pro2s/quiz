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
import QuizActions from '../mixins/QuizActions.js'

export default {
    mixins: [QuizActions],
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
            this._toggleQuiz(url);
        },
        deleteQuiz(url) {
             this._deleteQuiz(url); 
        }
    }
}
</script>

