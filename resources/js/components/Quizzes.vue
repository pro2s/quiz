<template> 
    <b-container class="mt-5"> 
       <b-alert :show="apiError" variant="danger">Error retriving quizzes</b-alert>
       <quizzes-list />
    </b-container> 
</template> 
 
<script> 
    import QuizzesList from './QuizzesList.vue'; 
    import { mapActions, mapGetters } from 'vuex'
    export default { 
        components: {
            QuizzesList
        },
        computed: mapGetters([ 
            'apiError'
        ]), 
        methods: mapActions([
            'getQuiezzes'
        ]),
        mounted() { 
            this.getQuiezzes();
        } 
    } 
</script> 
