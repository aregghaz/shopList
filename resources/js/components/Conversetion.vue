<template>
    <div class="conversation">
        <h6>{{ contact ? contact.name: "Select a Contact"}}</h6>
        <MessagesFeed :contact="contact" :messages="messages"/>
        <MessagesComposer @send="sendMessage"/>

    </div>

</template>

<script>
    import MessagesFeed from './MessagesFeed';
    import MessagesComposer from './MessagesComposer';

    export default {
        props: {
            contact: {
                type: Object,
                default: null
            },
            messages: {
                type: Array,
                default: []
            }
        },
        methods: {
            sendMessage(message) {
                if (!this.contact) {
                    return;
                }
                axios.post('/conversation/send', {
                    contact_id: this.contact.id,
                    message: message
                }).then((response) => {
                    this.$emit('new', response.data)
                })
            }
        },
        components: {MessagesFeed, MessagesComposer}
    }
</script>