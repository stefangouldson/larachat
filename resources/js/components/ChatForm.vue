<template>
    <div class="form-row align-items-center">
        <div class="col-10">
        <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage">
        </div>

        <div class="col-2">
            <button class="btn btn-primary btn-sm ml-2" id="btn-chat" @click="sendMessage">
                Send
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                newMessage: ''
            }
        },

        methods: {
            sendMessage() {
                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage
                });

                this.newMessage = ''
            }
        }
    }
</script>
