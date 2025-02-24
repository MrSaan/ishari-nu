<template>
    <section class="">
        <Header :filters=filters @search="search" />
        <div class="flex justify-between min-w-full gap-6 mt-6 px-3 sm:px-0">
            <div class="flex flex-col w-full space-y-4">

                <div class="flex justify-between gap-3">
                    <!-- kiri -->
                    <CategoryMuhud :filters="props.id" :kumpulanMuhud="kumpulanMuhud" :category="category" />
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
                                    class="flex xl:hidden p-2 bg-green-600 text-white font-semibold rounded-full items-center h-min dark:bg-green-800">
                                    <span class="sr-only">setting button</span>
                                    <button class="inline-flex space-x-2">
                                        <div>
                                            <Cog6ToothIcon class="h-4 w-4" />
                                        </div>
                                    </button>
                                </div>
                            </PopoverButton>

                            <PopoverPanel
                                class="absolute p-1.5 z-10 mt-3 w-screen -translate-x-1/2 md:-translate-x-8 transform px-4">
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
                        <div class="pt-8 pb-4 bg-green-400 bg-opacity-20 rounded-lg dark:bg-green-800 dark:text-white">
                            <div class="flex flex-col justify-center items-center">
                                <h6 class="text-sm text-red-400 font-semibold"></h6>
                                <h5 class="text-base lg:text-xl font-bold font-urdu flex gap-2 items-center">
                                    <ChevronDoubleUpIcon class="h-4" :class="open && 'rotate-180 transform'" />
                                    <span>اللّٰهُمَّ صَلِّ وَسَلِّمْ وَبَارِكْ عَلَيْهِ</span>
                                    <ChevronDoubleUpIcon class="h-4" :class="open && 'rotate-180 transform'" />
                                </h5>
                                <span class="mt-6 text-xs italic">( bagian syaraful Anam )</span>
                            </div>
                        </div>
                    </DisclosureButton>
                    <transition enter-active-class="transition duration-100 ease-out"
                        enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100"
                        leave-active-class="transition duration-75 ease-out"
                        leave-from-class="transform scale-100 opacity-100" leave-to-class="transform scale-95 opacity-0">
                        <DisclosurePanel>
                            <template v-for="text in syarafulAnam" :key="text.id">
                                <div class="bg-white rounded-lg p-4 mb-2 dark:bg-gray-800" :id="text.id">
                                    <div class="flex justify-between items-center">
                                        <h6 class="text-sm text-red-400 font-semibold"></h6>
                                        <h5
                                            class="text-2xl text-right font-amiri leading-[3.5rem] lg:leading-loose dark:text-gray-200">
                                            {{ text.teks }}
                                        </h5>
                                    </div>
                                    <div class="flex flex-col dark:text-gray-300">
                                        <h6 v-if="isTransliterasi" class="text-sm lg:text-base mt-2 italic">{{
                                            text.transliterasi }}</h6>
                                        <p v-if="isTerjemahan"
                                            class="text-sm lg:text-base lg:font-semibold mt-2 lg:leading-normal">
                                            {{ text.terjemahan }}
                                        </p>
                                    </div>
                                    <div
                                        class="flex flex-row space-x-2 lg:space-x-3 text-gray-600 mt-2 lg:mt-3 pt-4 border-t-[1px] border-gray-200 items-center dark:text-green-600">

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
                                        <div v-if="$page.props.auth.user == null" @click="login">
                                            <button
                                                class="cursor-pointer hover:text-indigo-600 hover:bg-slate-200 p-1 rounded-full">
                                                <span class="sr-only">Button Love</span>
                                                <HeartIcon class="w-5 h-5" />
                                            </button>
                                        </div>
                                        <form v-else @submit.prevent="submit(text.id)">
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
                                                class="appearance-none form-select block w-32 px-3 py-1.5 text-xs font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none dark:bg-gray-400 dark:border-gray-400 dark:focus:bg-gray-200 dark:text-gray-200 dark:font-semibold">
                                                <option v-for="audio in text?.audio" :key="audio.id"
                                                    :value="{ id: text.id, audio: audio?.audio_1, referen_audio: audio?.referen_audio }"
                                                    class="text-base">
                                                    {{ audio.type }} - {{ audio.id }}
                                                </option>

                                            </select>
                                        </div>

                                    </div>
                                    <div v-if="selected.referen_audio" class="flex text-sm italic text-gray-600">
                                        <span v-if="selected.id === text.id" class="mt-2">
                                            referensi irama audio - {{ selected.referen_audio }}
                                        </span>
                                    </div>

                                </div>
                            </template>
                        </DisclosurePanel>
                    </transition>
                </Disclosure>

                <!-- iklan -->

                <Disclosure :defaultOpen="true" v-slot="{ open }">
                    <DisclosureButton>
                        <div class="pt-8 pb-4 bg-green-400 bg-opacity-20 rounded-lg dark:bg-green-800 dark:text-white">
                            <div class="flex flex-col justify-center items-center">
                                <h6 class="text-sm text-red-400 font-semibold"></h6>
                                <h5 class="text-base lg:text-xl font-bold font-urdu flex items-center gap-2">
                                    <ChevronDoubleUpIcon class="h-4" :class="open && 'rotate-180 transform'" />
                                    <span>اللّٰهُمَّ صَلِّ وَسَلِّمْ وَبَارِكْ عَلَيْهِ</span>
                                    <ChevronDoubleUpIcon class="h-4" :class="open && 'rotate-180 transform'" />
                                </h5>
                                <span class="mt-6 text-xs italic">( bagian diwan )</span>
                            </div>
                        </div>
                    </DisclosureButton>
                    <transition enter-active-class="transition duration-100 ease-out"
                        enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100"
                        leave-active-class="transition duration-75 ease-out"
                        leave-from-class="transform scale-100 opacity-100" leave-to-class="transform scale-95 opacity-0">
                        <DisclosurePanel>
                            <template v-for="text in diwan" :key="text.id">
                                <div class="bg-white rounded-lg p-4 mb-2 dark:bg-gray-800" :id="text.id">
                                    <div class="flex justify-between items-center">
                                        <h6 class="text-sm text-red-400 font-semibold"></h6>
                                        <h5
                                            class="text-2xl text-right font-amiri leading-[3.5rem] lg:leading-loose dark:text-gray-200">
                                            {{ text.teks }}
                                        </h5>
                                    </div>
                                    <div class="flex flex-col">
                                        <h6 v-if="isTransliterasi"
                                            class="text-sm lg:text-base mt-2 italic dark:text-gray-300">{{
                                                text.transliterasi }}</h6>
                                        <p v-if="isTerjemahan"
                                            class="text-sm lg:text-base lg:font-semibold mt-2 lg:leading-normal dark:text-gray-300">
                                            {{ text.terjemahan }}
                                        </p>
                                    </div>
                                    <div
                                        class="flex flex-row space-x-2 lg:space-x-3 text-gray-600 mt-2 lg:mt-3 pt-4 border-t-[1px] border-gray-200 items-center dark:text-green-600">

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
                                                class="appearance-none form-select block w-20 md:w-40 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none dark:bg-gray-400 dark:border-gray-400 dark:focus:bg-gray-200 dark:text-gray-200 dark:font-semibold">
                                                <option v-for="audio in text?.audio" :key="audio.id"
                                                    :value="{ audio: audio?.audio_1, referen_audio: audio?.referen_audio }"
                                                    class="text-base">
                                                    {{ audio.type }} - {{ audio.id }}
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div v-if="selected" class="flex text-sm italic text-gray-600">
                                        <span v-if="selected.id === text.id" class="mt-2">
                                            referensi irama audio - {{ selected.referen_audio }}
                                        </span>
                                    </div>
                                </div>
                            </template>
                        </DisclosurePanel>
                    </transition>
                </Disclosure>
            </div>

            <!-- setting -->
            <Setting :button="button" class="hidden xl:flex flex-col" @terjemahan="terjemahan"
                @transliterasi="transliterasi" />

            <!-- Audio play -->
            <div class="hidden">
                <audio id="audio" controls></audio>
            </div>

        </div>
    </section>
