<template>
    <nav class="flex items-start justify-between flex-wrap bg-grey-darkest py-2 px-4 h-full">
        <div class="flex items-center flex-no-shrink text-grey mr-6">
            <span class="font-semibold text-3xl pl-2">{{ app.name }}</span>
        </div>
        <div class="block lg:hidden">
        </div>
        <div class="block flex-grow lg:flex lg:w-auto justify-end">
        </div>
    </nav>
</template>

<script>
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome'
    export default {
        name: 'Header',

        props: ['app'],

        components: {
            FontAwesomeIcon
        }
    }
</script>