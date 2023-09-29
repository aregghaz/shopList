<!-- ./resources/assets/js/components/Home.vue -->
<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="title">Alert Title</label>
                    <input v-model="newPostTitle" id="title" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Alert Description</label>
                    <textarea v-model="newPostDesc" id="description" rows="8" class="form-control"></textarea>
                </div>
                <button @click="addPost(newPostTitle, newPostDesc)"
                        :class="{disabled: (!newPostTitle || !newPostDesc)}"
                        class="btn btn-block btn-primary">Submit</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                newPostTitle: "",
                newPostDesc: ""
            }
        },
        created() {
            this.listenForChanges();
        },
        methods: {
            addPost(postName, postDesc) {
                // check if entries are not empty
                if(!postName || !postDesc)
                    return;

                // make API to save post
                axios.post('/api/post', {
                    title: postName, description: postDesc
                }).then( response => {
                    if(response.data) {
                        this.newPostTitle = this.newPostDesc = "";
                    }
                })
            },
            listenForChanges() {
                Echo.channel('notification')
                    .listen('PostPublished', post => {
                        if (! ('Notification' in window)) {
                            alert('Web Notification is not supported');
                            return;
                        }

                        Notification.requestPermission( permission => {
                            let notification = new Notification('New post alert!', {
                                body: post.title, // content for the alert
                                icon: "http://shoplist.am/img/logo.png" // optional image url
                            });

                            // link to page on clicking the notification
                            notification.onclick = () => {
                                window.open(window.location.href);
                            };
                        });
                    })
            }
        }
    }
</script>