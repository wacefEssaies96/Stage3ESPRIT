<template>
    <div>
        <div class="card" style="width: 50vh; height: 90vh;">
            <div class="card-header">{{ otherUser.name }}</div>
            <div class="card-body" style="height: 100%; overflow: scroll;">

                <div class="mesgs">
                    <div class="msg_history">
                        <div v-for="message in messages" v-bind:key="message.id">
                            <div v-if="message.author === authUser.email" :class="{ 'incoming_msg': message.author === authUser.email }">
                                <div class="incoming_msg_img"></div>
                                <div class="received_msg">
                                    <div class="received_withd_msg">
                                        <p style="right: 0;">{{ message.body }}</p>
                                    </div>
                                </div>
                            </div>
                            <div v-if="message.author === otherUser.email" :class="{ 'outgoing_msg': message.author === otherUser.email }">
                                <div class="sent_msg">
                                    <p>{{ message.body }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="text" v-model="newMessage" class="form-control" placeholder="Type your message..."
                    @keyup.enter="sendMessage" />
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "ChatComponent",
    props: {
        authUser: {
            type: Object,
            required: true
        },
        otherUser: {
            type: Object,
            required: true
        },
        room: {
            required: true
        }
    },
    data() {
        return {
            messages: [],
            newMessage: "",
            channel: ""
        };
    },
    async created() {
        const token = await this.fetchToken();
        await this.initializeClient(token);
        await this.fetchMessages();
    },
    methods: {

        sendMessage() {
            this.channel.sendMessage(this.newMessage);
            this.newMessage = "";
        },

        async fetchToken() {
            const { data } = await axios.post("/api/token", {
                email: this.authUser.email
            });


            return data.token;
        },
        async initializeClient(token) {
            const client = await Twilio.Chat.Client.create(token);

            client.on("tokenAboutToExpire", async () => {
                const token = await this.fetchToken();


                client.updateToken(token);
            });
            if (this.room == 'null') {
                this.channel = await client.getChannelByUniqueName(
                    `${this.authUser.id}-${this.otherUser.id}`
                );
            }
            else {
                this.channel = await client.getChannelByUniqueName(
                    `${this.otherUser.id}-${this.authUser.id}`
                );
            }


            this.channel.on("messageAdded", message => {
                this.messages.push(message);
            });
        },

        async fetchMessages() {
            this.messages = (await this.channel.getMessages()).items;
        },

    }
};
</script>