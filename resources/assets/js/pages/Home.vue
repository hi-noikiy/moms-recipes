<template>
    <div class="mx-auto">
        <h1 class="text-grey-darker"><span v-if="user.name">Welcome back {{user.name}}. </span>Let's get cooking!</h1>
    </div>
</template>

<script>
    export default {
        props: ['user']
    }
</script>