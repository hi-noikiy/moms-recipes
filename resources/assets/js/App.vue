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
        created: function() {
            
        }
    }
</script>


<style scoped>
    .header {
        height: 12vh;
    }
</style>