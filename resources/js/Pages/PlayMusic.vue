<template>
    <div class="flex flex-col justify-between h-screen w-full">
        <div>
            <Header :filters="filters" @search="search" />
            <!-- <div class="bg-white rounded-md overflow-x-auto mt-10">
                <table class="w-full whitespace-nowrap">
                    <thead>
                        <tr class="text-left font-bold">
                            <th class="pb-4 pt-6 px-6">Judul</th>
                            <th class="pb-4 pt-6 px-6">Muhud</th>
                            <th class="pb-4 pt-6 px-6">Pimpinan</th>
                            <th class="pb-4 pt-6 px-6">deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="song in songs.data" :key="song.id" :id="`song-${song.id}`"
                            class="hover:bg-gray-100 focus-within:bg-gray-100 cursor-pointer"
                            :class="{ 'bg-green-100': currentPlay == song }" @click="currentPlay = song">

                            <td class="border-t">
                                <div class="flex items-center px-6 py-4 focus:text-indigo-500">
                                    {{ song.judul }}
                                </div>
                            </td>
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4" tabindex="-1">
                                    {{ song.muhud }}
                                </div>
                            </td>
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4" tabindex="-1">
                                    {{ song.pimpinan }}
                                </div>
                            </td>
                            <td class="border-t">
                                <div class="flex items-center px-6 py-4" tabindex="-1">
                                    {{ song.deskripsi }}
                                </div>
                            </td>
                        </tr>
                        <tr v-if="songs.data.length === 0">
                            <td class="px-6 py-4 border-t" colspan="4">No organizations found.</td>
                        </tr>
                    </tbody>
                </table>
            </div> -->

            <div class="mt-4 font-semibold text-xl uppercase font-mono px-4  border-b-4">Daftar Lagu
            </div>
            <div v-for="song in songs.data" :key="song.id"
                class="bg-white w-full grid items-center grid-cols-6 lg:grid-cols-12 gap-3 py-4 md:py-2 px-4 border-b-[1px] border-b-slate-200">
                <div @click="currentPlay = song" :class="{ 'bg-green-600 text-gray-100': currentPlay == song }"
                    class="columns-1 cursor-pointer text-green-600 bg-gray-100 hover:text-gray-100 hover:bg-green-600 rounded-full max-w-min p-2">
                    <PlayIcon class="w-6" />
                </div>
                <div class="col-span-3 lg:col-span-3 flex flex-col">
                    <span class="text-base font-semibold">{{ song.muhud }}</span>
                    <span class="text-xs italic">{{ song.pimpinan }}</span>
                </div>
                <div class="text-sm lg:col-span-7 hidden md:flex">
                    {{ song.deskripsi }}
                </div>
                <!-- <div class="text-xs pt-1">{{ currentDurationTxt }}</div> -->
            </div>
        </div>
        <Music :currentPlay=currentPlay />
    </div>
</template>

<script setup>
import Header from '@/Components/Header.vue';
import Music from '@/Components/MusicControl.vue';
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/inertia-vue3';
import { ref, onMounted } from 'vue';
import { PlayIcon } from '@heroicons/vue/20/solid';

// onMounted(() => {
//     initProgress()
//     props.songs
// })

defineProps({
    filters: Object,
    songs: Object
})

let isPlaying = ref(0)
let currentPlay = ref([])
let audio = new Audio()
let currentDuration = ref(0)
let currentDurationTxt = ref('0:00')

function search(value) {
    Inertia.get('/play', { search: value }, {
        preserveState: true,
    })
}

function initProgress() {
    audio = document.querySelector('#musik')
    audio.addEventListener('loadedmetadata', () => {
        currentDuration.value = audio.duration
        let secs = `${parseInt(`${currentDuration.value % 60}`, 10)}`.padStart(2, '0')
        let mins = parseInt(`${(currentDuration.value / 60) % 60}`, 10)
        currentDurationTxt.value = `${mins}:${secs}`
    })
}

</script>
