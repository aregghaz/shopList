<template>
    <div class="chat-app">
        <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
        <ContactList :contacts="contacts" @selected="startConversationsWith"/>
    </div>

</template>

<script>
    import Conversation from './Conversetion';
    import ContactList from './ContactList';

    export default {
        props: {
            user: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                selectedContact: null,
                messages: [],
                contacts: []
            }
        },
        mounted() {
            Echo.private(`chat.${this.user.id}`)
                .listen('MessageSent', (e) => {
                    this.handleIncoming(e.message)
                });

                axios.get('/contacts')
                    .then((response) => {
                        this.contacts = response.data
                    });
        },
        methods: {
            startConversationsWith(contact) {
                this.updateUnreadCount(contact, true);
                if (this.user.role == 'admin') {
                    axios.get(`/conversation/${contact.id}`)
                        .then((response) => {
                            this.messages = response.data;
                            this.selectedContact = contact;
                        })
                }else {
                    axios.get(`/conversation/1`)
                        .then((response) => {
                            this.messages = response.data;
                            this.selectedContact = contact;
                        })
                }

            },
            saveNewMessage(messages) {
                this.messages.push(messages)
            },
            handleIncoming(message) {
                if (this.selectedContact && message.from_id == this.selectedContact.id) {
                    this.saveNewMessage(message);
                    return;
                }
                this.updateUnreadCount(message.from_contact, false);
            },
            updateUnreadCount(contact, reset) {
                this.contacts = this.contacts.map((single) => {
                    if(single.id !== contact.id){
                        return single;
                    }
                    if(reset) {
                        single.unread = 0;
                    }else {
                        single.unread += 1;
                    }
                    return single;
                })
            }
        },
        components: {Conversation, ContactList}
    };
</script>
