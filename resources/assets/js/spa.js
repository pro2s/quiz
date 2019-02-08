/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue';

import Router from 'vue-router';
Vue.use(Router);

import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue);

import Navigation from './components/Navigation.vue';

import router from './router';
import store from './store';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: {
        Navigation
    },
    router,
    store
});