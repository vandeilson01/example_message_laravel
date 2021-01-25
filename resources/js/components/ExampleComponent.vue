<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <div class="alert alert-info" v-if="messages.length <= 0">
                            Nenhuma messagen 
                        </div>
                        <p v-for="(message, index) in messages" :key="index">
                            <strong>{{ message.title}}</strong><br/>
                            {{message.body}}<br/>
                            <small>{{ message.created_at}}</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'idUser'
        ],
        data(){
            return{
                messages: []
            }
        },
        mounted() {
            // console.log('Bom dia');
            Echo.private('message.received.'+ this.idUser)
                .listen('SeedMessage', (e) =>{
                    // console.log(e);
                    this.messages.push(e);
                });
        }
    }
</script>
