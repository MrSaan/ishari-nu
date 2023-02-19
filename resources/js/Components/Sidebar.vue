<template>
    <div
        class="fixed w-60 lg:w-72 h-screen hidden sm:flex flex-col px-4 py-8 bg-white border-r dark:bg-gray-900 dark:border-gray-700">
        <div class="flex flex-row items-center">
            <div class="text-gray-300 mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">
                    <path
                        d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c.966 0 1.89.166 2.75.47a.75.75 0 001-.708V4.262a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z" />
                </svg>
            </div>

            <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Beta v.1</h2>
        </div>

        <div class="flex flex-col justify-between text-slate-800 flex-1 mt-6">
            <Nav />
        </div>
    </div>
</template>

<script setup>
import Nav from '../Components/Nav.vue';

</script>