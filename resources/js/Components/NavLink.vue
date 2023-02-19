<template>
    <Link class="flex items-center px-4 py-2 mt-1 dark:bg-gray-800 dark:text-gray-200"
        :class="{ 'text-white bg-green-600 md:rounded-md': active }">
    <slot />
    </Link>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    active: Boolean
})

    // const classes = computed(() => props.active
    //     ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition  duration-150 ease-in-out'
    //     : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'
    // );


</script>
