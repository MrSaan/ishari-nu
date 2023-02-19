<template>
    <Header :filters="filters" @search="search" />

    <section class=" dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-center text-green-800 capitalize lg:text-4xl dark:text-white">Para
                Guru-Guru Ishari NU</h1>

            <p class="max-w-2xl mx-auto my-6 text-center text-gray-500 dark:text-gray-300">
                عَلَىَّ صَلاَةً وَاحِدَةً صَلَّى اللَّهُ عَلَيْهِ عَشْرَ صَلَوَاتٍ وَحُطَّتْ عَنْهُ عَشْرُ خَطِيئَاتٍ
                وَرُفِعَتْ لَهُ عَشْرُ دَرَجَاتٍ
            </p>
            <p class="max-w-2xl mx-auto my-6 text-center text-gray-500 dark:text-gray-300">
                "Siapa saja yang membaca shalawat kepadaku sekali, niscaya Allah bershalawat kepadanya sepuluh
                kali, menghapus sepuluh dosanya, dan mengangkat derajatnya sepuluh tingkatan." (HR An Nasa’i)
            </p>

            <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-16 md:grid-cols-2 xl:grid-cols-4">

                <div v-for="reciter in reciters" :key="reciter.id"
                    class="flex flex-col items-center p-8 transition-colors duration-300 transform cursor-pointer group hover:bg-green-600 rounded-xl">

                    <img class="object-cover w-32 h-32 rounded-full ring-4 ring-gray-300"
                        :src="`/storage/${reciter.avatar}`" alt="avatar">

                    <h1
                        class="mt-4 text-2xl font-semibold text-gray-700 capitalize text-center dark:text-white group-hover:text-white">
                        {{ reciter.nama_pimpinan }}</h1>

                    <p class="mt-2 text-gray-500 capitalize dark:text-gray-300 group-hover:text-gray-300">
                        {{ reciter.asal }}</p>

                </div>


            </div>
        </div>
    </section>
</template>

<script setup>
import Header from '@/Components/Header.vue';
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

let props = defineProps({
    reciters: Array,
    filters: Object,
})


function search(value) {
    Inertia.get('/reciters', { search: value }, {
        preserveState: true,
    })
}

</script>