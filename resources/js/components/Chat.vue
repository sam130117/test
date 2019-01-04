<template>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="alert" v-bind:class="{ 'alert-success': isConnected, 'alert-danger': !isConnected }">
                <strong>{{ isConnected ? 'Connected to server.' : 'No Connection with server.' }}</strong>
            </div>

            <h4>Chat</h4>

            <textarea class="form-control my-2" rows="3" v-model="message"></textarea>
            <button class="btn btn-success" v-on:click="send">Send</button>


            <div class="row">
                <div class="container my-4">
                    <h4>Messages</h4>
                    <div class="messages-container">
                        <div class="message-container text-right" v-for="item in messageList" :key="item.date">
                            <span class="message">{{ item.text }}</span>
                            <div class="date">{{ item.date }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        name    : "Chat",
        data    : () => {
            return {
                message    : '',
                result     : '',
                isConnected: false,
            }
        },
        computed: {
            // messageList()
            // {
            //     return this.$store.messages;
            // }
            ...mapGetters([
                'messageList',
            ])
        },
        sockets : {
            connect()
            {
                this.isConnected = true;
            },

            disconnect()
            {
                this.isConnected = false;
            },

            // Fired when the server sends something on the "receiveMessage" channel.
            receiveMessage(data)
            {
                this.$store.dispatch('addNewMessage', data);
                // this.socketMessage = data;
            }
        },
        methods : {
            send()
            {
                this.$socket.emit('send-message', {'message': this.message, 'user': 'testUser'});
                this.message = '';
            }
        },
    }
</script>

<style scoped>

</style>
