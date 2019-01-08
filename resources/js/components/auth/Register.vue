<template>
    <div class="auth-container">
        <div class="login-wrap">
            <span class="title">Sign Up</span>
            <div class="form-group">
                <input class="input-large form-control" v-bind:class="{'is-invalid': authErrors.name}" type="text" placeholder="Name" v-model="name"/>
                <strong class="invalid-feedback px-20">{{authErrors.name ? authErrors.name[0] : ''}}</strong>
            </div>

            <div class="form-group">
                <input class="input-large form-control" v-bind:class="{'is-invalid': authErrors.email}" type="text" placeholder="Email" v-model="email"/>
                <strong class="invalid-feedback px-20">{{authErrors.email ? authErrors.email[0] : ''}}</strong>
            </div>

            <div class="form-group">
                <input class="input-large form-control" v-bind:class="{'is-invalid': authErrors.password}" type="password" placeholder="Password" v-model="password"/>
                <strong class="invalid-feedback px-20">{{authErrors.password ? authErrors.password[0] : ''}}</strong>
            </div>

            <div class="form-group">
                <input class="input-large" type="password" placeholder="Confirm Password" v-model="confirmPassword"/>
            </div>

            <div class="text-center bold mt-5">
                <div class="round-btn round-large-btn blue" v-on:click="handleSubmit">Sign Up</div>
            </div>

            <div class="text-center my-4">
                <router-link :to="{name: 'sign-in'}" class="nav-link">Sign In</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';

    export default {
        name    : "Register",
        data    : () => {
            return {
                name           : null,
                email          : null,
                password       : null,
                confirmPassword: null,
            }
        },
        computed: {
            ...mapGetters(['authErrors']),
        },
        methods : {
            ...mapActions(['signUp']),

            handleSubmit(e)
            {
                const {name, email, password, confirmPassword} = this;
                this.signUp({name, email, password, password_confirmation: confirmPassword});
            },
        }
    }
</script>

<style scoped>

</style>
