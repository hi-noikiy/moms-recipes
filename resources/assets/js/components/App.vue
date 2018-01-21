<template>
    <div>
        <div class="header">
            <Header></Header>
        </div>

        <div class="flex flex-wrap main">
            <MainContainer></MainContainer>
        </div>
    </div>
</template>

<script>
    import Header from './Header.vue';
    import MainContainer from './MainContainer';

    export default {
        components: { Header, MainContainer },
    }
</script>


<style scoped>
    .header {
        height: 12vh;
    }

    .main {
        height: 88vh;
        overflow: hidden;
    }
</style>