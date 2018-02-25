<template>
    <div class="app">
        <div class="header">
            <Header :app="app"></Header>
        </div>

        <div class="flex flex-wrap main">
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
    }
</script>


<style scoped>
    .header {
        height: 12vh;
    }
</style>