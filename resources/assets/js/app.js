/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import PortalVue from 'portal-vue';
import VuejsDialog from 'vuejs-dialog';
import ActionQuizRow from'./components/ActionQuizRow.vue';

Vue.use(PortalVue);
Vue.use(VuejsDialog);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: {
        ActionQuizRow
    }
});