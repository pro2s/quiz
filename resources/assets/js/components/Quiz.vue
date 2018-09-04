<template> 
    <b-container class="mt-5"> 
        <b-alert :show="apiError" variant="danger">Error retriving quizzes</b-alert>
        <b-row  class="justify-content-md-center">
            <b-col cols="8">
                <quiz-view :quiz="getQuizBySlug($route.params.slug)"/>
            </b-col>
        </b-row>
    </b-container> 
</template> 
 
<script> 
    import QuizView from './QuizView.vue'; 
    import { mapActions, mapGetters } from 'vuex'
    export default { 
        components: {
            QuizView
        },
        computed: mapGetters([ 
            'apiError',
            'getQuizBySlug'
        ]), 
        created () {
            // загружаем данные, когда представление создано
            // и данные реактивно отслеживаются
            this.update();
        },
        watch: {
            // при изменениях маршрута запрашиваем данные снова
            '$route': 'update'
        }, 
        methods: {
            ...mapActions([
                'getQuiz'
            ]),
            update() {
                this.getQuiz(this.$route.params.slug)
            }
        }
    } 
</script> 
