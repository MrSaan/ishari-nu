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

                <div v-for="reciter in reciters" :key="reciter.id" @click="getDetailAudioPimpinan(reciter)"
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
    <section>
        <TransitionRoot appear :show="isOpen" as="template">
            <Dialog as="div" @close="closeModal" class="relative z-10">
                <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0" enter-to="opacity-100"
                    leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0">
                    <div class="fixed inset-0 bg-black bg-opacity-25" />
                </TransitionChild>

                <div class="fixed inset-0 overflow-y-auto">
                    <div class="flex min-h-full items-center justify-center p-4 text-center">
                        <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0 scale-95"
                            enter-to="opacity-100 scale-100" leave="duration-200 ease-in" leave-from="opacity-100 scale-100"
                            leave-to="opacity-0 scale-95">
                            <DialogPanel
                                class="w-min transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all">
                                <DialogTitle as="h3"
                                    class="text-lg font-medium leading-6 boder border-b-2 pb-2 text-gray-900">
                                    Detail Audio:
                                </DialogTitle>
                                <div class="mt-2" v-if="detailAudio !== null">
                                    <p class="text-base text-gray-500">
                                        Pimpinan {{ pimpinanName }} memiliki audio di muhud:
                                    </p>
                                    <table class="mt-6">
                                        <thead class="bg-gray-50 dark:bg-gray-800">
                                            <tr>
                                                <th class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Muhud</th>
                                                <th class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                            <tr v-for="detail in detailAudio">
                                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">{{ detail.transliteration_id }}</td>
                                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">{{ detail.jumlah }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mt-4">
                                    <button type="button"
                                        class="inline-flex justify-center rounded-md border border-transparent bg-green-100 px-4 py-2 text-sm font-medium text-green-900 hover:bg-green-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-green-500 focus-visible:ring-offset-2"
                                        @click="closeModal">
                                        close
                                    </button>
                                </div>
                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </Dialog>
        </TransitionRoot>
    </section>
</template>

<script setup>
import Header from '@/Components/Header.vue';
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/inertia-vue3';
import { nextTick, ref } from 'vue';
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from '@headlessui/vue'
import axios from 'axios';


let props = defineProps({
    reciters: Array,
    filters: Object,
})

const isOpen = ref(false)

function closeModal() {
    isOpen.value = false
}
function openModal() {
    isOpen.value = true
}

function search(value) {
    Inertia.get('/reciters', { search: value }, {
        preserveState: true,
    })
}

const detailAudio = ref(null)
const pimpinanName = ref(null)
function getDetailAudioPimpinan(value) {
    axios.get('/detail-audio-pimpinan?pimpinan_id=' + value.id)
        .then(response => {
            detailAudio.value = response.data
            pimpinanName.value = value.nama_pimpinan
            openModal()
        })
}

</script>
