<template>
<div>
    <div class="card">
        <div class="card-header">{{ otherUser.name }}</div>
        <div class="card-body">
            <div v-for="message in messages" v-bind:key="message.id">
                <div :class="{ 'text-right': message.author === authUser.email }">
                    {{ message.body }}
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

            this.channel = await client.getChannelByUniqueName(
                `${this.authUser.id}-${this.otherUser.id}`
            );
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