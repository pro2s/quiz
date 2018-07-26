<template>
    <tr v-if="show">
        <slot>
            <td>No data</td>
        </slot>
        <slot name="actions" :deleteQuiz="deleteQuiz" :toggleQuiz="toggleQuiz" :isActive="isActive">
            <td>No actions</td>
        </slot>
    </tr>
</template>

<script>
import QuizActions from '../mixins/QuizActions.js'

export default {
    mixins: [QuizActions],
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

