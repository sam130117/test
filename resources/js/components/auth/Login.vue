<template>
    <div class="auth-container">
        <div class="login-wrap">
            <span class="title">Sign In</span>
            <div class="form-group">
                <input class="input-large form-control" v-bind:class="{'is-invalid': authErrors.email}" type="text" placeholder="Email" v-model="email"/>
                <strong class="invalid-feedback px-20">{{authErrors.email ? authErrors.email[0] : ''}}</strong>
            </div>

            <div class="form-group">
                <input class="input-large form-control" v-bind:class="{'is-invalid': authErrors.password}" type="password" placeholder="Password" v-model="password"/>
                <strong class="invalid-feedback px-20">{{authErrors.password ? authErrors.password[0] : ''}}</strong>
            </div>

            <div class="text-center bold mt-5">
                <div class="round-btn round-large-btn blue" v-on:click="handleSubmit">Sign In</div>
            </div>

            <!--<div class="additional-text text-center my-5">Or login with</div>-->

            <!--<div class="row">-->
                <!--<div class="col-lg-6 offset-lg-3">-->
                    <!--<div class="round-btn"><span class="fa fa-google-plus"></span></div>-->
                    <!--<div class="round-btn"><span class="fa fa-facebook"></span></div>-->
                <!--</div>-->
            <!--</div>-->

            <div class="text-center my-4">
                <router-link :to="{name: 'sign-up'}" class="nav-link">Sign Up</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';

    export default {
        name    : "Login",
        data    : () => {
            return {
                email   : null,
                password: null,
            }
        },
        computed: {
            ...mapGetters(['authErrors']),
        },
        methods : {
            ...mapActions(['signIn']),

            handleSubmit(e)
            {
                const {email, password} = this;
                this.signIn({email: email, password: password});
            },
        }
    }
</script>

<style scoped>

</style>
