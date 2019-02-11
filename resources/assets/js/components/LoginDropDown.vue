<template>
    <b-nav-item-dropdown right>
        <template slot="button-content">
            <em>Login </em>
        </template>
        <b-dropdown-item @click="login">Login</b-dropdown-item>
        <b-dropdown-item href="#">Register</b-dropdown-item>
    </b-nav-item-dropdown>
</template>
<script>
import Login from './Login.vue';
import { create } from 'vue-modal-dialogs';
const login = create(Login, 'title', 'content', 'action');
export default {
    methods: {
        login() {
            login('Login', 'Are you soure?', 'Login');
        }
    }
}
</script>