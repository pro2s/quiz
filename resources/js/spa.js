/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import Router from 'vue-router'
import VueAuth from '@websanova/vue-auth'
import VueAuthAxios from '@websanova/vue-auth/drivers/http/axios.1.x.js'
import VueAuthBearer from '@websanova/vue-auth/drivers/auth/bearer.js'
import VueAuthRouter from '@websanova/vue-auth/drivers/router/vue-router.2.x.js'
import * as ModalDialogs from 'vue-modal-dialogs';
import Notifications from 'vue-notification';
import vueTopprogress from 'vue-top-progress';

import {
    LayoutPlugin,
    FormPlugin,
    CardPlugin,
    DropdownPlugin,
    FormInputPlugin,
    NavPlugin,
    ButtonPlugin,
    AlertPlugin,
    CollapsePlugin,
    NavbarPlugin,
    ListGroupPlugin
} from 'bootstrap-vue';

Vue.use(ButtonPlugin);
Vue.use(FormPlugin);
Vue.use(LayoutPlugin);
Vue.use(CardPlugin);
Vue.use(DropdownPlugin);
Vue.use(FormInputPlugin);
Vue.use(NavPlugin);
Vue.use(AlertPlugin);
Vue.use(CollapsePlugin);
Vue.use(NavbarPlugin);
Vue.use(ListGroupPlugin);

Vue.use(Router);
Vue.use(VueAxios, axios)
Vue.use(ModalDialogs);
Vue.use(Notifications);
Vue.use(vueTopprogress);

import Navigation from './components/Navigation.vue';
import router from './router'
import store from './store'

Vue.axios.defaults.baseURL = '/api'
Vue.router = router

Vue.use(VueAuth, {
    auth: VueAuthBearer,
    http: VueAuthAxios,
    router: VueAuthRouter,
    token: [
        {request: 'Authorization', response: 'Authorization', authType: 'bearer', foundIn: 'header'},
        {request: 'token', response: 'token', authType: 'bearer', foundIn: 'response'}
    ]
})

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