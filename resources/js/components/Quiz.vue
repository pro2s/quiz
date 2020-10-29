<template>
    <b-container class="mt-5">
        <b-alert :show="apiError" variant="danger">Error retriving the quiz</b-alert>
        <b-row  class="justify-content-md-center">
            <b-col cols="8">
                <transition name="component-fade" mode="out-in">
                    <component :is="quiz && quizView" :quiz="quiz"/>
                </transition>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
    import QuizView from './QuizView.vue';
    import QuizResult from './QuizResult.vue';
    import { mapActions, mapGetters } from 'vuex'
    export default {
        computed: {
            quizView() {
                return this.quiz.finished ? QuizResult : QuizView;
            },
            quiz() {
                return this.getQuizBySlug(this.$route.params.slug);
            },
            ...mapGetters([
                'apiError',
                'getQuizBySlug'
            ])
        },
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

<style scoped>
    .component-fade-enter-active, .component-fade-leave-active {
        transition: opacity .3s ease;
    }
    .component-fade-enter, .component-fade-leave-to
        /* .component-fade-leave-active до версии 2.1.8 */ {
        opacity: 0;
    }
</style>
>