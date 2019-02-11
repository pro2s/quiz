import Vue from 'vue';
import Vuex from 'vuex';
import Api from './api';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        quiz: {},
        quizzes: [],
        apiError: false,
    },
    actions: {
        getQuiezzes(context) {
            return Api().get('/quizzes')
            .then((response) => context.commit('SET_QUIZZES', response.data))
            .catch((error) => context.commit('API_FAILURE', error));
        },
        getQuiz(context, slug) {
            return Api().get('/quiz/' + slug)
            .then((response) => context.commit('SET_QUIZ', response.data))
            .catch((error) => context.commit('API_FAILURE', error));
        },
    },
    mutations: {
        SET_QUIZZES(state, quizzes) {
            state.quizzes = quizzes;
        },
        SET_QUIZ(state, data) {
            state.quiz = {...state.quiz, [data.slug]: data};
        },
        API_FAILURE(state, error) {
            state.apiError = true;
        }
    },
    getters: {
        allQuizzes: state => state.quizzes,
        getQuizBySlug: state => slug => state.quiz[slug],
        apiError: state => state.apiError
    },
    modules: {}
});

export default store;