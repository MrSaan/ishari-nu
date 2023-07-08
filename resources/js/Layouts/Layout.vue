<template>
    <div class="flex flex-row bg-gray-100">
        <!-- Sidebar -->
        <Sidebar />

        <!-- Content -->
        <div class="md:pl-60 lg:pl-72 w-full min-h-screen dark:bg-gray-900 dark:border-gray-700">
            <!-- content in here -->
            <BannerHomepage />
            <div class="md:mx-7">
                <section class="max-w-6xl mx-auto">
                    <slot></slot>
                </section>
            </div>
        </div>
    </div>
</template>

<script setup>
import Sidebar from '@/Components/Sidebar.vue';
import BannerHomepage from '../Components/BannerHomepage.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    filters: Object,
})

</script>
