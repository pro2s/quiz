<template>
    <base-modal @click.native="$close(false)">
        <div class="modal-header">
        <h5 class="modal-title">{{ title }}</h5>
            <button type="button" class="close" @click="$close(false)">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" v-on:click.stop>
            <b-form-group
                id="fieldset_email"
                description="Let us know your email."
                label="Enter your email"
                label-for="email"
            >
                <b-form-input id="email" v-model.trim="email" type="email"></b-form-input>
            </b-form-group>
            <b-form-group
                id="fieldset_password"
                description="Let us know your password."
                label="Enter your password"
                label-for="password"
            >
                <b-form-input id="password" v-model.trim="password" type="password"></b-form-input>
            </b-form-group>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" @click="$close(false)">Close</button>
            <button type="button" class="btn btn-primary" @click="login">{{ action }}</button>
        </div>
    </base-modal>
</template>
<script>
import BaseModal from "./BaseModal.vue";
export default {
    components: {
        BaseModal
    },
    data () {
        return {
            email: '',
            password: ''
        }
    },
    methods: {
        login() {
            this.$root.$refs.topProgress.start();
            this.$auth.login({
                data: {email: this.email, password: this.password},
                rememberMe: true
            }).then(_ => {
                this.$root.$refs.topProgress.done();
            }).catch(_ => {
                this.$root.$refs.topProgress.fail();
            });
            this.$close(true);
        }
    }
};
</script>