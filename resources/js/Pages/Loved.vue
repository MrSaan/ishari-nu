<template>
    <section>
        <Header :filters="filters" />
        <div class="flex justify-between min-w-full gap-6 mt-6 px-3 sm:px-0">
            <div class="flex flex-col w-full space-y-4">
                <div class="flex justify-between">

                    <!-- kiri -->
                    <CategoryMuhud :filters="filters" :kumpulan-muhud="kumpulanMuhud" :category="category" />

                    <!-- kanan -->
                    <div class="flex items-center gap-2 group">
                        <div
                            class="hidden lg:flex mt-1 py-2 px-4 bg-green-600 text-white font-semibold rounded-full items-center h-min">
                            <Link href="/play" class="inline-flex items-center space-x-2">
                            <div>
                                <PlayIcon class="h-5 w-5" />
                            </div>
                            <h6 class="text-sm font-semibold">Putar</h6>
                            </Link>
                        </div>

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
                                class="absolute left-1/2 z-10 mt-3 w-screen max-w-xs -translate-x-1/2 transform px-4">
                                <div class="flex flex-col bg-white rounded-2xl p-4 space-y-4 shadow-xl">
                                    <!-- theme -->
                                    <div class="flex flex-col">
                                        <div class="inline-flex space-x-2">
                                            <div class="text-green-600">
                                                <WrenchScrewdriverIcon class="h-4 w-4" />
                                            </div>
                                            <h6 class="font-semibold text-base">Tema</h6>
                                        </div>
                                        <div class="flex justify-between mt-2 p-1 bg-gray-200 rounded-full">
                                            <!-- Mode Terang -->
                                            <div
                                                class="inline-flex shrink w-1/2 justify-center space-x-2 p-2 items-center bg-indigo-600 text-white text-xs font-semibold rounded-full">
                                                <div>
                                                    <SunIcon class="h-5 w-5" />
                                                </div>
                                                <h6>Terang</h6>
                                            </div>
                                            <!-- Mode Gelap -->
                                            <div
                                                class="inline-flex shrink w-1/2 justify-center space-x-2 p-2 items-center text-xs font-semibold rounded-full">
                                                <div>
                                                    <MoonIcon class="h-5 w-5 text-green-600" />
                                                </div>
                                                <h6>Gelap</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- divider -->
                                    <div class="border-t-[1px]"></div>

                                    <!-- Terjemahan oleh -->
                                    <div class="flex flex-col">
                                        <div class="inline-flex space-x-2">
                                            <div class="text-green-600">
                                                <LanguageIcon class="h-4 w-4" />
                                            </div>
                                            <h6 class="text-base font-semibold">Terjemahan</h6>
                                        </div>
                                        <div
                                            class="mt-2 p-2 w-full bg-gray-200 rounded-full flex justify-between items-center">
                                            <h6 class="font-semibold text-base ml-2 text-gray-400">Kiai M Nuruddin</h6>
                                            <div class="mr-2 font-semibold">
                                                <ChevronDownIcon class="h-4 w-4" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- iklan section -->
                                <div class="w-[300px] h-[250px] border mt-4 flex items-center justify-center">
                                    untuk iklan
                                </div>
                                <div class="w-[300px] h-[250px] border mt-4 flex items-center justify-center">
                                    untuk iklan
                                </div>
                            </PopoverPanel>
                        </Popover>


                        <Pimpinan :pimpinan="pimpinan" :filters="filters" :category="category" />
                    </div>
                </div>

                <!-- text shalawat -->
                <Disclosure :defaultOpen="true">
                    <DisclosureButton>
                        <div class="pt-8 pb-4 bg-green-400 bg-opacity-20 rounded-lg">
                            <div class="flex flex-col justify-center items-center">
                                <h6 class="text-sm text-red-400 font-semibold"></h6>
                                <h5 class="text-base lg:text-xl font-bold font-urdu">
                                    اللّٰهُمَّ صَلِّ وَسَلِّمْ وَبَارِكْ عَلَيْهِ
                                </h5>
                                <span class="mt-6 text-xs italic">( bagian syaraful Anam )</span>
                            </div>
                        </div>
                    </DisclosureButton>
                    <transition enter-active-class="transition duration-100 ease-out"
                        enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100"
                        leave-active-class="transition duration-75 ease-out"
                        leave-from-class="transform scale-100 opacity-100"
                        leave-to-class="transform scale-95 opacity-0">
                        <DisclosurePanel>
                            <template v-for="text in shalawat.data" :key="text.id">
                                <div v-if="text.love">
                                    <div v-if="text.syarafulAnam" class="bg-white rounded-lg p-4 mb-2" :id="text.id">
                                        <div class="flex justify-between items-center">
                                            <h6 class="text-sm text-red-400 font-semibold"></h6>
                                            <h5
                                                class="text-base lg:text-2xl text-right font-arabic leading-relaxed lg:leading-loose">
                                                {{
                                                        text.teks
                                                }}
                                            </h5>
                                        </div>
                                        <div class="flex flex-col">
                                            <h6 class="text-sm lg:text-base mt-2 italic">{{ text.transliterasi }}</h6>
                                            <p class="text-sm lg:text-base lg:font-semibold mt-2 lg:leading-normal">{{
                                                    text.terjemahan
                                            }}
                                            </p>
                                        </div>
                                        <div
                                            class="flex flex-row space-x-2 lg:space-x-3 text-gray-600 mt-2 lg:mt-3 pt-4 border-t-[1px] border-gray-200 items-center">

                                            <div @click="play(`audioPlay-${text.id}`, text.id, selected[text.id]?.audio)"
                                                class="cursor-pointer hover:text-indigo-600 hover:bg-slate-200 p-1 rounded-full"
                                                :id="`buttonPlay-${text.id}`">
                                                <span class="sr-only">Play button</span>
                                                <PlayIcon class="w-5 h-5" />
                                                <audio class="hidden" :src="`/storage/${selected[text.id]?.audio}`"
                                                    :id="`audioPlay-${text.id}`" controls></audio>
                                            </div>

                                            <div v-if="isPlaying == `audioPlay-${text.id}`"
                                                @click="pause(`audioPlay-${text.id}`, text.id)"
                                                :id="`buttonPause-${text.id}`"
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
                                            <div>
                                                <select v-model="selected[text.id]"
                                                    class="appearance-none form-select block w-20 md:w-40 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                                    <option v-for="audio in text?.audio" :key="audio.id"
                                                        :value="{ audio: audio?.audio_1 }" class="text-base">
                                                        {{ audio.type }}
                                                    </option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </DisclosurePanel>
                    </transition>
                </Disclosure>

                <!-- iklan -->

                <Disclosure :defaultOpen="true">
                    <DisclosureButton>
                        <div class="pt-8 pb-4 bg-green-400 bg-opacity-20 rounded-lg">
                            <div class="flex flex-col justify-center items-center">
                                <h6 class="text-sm text-red-400 font-semibold"></h6>
                                <h5 class="text-base lg:text-xl font-bold font-urdu">
                                    اللّٰهُمَّ صَلِّ وَسَلِّمْ وَبَارِكْ عَلَيْهِ
                                </h5>
                                <span class="mt-6 text-xs italic">( bagian syaraful Anam )</span>
                            </div>
                        </div>
                    </DisclosureButton>
                    <transition enter-active-class="transition duration-100 ease-out"
                        enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100"
                        leave-active-class="transition duration-75 ease-out"
                        leave-from-class="transform scale-100 opacity-100"
                        leave-to-class="transform scale-95 opacity-0">
                        <DisclosurePanel>
                            <template v-for="text in shalawat.data" :key="text.id">
                                <div v-if="text.love">
                                    <div v-if="text.diwan" class="bg-white rounded-lg p-4 mb-2" :id="text.id">
                                        <div class="flex justify-between items-center">
                                            <h6 class="text-sm text-red-400 font-semibold"></h6>
                                            <h5
                                                class="text-base lg:text-2xl text-right font-arabic leading-relaxed lg:leading-loose">
                                                {{
                                                        text.teks
                                                }}
                                            </h5>
                                        </div>
                                        <div class="flex flex-col">
                                            <h6 class="text-sm lg:text-base mt-2 italic">{{ text.transliterasi }}</h6>
                                            <p class="text-sm lg:text-base lg:font-semibold mt-2 lg:leading-normal">{{
                                                    text.terjemahan
                                            }}
                                            </p>
                                        </div>
                                        <div
                                            class="flex flex-row space-x-2 lg:space-x-3 text-gray-600 mt-2 lg:mt-3 pt-4 border-t-[1px] border-gray-200 items-center">

                                            <div @click="play(`audioPlay-${text.id}`, text.id, selected[text.id]?.audio)"
                                                class="cursor-pointer hover:text-indigo-600 hover:bg-slate-200 p-1 rounded-full"
                                                :id="`buttonPlay-${text.id}`">
                                                <span class="sr-only">Play button</span>
                                                <PlayIcon class="w-5 h-5" />
                                                <audio class="hidden" :src="`/storage/${selected[text.id]?.audio}`"
                                                    :id="`audioPlay-${text.id}`" controls></audio>
                                            </div>

                                            <div v-if="isPlaying == `audioPlay-${text.id}`"
                                                @click="pause(`audioPlay-${text.id}`, text.id)"
                                                :id="`buttonPause-${text.id}`"
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
                                            <div>
                                                <select v-model="selected[text.id]"
                                                    class="appearance-none form-select block w-20 md:w-40 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                                    <option v-for="audio in text?.audio" :key="audio.id"
                                                        :value="{ audio: audio?.audio_1 }" class="text-base">
                                                        {{ audio.type }}
                                                    </option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </DisclosurePanel>
                    </transition>
                </Disclosure>
            </div>
            <Setting />
        </div>
    </section>
