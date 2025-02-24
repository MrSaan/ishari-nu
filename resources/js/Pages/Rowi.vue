<template>
    <div>
        <Header :filters="filters" @search="search" />

        <div class="flex flex-col w-full space-y-4">
            <div class="flex justify-between gap-3">
                <!-- kiri -->
                <CategoryMuhud :filters="filter" :kumpulanMuhud="kumpulanMuhud" :category="category" />
                <!-- kanan -->
                <div class="flex items-center gap-2 group">
                    <div
                        class="hidden lg:flex mt-1 py-2 px-4 bg-green-600 text-white font-semibold rounded-full items-center h-min dark:bg-green-800">
                        <Link href="/play" class="inline-flex items-center space-x-2">
                        <div>
                            <PlayIcon class="h-5 w-5" />
                        </div>
                        <h6 class="text-sm font-semibold">Putar</h6>
                        </Link>
                    </div>

                    <!-- mobile -->
                    <Popover class="relative">
                        <PopoverButton>
                            <div
                                class="flex xl:hidden p-2 bg-green-600 text-white font-semibold rounded-full items-center h-min">
                                <span class="sr-only">setting button</span>
                                <button class="inline-flex space-x-2">
                                    <div>
                                        <Cog6ToothIcon class="h-4 w-4" />
                                    </div>
                                </button>
                            </div>
                        </PopoverButton>

                        <PopoverPanel
                            class="absolute p-1.5 bg-gray-100 z-10 mt-3 w-screen max-w-xs -translate-x-[11rem] md:-translate-x-8 transform px-4">
                            <Setting :button="button" @terjemahan="terjemahan" @transliterasi="transliterasi" />

                        </PopoverPanel>
                    </Popover>

                    <!-- Pimpinan -->
                    <Pimpinan :pimpinan="pimpinan" :filter="filters" />
                </div>
            </div>

            <!-- text shalawat -->
            <Disclosure :defaultOpen="true" v-slot="{ open }">
                <DisclosureButton>
                    <div class="pt-8 pb-4 bg-green-400 bg-opacity-20 rounded-lg dark:bg-green-800 mx-2">
                        <div class="flex flex-col justify-center items-center">
                            <h6 class="text-sm text-red-400 font-semibold"></h6>
                            <h5 class="text-base lg:text-xl font-bold font-urdu flex gap-2 items-center">
                                <ChevronDoubleUpIcon class="h-4" :class="open && 'rotate-180 transform'" />
                                <span>اللّٰهُمَّ صَلِّ وَسَلِّمْ وَبَارِكْ عَلَيْهِ</span>
                                <ChevronDoubleUpIcon class="h-4" :class="open && 'rotate-180 transform'" />
                            </h5>
                            <span class="mt-6 text-xs italic">( bacaan rowi )</span>
                        </div>
                    </div>
                </DisclosureButton>
                <transition enter-active-class="transition duration-100 ease-out"
                    enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100"
                    leave-active-class="transition duration-75 ease-out" leave-from-class="transform scale-100 opacity-100"
                    leave-to-class="transform scale-95 opacity-0">
                    <DisclosurePanel>
                        <template v-for="text in rowi">
                            <div class="bg-white rounded-lg p-4 mb-2 dark:bg-gray-800 mx-2">
                                <div class="flex justify-between items-center">
                                    <h6 class="text-sm text-red-400 font-semibold"></h6>
                                    <h5
                                        class="text-2xl text-right font-arabic leading-[3.5rem] lg:leading-loose dark:text-gray-200">
                                        {{ text.text_rowi }}
                                    </h5>
                                </div>
                                <div class="flex flex-col">
                                    <h6 v-if="isTransliterasi" class="text-sm lg:text-base mt-2 italic">{{
                                        text.transliteration }}</h6>
                                    <p v-if="isTerjemahan"
                                        class="text-sm lg:text-base lg:font-semibold mt-2 lg:leading-normal">
                                        {{ text.translation_id }}
                                    </p>
                                </div>
                                <!-- <div
                                class="flex flex-row space-x-2 lg:space-x-3 text-gray-600 mt-2 lg:mt-3 pt-4 border-t-[1px] border-gray-200 items-center">

                                <div @click="play(`audioPlay-${text.id}`, text.id)"
                                    class="cursor-pointer hover:text-indigo-600 hover:bg-slate-200 p-1 rounded-full"
                                    :id="`buttonPlay-${text.id}`">
                                    <span class="sr-only">Play button</span>
                                    <PlayIcon class="w-5 h-5" />
                                </div>

                                <div v-if="isPlaying == `audioPlay-${text.id}`"
                                    @click="pause(`audioPlay-${text.id}`, text.id)" :id="`buttonPause-${text.id}`"
                                    class="cursor-pointer hover:text-indigo-600 hover:bg-slate-200 p-1 rounded-full">
                                    <span class="sr-only">Button Pause</span>
                                    <PauseIcon class="w-5 h-5" />
                                </div>
                                <form @submit.prevent="submit(text.id)">
                                    <button type="submit"
                                        class="cursor-pointer hover:text-indigo-600 hover:bg-slate-200 p-1 rounded-full"
                                        :class="[text.love ? 'text-rose-600 bg-rose-100' : '']">
                                        <span class="sr-only">Button Love</span>
                                        <HeartIcon class="w-5 h-5" />
                                    </button>
                                </form>
                                <div class="cursor-pointer hover:text-indigo-600 hover:bg-slate-200 p-1 rounded-full"
                                    @click="copy(text.id)">
                                    <span class="sr-only">Button Copy</span>
                                    <DocumentDuplicateIcon class="w-5 h-5" />
                                </div>
                                <div v-if="!text.audio.length == 0">
                                    <select v-model="selected" @change="setAudio(text.id)"
                                        class="appearance-none form-select block w-32 px-3 py-1.5 text-xs font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                        <option v-for="audio in text?.audio" :key="audio.id"
                                            :value="{ id: text.id, audio: audio?.audio_1, referen_audio: audio?.referen_audio }"
                                            class="text-base">
                                            {{ audio.type }} - {{ audio.id }}
                                        </option>

                                    </select>
                                </div>

                            </div> -->
                                <!-- <div v-if="selected.referen_audio" class="flex text-sm italic text-gray-600">
                                <span v-if="selected.id === text.id" class="mt-2">
                                    referensi irama audio - {{ selected.referen_audio }}
                                </span>
                            </div> -->

                            </div>
                        </template>
                    </DisclosurePanel>
                </transition>
            </Disclosure>
        </div>

    </div>
