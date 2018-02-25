<template>
    <div class="mx-auto w-full max-w-sm">
        <form class="shadow-lg rounded-lg bg-white p-8 pb-4" @submit.prevent="loginAndRedirect">
            <h1 class="mx-auto mb-6 text-center text-grey-darkest">Sign In</h1>

            <div class="mb-4">
                <label class="block text-grey-darker text-sm mb-2 uppercase">Email</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" required v-model="username" type="text" placeholder="mom@example.com" :disabled="loading"/>
            </div>

            <div class="mb-6">
                <label class="block text-grey-darker text-sm mb-2 uppercase">Password</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" required v-model="password" type="password" placeholder="password" :disabled="loading"/>
            </div>

            <div v-show="error">
                <p class="text-red text-sm italic">You have entered an invalid username or password.</p>
            </div>

            <div v-show="!loading" class="flex items-center justify-between mt-4">
                <a class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker" href="#">
                    Forgot Password?
                </a>
                <button class="bg-blue hover:bg-blue-dark text-white font-bold py-3 px-4 rounded" type="submit">
                    Sign In
                </button>
            </div>

            <div class="mx-auto flex justify-center mt-8">
                <sync-loader :loading="loading"></sync-loader>
            </div>
        </form>
    </div>
</template>

<script>
    import { mapActions } from 'vuex'
    import SyncLoader from 'vue-spinner/src/SyncLoader.vue'
    import { AUTH_LOGIN } from '~/store/mutation-types'

    export default {
        components: { SyncLoader },
        props: ['user'],

        data: () => ({
            username: '',
            password: ''
        }),

        methods: {
            ...mapActions([AUTH_LOGIN]),

            loginAndRedirect () {
                const { username, password } = this;

                this.AUTH_LOGIN({ username, password }).then(() => {
                    this.$router.push('/');
                });
            }
        },

        computed: {
            loading: function() {
                return this.user.status === 'loading';
            },
            error: function() {
                return this.user.status === 'error';
            }
        },

        created() {
            console.log(this.$store.getters.isAuthenticated);
            if (this.$store.getters.isAuthenticated) {
                this.$router.push('/');
            }
        }
    }
</script>