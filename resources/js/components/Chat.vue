<template>
    <div class="col-lg-8 offset-lg-2">
        <h4>Chat</h4>

        <textarea class="form-control my-2" rows="5" v-model="message"></textarea>
        <button class="btn btn-success" v-on:click="send">Send</button>
        <span v-model="result"></span>
    </div>
</template>

<script>

    // var socket = io.connect('http://localhost:3005');
    // socket.on('message', function (data) {
    //     console.log(data, 111);
    //     // data = jQuery.parseJSON(data);
    //     // console.log(data.user);
    //     $( "#messages" ).append( "<strong>"+data.user+":</strong><p>"+data.message+"</p>" );
    // });
    export default {
        name   : "Chat",
        data   : () => {
            return {
                message: '',
                result : '',
            }
        },
        methods: {
            send()
            {
                axios.post(`/chat/send`, this.message)
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
