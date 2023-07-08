<template>
    <div >
        <div class="flex flex-col bg-white rounded-2xl p-4 space-y-4 shadow-md dark:bg-gray-800">
            <div class="flex flex-col">
                <div class="inline-flex space-x-2">
                    <div class="text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802" />
                        </svg>
                    </div>
                    <h6 class="text-base font-semibold dark:text-gray-200">Terjemahan</h6>
                </div>
                <div class="mt-2 p-2 w-full bg-gray-200 rounded-full flex justify-between items-center">
                    <h6 class="font-semibold text-base ml-2 text-gray-400">Kiai M Nuruddin</h6>
                    <div class="mr-2 font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>

                    </div>
                </div>
            </div>
            <div class="border-t-[1px]"></div>
            <div class="flex justify-around dark:text-gray-200">
                <div>
                    <h6 class="text-base font-semibold">Transliterasi</h6>
                    <div>
                        <SwitchToggle @enabled="enabledTransliterasi" :button="transliterasi"/>
                    </div>
                </div>
                <div>
                    <h6 class="text-base font-semibold">Terjemahan</h6>
                    <SwitchToggle @enabled="enabledTerjemahan" :button="terjemahan"/>
                </div>
            </div>
        </div>

        <!-- iklan section -->
        <div class="w-[300px] h-[250px] mt-4 flex items-center justify-center">
            <!-- untuk iklan -->
        </div>
        <div class="w-[300px] h-[250px] mt-4 flex items-center justify-center">
            <!-- untuk iklan -->
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import SwitchToggle from '../../Components/SwitchToggle.vue';

const emit = defineEmits(['transliterasi', 'terjemahan'])
const props = defineProps(["button"])

const transliterasi = ref(props.button.isTransliterasi)
const terjemahan = ref(props.button.isTerjemahan)

function enabledTransliterasi(value) {
    emit('transliterasi', value)
}

function enabledTerjemahan(value) {
    emit('terjemahan', value)
}
</script>
