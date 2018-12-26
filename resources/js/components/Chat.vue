<template>
    <div class="col-lg-8 offset-lg-2">
        <h4>Chat</h4>

        <textarea class="form-control my-2" rows="5" v-model="message"></textarea>
        <button class="btn btn-success" v-on:click="send">Send</button>
        <span v-model="result"></span>
    </div>
</template>

<script>
    export default {
        name   : "Chat",
        data   : () => {
            return {
                message        : '',
                result         : '',
            }
        },
        methods: {
            send()
            {
                axios.post(`/chat/send`, {message: this.message})
                    .then((response) => {
                        if (response.status === 200) {
                            this.result = 'Send';
                        }
                    })
                    .catch((error) => console.error(error));
            }
        }
    }
</script>

<style scoped>

</style>
