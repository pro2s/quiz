<template>
    <div v-if="quiz">
        <b-card no-body
            :img-src="quiz.image + '&' + quiz.slug" 
            img-alt="Quiz Image" 
            img-top 
            tag="article" 
            class="mb-2"> 
                <h4 slot="header">{{quiz.name}}</h4>
                <b-card-body>
                    <p class="card-text"> 
                        {{ quiz.description }}
                    </p> 
                </b-card-body>
                <question v-if="quiz.question" :quiz-slug="quiz.slug" :question="quiz.question" />
            </b-card> 
    </div>
</template> 

<script> 
import Question from './Question.vue'; 
export default { 
    props: ['quiz'],
    components: {
        Question
    },
} 
</script>