</template>

<script setup>
import Header from '@/Components/Header.vue';
import Setting from '@/Pages/Muhud/Setting.vue'
import Pimpinan from '@/Pages/Muhud/Pimpinan.vue';
import CategoryMuhud from '@/Pages/Muhud/CategoryMuhud.vue';
import { nextTick, onMounted, onUpdated, ref, watch } from 'vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import { Cog6ToothIcon, PlayIcon, PauseIcon, HeartIcon, DocumentDuplicateIcon, ArrowLeftIcon, ChevronDoubleUpIcon } from '@heroicons/vue/24/outline';
import { Popover, PopoverButton, PopoverPanel, Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue';

const props = defineProps({
    filters: Object,
    kumpulanMuhud: Array,
    shalawat: Object,
    pimpinan: Array,
    id: String,
})

// get Data
const diwan = ref([])
const syarafulAnam = ref([])

onMounted(() => {
    dataDisplay()
})

onUpdated(() => {
    dataDisplay()
})

function dataDisplay() {
    diwan.value = []
    syarafulAnam.value = []
    for (let i = 0; i < props.shalawat.data.length; i++) {

        if (props.shalawat.data[i].diwan !== null) {
            diwan.value.push(props.shalawat.data[i])
        }

        if (props.shalawat.data[i].syarafulAnam !== null) {
            syarafulAnam.value.push(props.shalawat.data[i])
        }

    }
}

// hide element
const button = ref({
    isTerjemahan: false,
    isTransliterasi: true,
})
const isTerjemahan = ref(false)
function terjemahan(value) {
    isTerjemahan.value = value
    button.value.isTerjemahan = value
}

const isTransliterasi = ref(true)
function transliterasi(value) {
    isTransliterasi.value = value
    button.value.isTransliterasi = value
}


// configuration audio
const audio = new Audio
let selected = ref({})
let isPlaying = ref(0)
const category = ref('muhud')
const src = ref(null)
const track = ref(null)

let form = useForm({
    id: ''
})

// function
function setAudio(param) {
    var audio = document.querySelector('#audio')
    track.value = param
    audio.src = '/storage/' + selected.value.audio
}

function play(id, button) { //audio play id, button play id, audio file
    var audio = document.querySelector('#audio')

    if (!audio) {
        return alert("kosong")
    }

    if (button != track.value) {
        return alert('pilih audio')
    }

    audio.play();
    isPlaying.value = id;

    var buttonPlay = document.querySelector(`#buttonPlay-${button}`);
    buttonPlay.classList.add("text-indigo-600")

    var buttonPause = document.querySelector(`#buttonPause-${button}`);
    if (buttonPause) {
        buttonPause.classList.remove("text-indigo-600")
    }

    audio.onended = function () {
        var buttonPlay = document.querySelector(`#buttonPlay-${button}`);
        buttonPlay.classList.remove("text-indigo-600")
        isPlaying.value = 0
    }


}

function pause(id, button) {
    var audio = document.querySelector('#audio');
    audio.pause();

    var buttonPlay = document.querySelector(`#buttonPlay-${button}`);
    buttonPlay.classList.remove("text-indigo-600")

    var buttonPause = document.querySelector(`#buttonPause-${button}`);
    buttonPause.classList.add("text-indigo-600")
}

function copy(id) {
    let text = document.getElementById(id).textContent;

    let textArea = document.createElement("textarea");
    textArea.value = text;
    textArea.style.position = "fixed";
    textArea.style.left = "-999999px";
    textArea.style.top = "-999999px";
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    document.execCommand('copy');
    textArea.remove();
    return alert('copy!!!')
}

function search(value) {
    Inertia.get(`/muhud/${props.id}`, { search: value }, {
        preserveState: true,
    })
}

let submit = (value) => {
    Inertia.post('/loved', { id: value }, {
        preserveState: true,
        preserveScroll: true
    })
}

const login = () => {
    alert("Tindakan ini perlu Login terlebih dahulu");
}
</script>
