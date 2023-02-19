<template>
    <section>
        <Header :filters=filters @search="search" />
        <div class="flex justify-between min-w-full gap-6 mt-6 px-3 sm:px-0">
            <div class="flex flex-col w-full space-y-4">

                <div class="flex justify-between">
                    <!-- kiri -->
                    <CategoryMuhud :filters="filters" :kumpulanMuhud="kumpulanMuhud" :category="category" />
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
                                class="absolute left-1/2 z-10 mt-3 w-screen max-w-xs -translate-x-1/2 transform px-4">
                                <div class="flex flex-col bg-white rounded-2xl p-4 space-y-4 shadow-xl">
                                    <!-- theme -->
                                    <div class="flex flex-col">
                                        <div class="inline-flex space-x-2">
                                            <div class="text-green-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                                                </svg>
                                            </div>
                                            <h6 class="font-semibold text-base">Tema</h6>
                                        </div>
                                        <div class="flex justify-between mt-2 p-1 bg-gray-200 rounded-full">
                                            <!-- Mode Terang -->
                                            <div
                                                class="inline-flex shrink w-1/2 justify-center space-x-2 p-2 items-center bg-green-600 text-white text-xs font-semibold rounded-full">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-5 h-5">
                                                        <path
                                                            d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z" />
                                                    </svg>
                                                </div>
                                                <h6>Terang</h6>
                                            </div>
                                            <!-- Mode Gelap -->
                                            <div
                                                class="inline-flex shrink w-1/2 justify-center space-x-2 p-2 items-center text-xs font-semibold rounded-full">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-5 h-5 text-green-400">
                                                        <path fill-rule="evenodd"
                                                            d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 01.818.162z"
                                                            clip-rule="evenodd" />
                                                    </svg>

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
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802" />
                                                </svg>
                                            </div>
                                            <h6 class="text-base font-semibold">Terjemahan</h6>
                                        </div>
                                        <div
                                            class="mt-2 p-2 w-full bg-gray-200 rounded-full flex justify-between items-center">
                                            <h6 class="font-semibold text-base ml-2 text-gray-400">Kiai M Nuruddin</h6>
                                            <div class="mr-2 font-semibold">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>

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
                                <div v-if="text.syarafulAnam" class="bg-white rounded-lg p-4 mb-2" :id="text.id">
                                    <div class="flex justify-between items-center">
                                        <h6 class="text-sm text-red-400 font-semibold"></h6>
                                        <h5
                                            class="text-base lg:text-2xl text-right font-arabic leading-relaxed lg:leading-loose">
                                            {{ text.teks }}
                                        </h5>
                                    </div>
                                    <div class="flex flex-col">
                                        <h6 class="text-sm lg:text-base mt-2 italic">{{ text.transliterasi }}</h6>
                                        <p class="text-sm lg:text-base lg:font-semibold mt-2 lg:leading-normal">
                                            {{ text.terjemahan }}
                                        </p>
                                    </div>
                                    <div
                                        class="flex flex-row space-x-2 lg:space-x-3 text-gray-600 mt-2 lg:mt-3 pt-4 border-t-[1px] border-gray-200 items-center">

                                        <div @click="play(`audioPlay-${text.id}`, text.id, selected[text.id]?.audio)"
                                            class="cursor-pointer hover:text-indigo-600 hover:bg-slate-200 p-1 rounded-full"
                                            :id="`buttonPlay-${text.id}`">
                                            <span class="sr-only">Play button</span>
                                            <PlayIcon class="w-5 h-5" />
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
                                        <div v-if="!text.audio.length == 0">
                                            <select v-model="selected[text.id]"
                                                class="appearance-none form-select block md:w-40 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                                <option v-for="audio in text?.audio" :key="audio.id"
                                                    :value="{ audio: audio?.audio_1, referen_audio: audio?.referen_audio }"
                                                    class="text-base">
                                                    {{ audio.type }} - {{ audio.id }}
                                                </option>

                                            </select>
                                        </div>

                                        <div v-if="!selected[text.id]" class="hidden">
                                            audio masih kosong
                                        </div>
                                        <div v-else>
                                            <audio class="hidden" :src="`/storage/${selected[text.id]?.audio}`"
                                                :id="`audioPlay-${text.id}`" controls></audio>
                                        </div>

                                    </div>
                                    <div v-if="selected[text.id]" class="flex text-sm italic text-gray-600">
                                        <span v-if="selected[text.id].referen_audio" class="mt-2">
                                            referensi irama audio - {{ selected[text.id].referen_audio }}
                                        </span>
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
                                <span class="mt-6 text-xs italic">( bagian diwan )</span>
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
                                <div v-if="text.diwan" class="bg-white rounded-lg p-4 mb-2" :id="text.id">
                                    <div class="flex justify-between items-center">
                                        <h6 class="text-sm text-red-400 font-semibold"></h6>
                                        <h5
                                            class="text-base lg:text-2xl text-right font-arabic leading-relaxed lg:leading-loose">
                                            {{ text.teks }}
                                        </h5>
                                    </div>
                                    <div class="flex flex-col">
                                        <h6 class="text-sm lg:text-base mt-2 italic">{{ text.transliterasi }}</h6>
                                        <p class="text-sm lg:text-base lg:font-semibold mt-2 lg:leading-normal">
                                            {{ text.terjemahan }}
                                        </p>
                                    </div>
                                    <div
                                        class="flex flex-row space-x-2 lg:space-x-3 text-gray-600 mt-2 lg:mt-3 pt-4 border-t-[1px] border-gray-200 items-center">

                                        <div @click="play(`audioPlay-${text.id}`, text.id, selected[text.id]?.audio)"
                                            class="cursor-pointer hover:text-indigo-600 hover:bg-slate-200 p-1 rounded-full"
                                            :id="`buttonPlay-${text.id}`">
                                            <span class="sr-only">Play button</span>
                                            <PlayIcon class="w-5 h-5" />
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
                                        <div v-if="!text.audio.length == 0">
                                            <select v-model="selected[text.id]"
                                                class="appearance-none form-select block w-20 md:w-40 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                                <option v-for="audio in text?.audio" :key="audio.id"
                                                    :value="{ audio: audio?.audio_1, referen_audio: audio?.referen_audio }"
                                                    class="text-base">
                                                    {{ audio.type }} - {{ audio.id }}
                                                </option>

                                            </select>
                                        </div>
                                        <!-- <div v-else>tidak tersedia audio!</div> -->

                                        <div v-if="!selected[text.id]" class="hidden">
                                            audio masih kosong
                                        </div>
                                        <div v-else>
                                            <audio class="hidden" :src="`/storage/${selected[text.id]?.audio}`"
                                                :id="`audioPlay-${text.id}`" controls></audio>
                                        </div>
                                    </div>
                                    <div v-if="selected[text.id]" class="flex text-sm italic text-gray-600">
                                        <span v-if="selected[text.id].referen_audio" class="mt-2">
                                            referensi irama audio - {{ selected[text.id].referen_audio }}
                                        </span>
                                    </div>
                                </div>
                            </template>
                        </DisclosurePanel>
                    </transition>
                </Disclosure>
            </div>

            <!-- setting -->
            <Setting :filters="filters" :muhud="kumpulanMuhud" />
        </div>
    </section>
</template>

<script setup>
import Dropdown from '@/Components/Dropdown.vue'
import DropdownLink from '@/Components/DropdownLink.vue'
import Header from '@/Components/Header.vue';
import Setting from '@/Pages/Muhud/Setting.vue'
import Pimpinan from '@/Pages/Muhud/Pimpinan.vue';
import CategoryMuhud from '@/Pages/Muhud/CategoryMuhud.vue';
import { ref, watch } from 'vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import { Cog6ToothIcon, PlayIcon, PauseIcon, HeartIcon, DocumentDuplicateIcon, ArrowLeftIcon } from '@heroicons/vue/24/outline';
import { Popover, PopoverButton, PopoverPanel, Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue';


defineProps({
    filters: Object,
    kumpulanMuhud: Array,
    shalawat: Object,
    pimpinan: Array,
})

let selected = ref({})
let isPlaying = ref(0)
let category = ref('muhud')

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