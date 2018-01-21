<template>
    <nav class="flex items-start justify-between flex-wrap bg-grey-darkest py-2 px-4 h-full">
        <div class="flex items-center flex-no-shrink text-grey mr-6">
            <span class="font-semibold text-3xl pl-2">{{ app.name }}</span>
        </div>
        <div class="block lg:hidden">
            <button class="flex items-center px-3 py-2 border rounded text-teal-lighter border-teal-light hover:text-white hover:border-white">
                menu
            </button>
        </div>
        <div class="block flex-grow lg:flex lg:w-auto justify-end">
        </div>
    </nav>
</template>

<script>
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome'
    export default {
        name: 'Header',

        props: [],

        computed: {},

        components: {
            FontAwesomeIcon
        }
    }
</script>