<template>
    <div class="app">
        <div class="header mb-4">
            <Header :app="app"></Header>
        </div>

        <div class="container mx-auto flex">
            <router-view :user="user"></router-view>
        </div>
    </div>
</template>

<script>
    import Header from './components/Header.vue';

    import { mapState } from 'vuex';

    export default {
        components: { Header },
        computed: mapState(['app', 'user']),
        created() {
            axios.interceptors.response.use(undefined, function (err) {
                return new Promise(function (resolve, reject) {
                    if (err.status === 401 && err.config && !err.config.__isRetryRequest) {
                        // if you ever get an unauthorized, logout the user
                        this.$store.dispatch(AUTH_LOGOUT)
                        next('/login');
                    }
                    throw err;
                });
            });
        }
    }
</script>


<style scoped>
    .header {
        height: 12vh;
    }
</style>