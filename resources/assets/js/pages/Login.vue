<template>
    <div class="mx-auto w-full max-w-sm">
        <form class="shadow-lg rounded-lg bg-white p-8" @submit.prevent="loginAndRedirect">
            <h1 class="mx-auto mb-6 text-center text-grey-darkest">Sign In</h1>

            <div class="mb-4">
                <label class="block text-grey-darker text-sm mb-2 uppercase">Email</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" required v-model="username" type="text" placeholder="mom@example.com"/>
            </div>

            <div class="mb-4">
                <label class="block text-grey-darker text-sm mb-2 uppercase">Password</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" required v-model="password" type="password" placeholder="password"/>
            </div>

            <div class="flex items-center justify-between">
                <a class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker" href="#">
                    Forgot Password?
                </a>
                <button class="bg-blue hover:bg-blue-dark text-white font-bold py-3 px-4 rounded" type="button">
                    Sign In
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    import { mapActions } from 'vuex'
    import { AUTH_LOGIN } from '~/store/mutation-types'

    export default {
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
    }
</script>