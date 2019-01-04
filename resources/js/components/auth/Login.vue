<template>
    <div class="auth-container">
        <div class="login-wrap">
            <span class="title">Sign In</span>
            <div class="form-group">
                <input class="input-large" placeholder="Email"/>
            </div>

            <div class="form-group">
                <input class="input-large" placeholder="Password"/>
            </div>

            <div class="text-center bold mt-5">
                <div class="round-btn round-large-btn blue">Sign In</div>
            </div>

            <div class="additional-text text-center my-5">Or login with</div>

            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="round-btn"><span class="fa fa-google-plus"></span></div>
                    <div class="round-btn"><span class="fa fa-facebook"></span></div>
                </div>
            </div>

            <div class="text-center my-4">
                <a href="#">Sign Up</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Login",
        data: () => {
            return {
                email   : '',
                password: '',
            }
        },
        methods: {
            handleSubmit (e) {
                this.submitted = true;
                const { username, password } = this;
                if (username && password) {
                    this.login({ username, password })
                }
            }
        }
    }
</script>

<style scoped>

</style>
