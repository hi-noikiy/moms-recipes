<template>
    <div>
        <form class="login" @submit.prevent="loginAndRedirect">
            <h1>Sign in</h1>
            <label>User name</label>
            <input required v-model="username" type="text" placeholder="Snoopy"/>
            <label>Password</label>
            <input required v-model="password" type="password" placeholder="Password"/>
            <hr/>
            <button type="submit">Login</button>
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