</template>

<script setup>
import Header from '@/Components/Header.vue';
import Pimpinan from '@/Pages/Muhud/Pimpinan.vue';
import Setting from '@/Pages/Muhud/Setting.vue'
import CategoryMuhud from '@/Pages/Muhud/CategoryMuhud.vue';
import { Inertia } from '@inertiajs/inertia';
import { ref } from 'vue';
import { Popover, PopoverButton, PopoverPanel, Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue';
import { ChevronDoubleUpIcon, Cog6ToothIcon, DocumentDuplicateIcon, PauseIcon, PlayIcon } from '@heroicons/vue/24/outline';
import { Link } from '@inertiajs/inertia-vue3';


let props = defineProps({
    reciters: Array,
    filters: Object,
    pimpinan: Array,
    rowi: Object,
})

const category = ref('rowi')
const filter = ref("1")
const kumpulanMuhud = ref([
    { id: 1, transliteration_id: "Ibtida & Bisyrahri", translation_id: "Bacaan Rowi" },
    { id: 3, transliteration_id: "Tanaqal", translation_id: "Bacaan Rowi" },
    { id: 4, transliteration_id: "Wulidal", translation_id: "Bacaan Rowi" },
    { id: 5, transliteration_id: "Sholla alaika", translation_id: "Bacaan Rowi" },
    { id: 6, transliteration_id: "Badatlana", translation_id: "Bacaan Rowi" },
    { id: 7, transliteration_id: "Mahalul Qiiyam", translation_id: "Bacaan Rowi" },
    { id: 8, transliteration_id: "Habibun", translation_id: "Bacaan Rowi" },
])

function search(value) {
    Inertia.get('/reciters', { search: value }, {
        preserveState: true,
    })
}

// hide element
const button = ref({
    isTerjemahan: true,
    isTransliterasi: true,
})
const isTerjemahan = ref(true)
function terjemahan(value) {
    isTerjemahan.value = value
    button.value.isTerjemahan = value
}

const isTransliterasi = ref(true)
function transliterasi(value) {
    isTransliterasi.value = value
    button.value.isTransliterasi = value
}

</script>
