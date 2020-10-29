<template>
    <b-nav-item-dropdown right>
        <template slot="button-content">
            <em>{{ $auth.user().name }} </em>
        </template>
        <b-dropdown-item href="#">Profile</b-dropdown-item>
        <b-dropdown-item @click="logout">Signout</b-dropdown-item>
    </b-nav-item-dropdown></template>
<script>
export default {
    methods: {
        logout() {
            this.$auth.logout();
        }
    }
}
</script>