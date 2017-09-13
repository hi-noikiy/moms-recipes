<template>
    <div>
       <Header></Header>
       <router-view></router-view>
    </div>
</template>

<script>
    import Header from './Header';

    export default {
        components: {Header},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
