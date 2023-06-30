<template>
    <footer class="flex w-full justify-center px-4 text-gray-800 bg-white dark:text-white dark:bg-gray-900">
        <div class="flex w-full">
            <hr class="bg-gray-200 border-none dark:bg-gray-700">

            <div class="flex justify-center w-full p-10">
                <p class="text-sm text-gray-600 dark:text-gray-300">© Copyright {{ date }} M. Amar Firmansyah.</p>
            </div>
        </div>
    </footer>
</template>

<script setup>
const date = new Date().getFullYear();
</script>
