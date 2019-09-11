/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';

import Notifications from 'vue-notification';
import ActiveButton from './components/dashboard/ActiveButton.vue';
import DeleteButton from './components/dashboard/DeleteButton.vue';
import QuestionsList from './components/dashboard/QuestionsList.vue';
import ActionRow from './components/dashboard/ActionRow.vue';
import * as ModalDialogs from 'vue-modal-dialogs';

Vue.use(ModalDialogs);
Vue.use(Notifications);

window.Vue = Vue;
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: {
        ActiveButton,
        DeleteButton,
        ActionRow,
        QuestionsList
    }
});

window.bsn = require('bootstrap.native/dist/bootstrap-native-v4');
