<template>
    <div class="hidden xl:flex flex-col">
        <div class="flex flex-col bg-white rounded-2xl p-4 space-y-4 shadow-md">
            <!-- theme -->
            <!-- <div class="flex flex-col">
                <div class="inline-flex space-x-2">
                    <div class="text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                        </svg>
                    </div>
                    <h6 class="font-semibold text-base">Tema</h6>
                </div>
                <div class="flex justify-between mt-2 p-1 bg-gray-200 rounded-full">

                    <div 
                        class="inline-flex shrink w-1/2 justify-center space-x-2 p-2 items-center bg-green-600 text-white text-xs font-semibold rounded-full">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-5 h-5">
                                <path
                                    d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z" />
                            </svg>
                        </div>
                        <h6>Terang</h6>
                    </div>

                    <div
                        class="inline-flex shrink w-1/2 justify-center space-x-2 p-2 items-center text-xs font-semibold rounded-full">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-5 h-5 text-green-400">
                                <path fill-rule="evenodd"
                                    d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 01.818.162z"
                                    clip-rule="evenodd" />
                            </svg>

                        </div>
                        <h6>Gelap</h6>
                    </div>
                </div>
            </div> -->
            <!-- Bahasa -->
            <!-- <div class="flex flex-col">
                <div class="inline-flex space-x-2">
                    <div class="text-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802" />
                        </svg>
                    </div>
                    <h6 class="text-base font-semibold">Bahasa</h6>
                </div>
                <div class="mt-2 p-2 w-full bg-gray-200 rounded-full flex justify-between items-center">
                    <h6 class="font-semibold text-base ml-2 ">Indonesia</h6>
                    <div class="mr-2 font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>

                    </div>
                </div>
            </div> -->
            <!-- divider -->
            <!-- <div class="border-t-[1px]"></div> -->
            <!-- Font setting -->
            <!-- <div class="flex flex-col">
                <div class="inline-flex space-x-2">
                    <div class="text-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round"
                                d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                        </svg>
                    </div>
                    <h6 class="text-base font-semibold">Muhud Font</h6>
                </div>
                <div class="bg-gray-200 p-1 mt-2 w-full rounded-full flex flex-row items-center">
                    <div class="w-1/3 py-2 flex justify-center">
                        <h6>A</h6>
                    </div>
                    <div class="w-1/3 text-white font-semibold py-2 flex justify-center bg-indigo-600 rounded-full">
                        B
                    </div>
                    <div class="w-1/3 py-2 flex justify-center">
                        C
                    </div>
                </div>
            </div> -->
            <!-- Terjemahan oleh -->
            <!-- Font size -->
            <!-- <div class="flex flex-col">
                <div class="inline-flex space-x-2">
                    <div class="text-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                        </svg>

                    </div>
                    <h6 class="text-base font-semibold">Font Size</h6>
                </div>
                <div class="flex justify-between mt-2 ">
                    <div class="flex flex-col w-1/2 mx-3">
                        <h6 class="text-gray-600 font-semibold text-base">Arabic</h6>
                        <div class="bg-gray-200 p-1 rounded-full flex flex-row space-x-2 justify-between">
                            <div
                                class="px-2 rounded-full bg-white text-gray-600 h-min items-center text-lg font-semibold">
                                +
                            </div>
                            <span>16</span>
                            <div
                                class="px-2 rounded-full bg-white text-gray-600 h-min items-center text-lg font-semibold">
                                -
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-1/2 mx-3">
                        <h6 class="text-gray-600 font-semibold text-base">Terjemahan</h6>
                        <div class="bg-gray-200 p-1 rounded-full flex flex-row space-x-2 justify-between">
                            <div
                                class="px-2 rounded-full bg-white text-gray-600 h-min items-center text-lg font-semibold">
                                +
                            </div>
                            <span>16</span>
                            <div
                                class="px-2 rounded-full bg-white text-gray-600 h-min items-center text-lg font-semibold">
                                -
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- divider -->
            <!-- <div class="border-t-[1px]"></div> -->
            <!-- Pimpinan -->
            <!-- <div class="flex flex-col">
                <div class="inline-flex space-x-2">
                    <div class="text-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z" />
                        </svg>
                    </div>
                    <h6 class="text-base font-semibold">Pimpinan</h6>
                </div>
                <div class="mt-2 p-2 w-full bg-gray-200 rounded-full flex justify-between items-center">
                    <h6 class="font-semibold text-base ml-2 text-gray-400">Dr. Fulan</h6>
                    <div class="mr-2 font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>

                    </div>
                </div>
            </div> -->

            <div class="flex flex-col">
                <div class="inline-flex space-x-2">
                    <div class="text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802" />
                        </svg>
                    </div>
                    <h6 class="text-base font-semibold">Terjemahan</h6>
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

        </div>

        <!-- iklan section -->
        <div class="w-[300px] h-[250px] border mt-4 flex items-center justify-center">
            untuk iklan
        </div>
        <div class="w-[300px] h-[250px] border mt-4 flex items-center justify-center">
            untuk iklan
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

// let props = defineProps({
//     filters: Object,
//     muhud: Object
// });

// let pasal = ref(props.filters.category ? props.filters.category : 1)
// let shalawat = ref(props.muhud[pasal.value - 1])

</script>