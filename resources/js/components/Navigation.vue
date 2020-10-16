<template> 
    <b-navbar toggleable="md" type="light" variant="info">

        <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>

        <b-navbar-brand href="#">Quiz</b-navbar-brand>

        <b-collapse is-nav id="nav_collapse">

            <b-navbar-nav>
            <b-nav-item href="#">Link</b-nav-item>
            <b-nav-item href="#" disabled>Disabled</b-nav-item>
            </b-navbar-nav>

            <!-- Right aligned nav items -->
            <b-navbar-nav class="ml-auto">

            <b-nav-form>
                <b-form-input size="sm" class="mr-sm-2" type="text" placeholder="Search"/>
                <b-button size="sm" class="my-2 my-sm-0" type="submit">Search</b-button>
            </b-nav-form>
        
            <component :is="userDropDown" />

            </b-navbar-nav>
        </b-collapse>
        <dialogs-wrapper wrapper-name="default" />
    </b-navbar>
</template> 
 
<script> 
    import LoginDropDown from './LoginDropDown.vue';
    import LogoutDropDown from './LogoutDropDown.vue';
    export default { 
        computed: {
            userDropDown() {
                return this.$auth.check() ? LogoutDropDown : LoginDropDown;
            }
        }
    } 
</script> 
