import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)
const state = {
    count: 0,
    clicks: []
}
const mutations = {
    add(state) {
        state.clicks.unshift('Plus')
    },
    del(state) {
        state.clicks.unshift('Minus')
    },
    increment(state) {
        state.count++
    },
    decrement(state) {
        state.count--
    }
}
const actions = {
    increment: ({ commit }) => {
        commit('increment')
        commit('add')
    },
    decrement: ({ commit }) => {
        commit('decrement')
        commit('del')
    },
    incrementIfOdd({ commit, state }) {
        if ((state.count + 1) % 2 === 0) {
            commit('increment')
        }
    },
    incrementAsync({ commit }) {
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                commit('increment')
                resolve()
            }, 1000)
        })
    }
}
const getters = {
    evenOrOdd: state => state.count % 2 === 0 ? 'even' : 'odd',
    clicks: state => state.clicks.slice(0, 5)
}
export default new Vuex.Store({
    state,
    getters,
    actions,
    mutations
})