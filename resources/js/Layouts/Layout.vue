<template>
    <div class="flex flex-row bg-gray-100">
        <!-- Sidebar -->
        <Sidebar />

        <!-- Content -->
        <div class="md:pl-60 lg:pl-72 w-full min-h-screen md:mx-7 dark:bg-gray-900 dark:border-gray-700">
            <!-- content in here -->
            <section>
                <slot></slot>
            </section>
        </div>
    </div>
</template>

<script setup>
import Sidebar from '@/Components/Sidebar.vue';
import { Link, } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import debounce from "lodash/debounce";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    filters: Object,
})

</script>
    