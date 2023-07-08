<template>
    <div class="text-center px-8 mt-20">
        <h2 class="text-slate-900 text-3xl tracking-tight font-extrabold sm:text-5xl dark:text-gray-200">
            "Minim-nya" sumber belajar.
        </h2>
        <div>
            <p class="mt-6 max-w-3xl mx-auto text-sm sm:text-lg dark:text-gray-300">
                Saya telah mengikuti kegiatan <span class="text-green-500 font-semibold">Terbangan</span>
                selama bertahun-tahun. Cara terbaik untuk bisa belajar shalawat ishari adalah dengan cara
                mendengarkannya secara berulang, baik di Youtube, Rekaman, maupun di Majelis Hadrah. Saya
                benar-benar berpikir, Anda akan merasa kesulitan belajar shalawat ketika tidak mempunyai
                <span class="text-green-500 font-semibold">'sumber daya'</span>. Apalagi Anda ingin belajar
                shalawat secara spesifik dengan irama tertentu dari Pimpinan Shalawat yang Anda sukai.
            </p>
        </div>
        <div class="mt-6 flex flex-col items-center justify-center space-x-4 text-left">
            <div class="text-slate-900 font-semibold dark:text-white">M Amar Firmansyah</div>
            <div class="mt-0.5 text-sm leading-6">Creator</div>
        </div>
    </div>

    <!-- kedua -->
    <div
        class="w-full max-w-7xl mx-auto gap-4 mt-20 overflow-hidden sm:px-6 lg:px-4 lg:flex lg:flex-row lg:justify-between">
        <div
            class="flex flex-col lg:max-w-sm rounded-lg bg-green-400 lg:pb-24 md:pt-10 justify-end text-xl font-bold p-4 lg:pl-6 tracking-tight text-green-800 sm:text-4xl dark:bg-green-600">
            <span class="block">Baca dan Dengarkan Shalawat Favorit?</span>
            <span class="block text-white font-thin text-base md:text-2xl dark:text-gray-200">Mulai login hari ini.</span>
            <Link href="/login"
                class="bg-white rounded-lg px-4 py-1.5 mt-4 text-sm w-max text-green-400 font-bold tracking-wider leading-7 sm:inline-block hover:bg-green-600 md:mt-10 md:text-base">
            Login
            <span class="text-green-400" aria-hidden="true">&rarr;</span>
            </Link>
        </div>
        <div class="flex flex-col flex-shrink justify-end gap-4 items-center">
            <!-- <img :src="`/storage/preview.png`"
                            class="bg-auto rounded-tl-lg min-w-min h-72 md:h-96 mt-20 -mb-20 -mr-80 md:-mr-36 lg:-mr-6"> -->
            <div class="relative pt-10">
                <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]">
                    <svg class="relative right-[calc(50%-11rem)] -z-10 h-[21.1875rem] max-w-none -translate-x-1/2 rotate-[30deg] sm:right-[calc(50%-30rem)] sm:h-[42.375rem]"
                        viewBox="0 0 1155 678" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill="url(#45de2b6b-92d5-4d68-a6a0-9b9b2abad533)" fill-opacity=".3"
                            d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
                        <defs>
                            <linearGradient id="45de2b6b-92d5-4d68-a6a0-9b9b2abad533" x1="1155.49" x2="-78.208" y1=".177"
                                y2="474.645" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#9089FC"></stop>
                                <stop offset="1" stop-color="#FF80B5"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>

                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
                    <div class="bg-white rounded-lg p-4 mb-2 shadow-2xl col-span-12 dark:bg-gray-800 dark:shadow-none dark:text-gray-200" id="16">
                        <div class="flex justify-between items-center">
                            <h6 class="text-sm text-red-400 font-semibold"></h6>
                            <h5 class="text-base lg:text-2xl text-right font-arabic leading-relaxed lg:leading-loose">
                                الْالِفُ اوَّلَ الْكَلَامِ يَا مَجِيدُ</h5>
                        </div>
                        <div class="flex flex-col">
                            <h6 class="text-sm lg:text-base mt-2 italic">ālālifu awwala l-kalāmi yā majīdu
                            </h6>
                            <p class="text-sm lg:text-base lg:font-semibold mt-2 lg:leading-normal">Huruf
                                Alif
                                adalah awal kalimatku wahai Dzat yang Mulya</p>
                        </div>
                        <div
                            class="flex flex-row space-x-2 lg:space-x-3 text-gray-600 mt-2 lg:mt-3 pt-4 border-t-[1px] border-gray-200 items-center dark:text-green-600">

                            <div @click="putar('audioPlay-16')"
                                class="cursor-pointer hover:text-indigo-600 hover:bg-slate-200 p-1 rounded-full"
                                id="buttonPlay-16"><span class="sr-only">Play button</span><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z">
                                    </path>
                                </svg><audio class="hidden" id="audioPlay-16"
                                    src="/storage/Ibtida/Yc2EJPV4yqJiLYaxZViqDQZ1H9CTRtIWD97tDGwK.mp3" controls></audio>
                            </div>

                            <div v-if="isPlaying == 'audioPlay-16'" @click="pause('audioPlay-16')" id="buttonPause-16"
                                class="cursor-pointer hover:text-indigo-600 hover:bg-slate-200 p-1 rounded-full">
                                <span class="sr-only">Button Pause</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 5.25v13.5m-7.5-13.5v13.5"></path>
                                </svg>
                            </div>
                            <button type="submit"
                                class="cursor-pointer hover:text-indigo-600 hover:bg-slate-200 p-1 rounded-full text-rose-600 bg-rose-100"><span
                                    class="sr-only">Button Love</span><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                    class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z">
                                    </path>
                                </svg></button>
                            <div class="cursor-pointer hover:text-indigo-600 hover:bg-slate-200 p-1 rounded-full">
                                <span class="sr-only">Button Copy</span><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                    class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75">
                                    </path>
                                </svg>
                            </div>
                            <div><select
                                    class="appearance-none form-select block w-20 md:w-40 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none dark:bg-gray-400 dark:border-none">
                                    <option class="text-base">Gus Hadi - Joz</option>
                                    <option class="text-base">...</option>
                                </select></div>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="py-8 border-t bg-white border-gray-100 dark:border-gray-800 sm:flex justify-between gap-4 md:max-w-xl lg:max-w-3xl md:mx-auto dark:bg-gray-900">
                <div class="text-left">
                    <h6 class="text-xl font-semibold text-green-800 dark:text-gray-200">Free!</h6>
                    <p class="mt-2 text-slate-800 dark:text-gray-300">Membaca dan Mendengarkan shalawat sepuasnya</p>
                </div>
                <div class="text-left mt-4 sm:mt-0">
                    <h6 class="text-lg font-semibold text-green-800 dark:text-gray-200">Easy to use</h6>
                    <p class="mt-2 text-slate-800 dark:text-gray-300">Mudah digunakan dimana saja! cukup Install & gunakan.</p>
                </div>
                <div class="text-left mt-4 sm:mt-0">
                    <h6 class="text-lg font-semibold text-green-800 dark:text-gray-200">The most loved</h6>
                    <p class="mt-2 text-slate-800 dark:text-gray-300">Kumpulkan muradah kesukaan Anda! dan Dengarkan!</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import { ref } from 'vue';

let isPlaying = ref(0)

function putar(music) {
    var audio = document.querySelector(`#${music}`)
    audio.play()

    isPlaying.value = music

    var buttonPlay = document.querySelector('#buttonPlay-16')
    buttonPlay.classList.add("text-indigo-600")

    var buttonPause = document.querySelector('#buttonPause-16')
    if (buttonPause) {
        buttonPause.classList.remove("text-indigo-600")
    }

    audio.onended = function () {
        var buttonPlay = document.querySelector('#buttonPlay-16')
        buttonPlay.classList.remove("text-indigo-600")
        isPlaying.value = 0
    }
}

function pause(music) {
    var audio = document.querySelector(`#${music}`);
    audio.pause();

    var buttonPlay = document.querySelector('#buttonPlay-16');
    buttonPlay.classList.remove("text-indigo-600")

    var buttonPause = document.querySelector('#buttonPause-16');
    buttonPause.classList.add("text-indigo-600")
}

</script>
