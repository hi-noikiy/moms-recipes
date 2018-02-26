<template>
    <nav class="flex items-start justify-between flex-wrap py-2 px-4 h-full border-b-2 border-solid border-grey-dark">
        <div class="flex items-center flex-no-shrink text-grey-dark mr-6">
            <span class="font-semibold text-3xl pl-2">{{ app.name }}</span>
        </div>
        <div class="block">
            <button v-show="loggedin" @click="logoutAndRedirect" class="bg-transparent hover:bg-grey-dark text-grey-dark font-semibold hover:text-white py-2 px-4 border border-grey-dark hover:border-transparent rounded">Logout</button>
            <router-link tag="button" to="/login" v-show="!loggedin" class="bg-grey-dark hover:bg-transparent text-white font-semibold hover:text-grey-dark py-2 px-4 border hover:border-grey-dark rounded">Login</router-link>
        </div>
    </nav>
</template>

<script>
    import { mapActions } from 'vuex'
    import { AUTH_LOGOUT } from '~/store/mutation-types'
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome'

    export default {
        name: 'Header',

        props: ['app'],

        components: {
            FontAwesomeIcon,
        },

        methods: {
            ...mapActions([AUTH_LOGOUT]),
            logoutAndRedirect () {
                const { username, password } = this;

                this.AUTH_LOGOUT({ username, password }).then(() => {
                    this.$router.push('/');
                });
            }
        },

        computed: {
            loggedin: function() {
                return this.$store.getters.isAuthenticated;
            }
        }
    }
</script>