import Vue from 'vue';
import Vuex from 'vuex';
import Api from './api';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        answer: undefined,
        quiz: {},
        quizzes: [],
        apiError: false,
    },
    actions: {
        setAnswer(context, answer) {
            return context.commit('SET_ANSWER', answer);
        },
        async getQuiezzes(context) {
            try {
                const response = await Api().get('/quizzes');
                return context.commit('SET_QUIZZES', response.data);
            }
            catch (error) {
                return context.commit('API_FAILURE', error);
            }
        },
        async getQuiz({commit}, slug) {
            try {
                const response = await Api().get('/quiz/' + slug);
                return commit('SET_QUIZ', response.data);
            }
            catch (error) {
                return commit('API_FAILURE', error);
            }
        },
        async sendAnswer({commit, dispatch}, answer) {
            try {
                const response = await Api().post(`/answer/${answer.quiz}/${answer.question}`, {
                    id: answer.id
                });
                let result = undefined;
                if ('answer' in response.data) {
                    result = response.data.answer == 1;
                }
                commit('SET_ANSWER', result);
            }
            catch (error) {
                commit('API_FAILURE', error);
            }
        },
        async getNextQuizQuestion({commit}, quizQuestion) {
            try {
                const response = await Api().get(`/quiz/${quizQuestion.quiz}/next/${quizQuestion.question}` );
                commit('SET_QUIZ_QUESTION', {'slug': quizQuestion.quiz, 'next': response.data});
            }
            catch (error) {
                commit('API_FAILURE', error);
            }
        }
    },
    mutations: {
        SET_QUIZ_QUESTION(state, data) {
            if (state.quiz[data.slug]) {
                state.quiz = {
                    ...state.quiz,
                    [data.slug]: {
                        ...state.quiz[data.slug], 
                        ...data.next
                    }
                };
                state.answer = undefined;
            }
        },
        SET_ANSWER(state, answer) {
            state.answer = answer;
        },
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
        getAnswer: state => state.answer,
        allQuizzes: state => state.quizzes,
        getQuizBySlug: state => slug => state.quiz[slug],
        apiError: state => state.apiError
    },
    modules: {}
});

export default store;