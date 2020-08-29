<template>
    <div>
       <button class="btn btn-primary" @click="watchUser">+ WATCH</button>
    </div>
</template>

<script>
    export default {
        props: ['userId'],

        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            watchUser() {
                axios.post('/watch/' + this.userId)
                    .then(response => {
                        alert(response.data);
                    });
            }
        }
    }
</script>
