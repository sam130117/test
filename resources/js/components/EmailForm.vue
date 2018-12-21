<template>
    <div class="row">

        <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-3 ">
            <div class="form-group">
                <label for="name">Enter Your Name</label>
                <input id="name" type="text" class="form-control" v-model="formData.name">
            </div>
            <div class="form-group">
                <label for="name">Enter Your Email</label>
                <input id="email" type="text" class="form-control" v-model="formData.email">
            </div>
            <div class="form-group">
                <label for="name">Enter Your Message</label>
                <textarea id="message" class="form-control" v-model="formData.message"></textarea>
            </div>
            <button class="btn btn-success" v-on:click="send">Send</button>
            --{{ status }}
        </div>
    </div>
</template>

<script>
    export default {
        name   : "EmailForm",
        data   : () => {
            return {
                formData: {
                    name   : '',
                    email  : '',
                    message: '',
                },
                errors  : {},
                status  : '',
            }
        },
        methods: {
            send()
            {
                this.status = 'processing';

                axios.post('/email/send', this.formData)
                    .then((response) => {
                        if (response.status === 200) {
                            this.status = 'send';

                        }
                    }).catch((error) => {
                    if (error.response)
                        this.errors = error.response.data.errors;
                    console.error(error);
                });
            }
        }
    }
</script>

<style scoped>

</style>
