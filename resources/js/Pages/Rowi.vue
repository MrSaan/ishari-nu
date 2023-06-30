<template>
    <div>
        <Header :filters="filters" @search="search" />
        <div class="flex justify-between gap-3">
            <!-- kiri -->
            <CategoryMuhud :filters="filter" :kumpulanMuhud="kumpulanMuhud" />
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
                        class="absolute p-1.5 bg-gray-100 z-10 mt-3 w-screen max-w-xs -translate-x-[11rem] md:-translate-x-8 transform px-4">
                        <Setting :button="button" @terjemahan="terjemahan" @transliterasi="transliterasi" />

                    </PopoverPanel>
                </Popover>

                <!-- Pimpinan -->
                <Pimpinan :pimpinan="pimpinan" :filter="filters" />
            </div>
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
import { Cog6ToothIcon, PlayIcon } from '@heroicons/vue/24/outline';
import { Link } from '@inertiajs/inertia-vue3';


let props = defineProps({
    reciters: Array,
    filters: Object,
    pimpinan: Array,
})

const filter = ref("1")
const kumpulanMuhud = ref([
    { id: 0, transliteration_id: "Ibtida & Bisyrahri", translation_id: "Bacaan Rowi" },
    { id: 1, transliteration_id: "Tanaqal", translation_id: "Bacaan Rowi" },
    { id: 2, transliteration_id: "Wulidal", translation_id: "Bacaan Rowi" },
    { id: 3, transliteration_id: "Sholla alaika", translation_id: "Bacaan Rowi" },
    { id: 4, transliteration_id: "Badatlana", translation_id: "Bacaan Rowi" },
    { id: 5, transliteration_id: "Mahalul Qiiyam", translation_id: "Bacaan Rowi" },
    { id: 6, transliteration_id: "Habibun", translation_id: "Bacaan Rowi" },
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
