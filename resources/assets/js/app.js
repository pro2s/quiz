/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';

import Notifications from 'vue-notification';
import ActionQuizRow from './components/ActionQuizRow.vue';
import ActiveButton from './components/ActiveButton.vue';
import DeleteButton from './components/DeleteButton.vue';
import QuestionsList from './components/QuestionsList.vue';
import ActionRow from './components/ActionRow.vue';
import * as ModalDialogs from 'vue-modal-dialogs';

Vue.use(ModalDialogs);
Vue.use(Notifications);

import ActionQuizRow from'./components/ActionQuizRow.vue';
import ActiveButton from'./components/ActiveButton.vue';
window.Vue = Vue;
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: {
        ActionQuizRow,
        ActiveButton,
        DeleteButton,
        ActionRow,
        QuestionsList
    }
});