<template>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-2">
        <div class="lg:col-span-2 px-6 min-w-full">
            <!-- banner -->
            <div class="bg-indigo-400 rounded-lg h-40">
                <div class="p-4">banner</div>
            </div>
            <!-- recent learning -->
            <RecentLearning />

            <!-- Muhud Ishari -->
            <MuhudList />
        </div>

        <!-- Memorization -->
        <Memorization />
    </div>
</template>

<script setup>
import RecentLearning from '@/Pages/Overview/RecentLearning.vue'
import MuhudList from '@/Pages/Overview/MuhudList.vue'
import Memorization from '@/Pages/Overview/Memorization.vue';
import Header from '@/Components/Header.vue';

let filters = '';

</script>