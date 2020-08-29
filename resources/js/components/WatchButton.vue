<template>
    <div>
       <button class="btn btn-primary" @click="watchUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'watching'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function () {
            return {
                status: this.watching,
            }
        },

        methods: {
            watchUser() {
                axios.post('/watch/' + this.userId)
                    .then(response => {
                        this.status = ! this.status;
                        
                        console.log(response.data);
                    })
                    .catch(errors => {
                        if (errors.response.status == 401) {
                            window.location = '/login';
                        }
                    });
            }
        },

        computed: {
            buttonText() {
                return (this.status) ? 'WATCHING' : '+ WATCH';
            }
        }
    }
</script>
