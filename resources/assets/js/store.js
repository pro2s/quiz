import Vue from 'vue';
import Vuex from 'vuex';
import Api from './api.js';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        quizzes: [],
        apiError: false,
    },
    actions: {
        getQuiezzes(context) {
            return Api().get('/quizzes')
            .then((response) => context.commit('SET_QUIZZES', response.data))
            .catch((error) => context.commit('API_FAILURE', error));
        },
    },
    mutations: {
        SET_QUIZZES(state, quizzes) {
            state.quizzes = quizzes;
        },
        API_FAILURE(state, error) {
            state.apiError = true;
        }
    },
    getters: {
        allQuizzes: state => state.quizzes,
        apiError: state => state.apiError
    },
    modules: {}
});

export default store;