</template>

<script setup>
import Header from '@/Components/Header.vue';
import CategoryMuhud from '@/Pages/Muhud/CategoryMuhud.vue';
import Pimpinan from './Muhud/Pimpinan.vue';
import Setting from './Muhud/Setting.vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import { Popover, PopoverButton, PopoverPanel, Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue';
import { Cog6ToothIcon, PlayIcon, WrenchScrewdriverIcon, LanguageIcon, SunIcon, MoonIcon, ChevronDownIcon, HeartIcon, PauseIcon, DocumentDuplicateIcon } from '@heroicons/vue/24/outline';
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

defineProps({
    filters: Object,
    kumpulanMuhud: Array,
    pimpinan: Object,
    shalawat: Object,
})


let selected = ref({})
let isPlaying = ref(0)
let category = ref('loved')

let form = useForm({
    id: ''
})

// function
function play(id, button, audio) { //audio play id, button play id, audio file

    if (!audio) {
        return alert("kosong")
    }

    this.audio = document.querySelector(`#${id}`);
    this.audio.play();

    isPlaying.value = id;

    this.buttonPlay = document.querySelector(`#buttonPlay-${button}`);
    this.buttonPlay.classList.add("text-indigo-600")

    this.buttonPause = document.querySelector(`#buttonPause-${button}`);
    if (this.buttonPause) {
        this.buttonPause.classList.remove("text-indigo-600")
    }

    this.audio.onended = function () {
        this.buttonPlay = document.querySelector(`#buttonPlay-${button}`);
        this.buttonPlay.classList.remove("text-indigo-600")
        isPlaying.value = 0
    }


}

function pause(id, button) {
    this.audio = document.querySelector(`#${id}`);
    this.audio.pause();

    this.buttonPlay = document.querySelector(`#buttonPlay-${button}`);
    this.buttonPlay.classList.remove("text-indigo-600")

    this.buttonPause = document.querySelector(`#buttonPause-${button}`);
    this.buttonPause.classList.add("text-indigo-600")
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
    Inertia.get('/muhud', { search: value }, {
        preserveState: true,
    })
}

let submit = (value) => {
    Inertia.post('/loved', { id: value }, {
        preserveState: true,
        preserveScroll: true
    })
}
</script>