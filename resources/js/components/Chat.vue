<template>
    <div class="col-lg-8 offset-lg-2">
        <h4>Chat</h4>

        <textarea class="form-control my-2" rows="5" v-model="message"></textarea>
        <button class="btn btn-success" v-on:click="emitEvent">Send</button>
        <span v-for="(message, date) in messageList">
            Date: {{ date }}
            Message: {{ message.message }}
        </span>
    </div>
</template>

<script>
    import {store, mapGetters} from 'vuex'

    export default {
        name    : "Chat",
        data    : () => {
            return {
                message: '',
                result : '',
            }
        },
        computed: {
            messageList()
            {
                return this.$store.messages;
            }
            // ...mapGetters([
            //     'messageList',
            // ])
        },
        methods : {
            send()
            {
                axios.post(`/chat/send`, {message: this.message})
                    .then((response) => {
                        if (response.status === 200) {
                            this.result = 'Send';
                        }
                    })
                    .catch((error) => console.error(error));
            },
            async emitEvent()
            {
                console.log('emit');
                let response = await this.$socket.emit('message', 'hello');
                console.log(response);
            }
        },
    }
</script>

<style scoped>

</style>
