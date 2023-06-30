<template>
    <div
        class="flex flex-col-reverse md:flex-row items-center w-full md:rounded-lg bg-white shadow-xl shadow-black/5 ring-1 ring-slate-700/10">
        <div class="flex items-center space-x-4 py-4 px-6">
            <!-- undo 15sec -->
            <svg class="h-6 w-6 flex-none cursor-pointer" fill="none" @click="undo()">
                <path
                    d="M6.22 11.03a.75.75 0 1 0 1.06-1.06l-1.06 1.06ZM3 6.75l-.53-.53a.75.75 0 0 0 0 1.06L3 6.75Zm4.28-3.22a.75.75 0 0 0-1.06-1.06l1.06 1.06ZM13.5 18a.75.75 0 0 0 0 1.5V18ZM7.28 9.97 3.53 6.22 2.47 7.28l3.75 3.75 1.06-1.06ZM3.53 7.28l3.75-3.75-1.06-1.06-3.75 3.75 1.06 1.06Zm16.72 5.47c0 2.9-2.35 5.25-5.25 5.25v1.5a6.75 6.75 0 0 0 6.75-6.75h-1.5ZM15 7.5c2.9 0 5.25 2.35 5.25 5.25h1.5A6.75 6.75 0 0 0 15 6v1.5ZM15 6H3v1.5h12V6Zm0 12h-1.5v1.5H15V18Z"
                    fill="#64748B"></path>
                <path d="M3 15.75h.75V21" stroke="#64748B" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round"></path>
                <path
                    d="M9 16.5A.75.75 0 0 0 9 15v1.5Zm-2.25-.75V15a.75.75 0 0 0-.75.75h.75Zm0 2.25H6c0 .414.336.75.75.75V18Zm0 2.25a.75.75 0 0 0 0 1.5v-1.5ZM9 15H6.75v1.5H9V15Zm-3 .75V18h1.5v-2.25H6Zm.75 3h1.5v-1.5h-1.5v1.5Zm1.5 1.5h-1.5v1.5h1.5v-1.5ZM9 19.5a.75.75 0 0 1-.75.75v1.5a2.25 2.25 0 0 0 2.25-2.25H9Zm-.75-.75a.75.75 0 0 1 .75.75h1.5a2.25 2.25 0 0 0-2.25-2.25v1.5Z"
                    fill="#64748B"></path>
            </svg>
            <!-- Play Button -->
            <div :id="currentPlay?.id" class="cursor-pointer">
                <PlayCircleIcon @click="play()" v-if="!isPlaying" class="h-10 w-10 flex-none" />
                <PauseCircleIcon v-else @click="pause()" class="h-10 w-10 flex-none" />
            </div>
            <!-- next 15sec -->
            <svg class="h-6 w-6 flex-none cursor-pointer" fill="none" @click="next()">
                <path
                    d="M16.72 9.97a.75.75 0 1 0 1.06 1.06l-1.06-1.06ZM21 6.75l.53.53a.75.75 0 0 0 0-1.06l-.53.53Zm-3.22-4.28a.75.75 0 1 0-1.06 1.06l1.06-1.06ZM10.5 19.5a.75.75 0 0 0 0-1.5v1.5Zm3.75-4.5a.75.75 0 0 0 0 1.5V15Zm.75.75h.75A.75.75 0 0 0 15 15v.75ZM14.25 21a.75.75 0 0 0 1.5 0h-1.5Zm6-4.5a.75.75 0 0 0 0-1.5v1.5ZM18 15.75V15a.75.75 0 0 0-.75.75H18ZM18 18h-.75c0 .414.336.75.75.75V18Zm0 2.25a.75.75 0 0 0 0 1.5v-1.5Zm-.22-9.22 3.75-3.75-1.06-1.06-3.75 3.75 1.06 1.06Zm3.75-4.81-3.75-3.75-1.06 1.06 3.75 3.75 1.06-1.06ZM2.25 12.75A6.75 6.75 0 0 0 9 19.5V18a5.25 5.25 0 0 1-5.25-5.25h-1.5ZM9 6a6.75 6.75 0 0 0-6.75 6.75h1.5C3.75 9.85 6.1 7.5 9 7.5V6Zm0 1.5h12V6H9v1.5Zm0 12h1.5V18H9v1.5Zm5.25-3H15V15h-.75v1.5Zm0-.75V21h1.5v-5.25h-1.5Zm6-.75H18v1.5h2.25V15Zm-3 .75V18h1.5v-2.25h-1.5Zm.75 3h1.5v-1.5H18v1.5Zm1.5 1.5H18v1.5h1.5v-1.5Zm.75-.75a.75.75 0 0 1-.75.75v1.5a2.25 2.25 0 0 0 2.25-2.25h-1.5Zm-.75-.75a.75.75 0 0 1 .75.75h1.5a2.25 2.25 0 0 0-2.25-2.25v1.5Z"
                    fill="#64748B"></path>
            </svg>
        </div>
        <div
            class="flex flex-auto pt-5 md:pt-0 w-full items-center border-l border-slate-200/60 pr-4 pl-6 text-[0.8125rem] leading-5 text-slate-700">
            <div>{{ currentTimeTxt }}</div>
            <div class="ml-4 flex flex-auto rounded-full bg-slate-100">
                <!-- <div class="h-2 w-1/3 flex-none rounded-l-full rounded-r-[1px] bg-indigo-600"></div>
                <div class="-my-[0.3125rem] ml-0.5 h-[1.125rem] w-1 rounded-full bg-indigo-600"></div> -->
                <input type="range" id="progressBar" v-model="audio.currentTime" class="w-full border-none">
            </div>
            <div class="ml-4">{{ currentDurationTxt }}</div>
            <div class="hidden md:flex md:flex-row">
                <SpeakerWaveIcon v-if="volume" class="w-6 h-6 flex-none ml-4 cursor-pointer" @click="mute()" />
                <SpeakerXMarkIcon v-else class="h-6 w-6 flex-none ml-4 cursor-pointer" @click="max()" />
            </div>
            <svg class="ml-6 h-6 w-6 hidden md:flex md:flex-none" fill="none">
                <path
                    d="M12 8v1a1 1 0 0 0 1-1h-1Zm0 0h-1a1 1 0 0 0 1 1V8Zm0 0V7a1 1 0 0 0-1 1h1Zm0 0h1a1 1 0 0 0-1-1v1ZM12 12v1a1 1 0 0 0 1-1h-1Zm0 0h-1a1 1 0 0 0 1 1v-1Zm0 0v-1a1 1 0 0 0-1 1h1Zm0 0h1a1 1 0 0 0-1-1v1ZM12 16v1a1 1 0 0 0 1-1h-1Zm0 0h-1a1 1 0 0 0 1 1v-1Zm0 0v-1a1 1 0 0 0-1 1h1Zm0 0h1a1 1 0 0 0-1-1v1Z"
                    fill="#64748B"></path>
            </svg>
        </div>
        <div class="hidden">
            <div v-if="currentPlay.length == 0">audio empty</div>
            <audio v-else :src="`/storage/${currentPlay?.song}`" controls="controls" id="musik" />
        </div>
    </div>
</template>

<script setup>
import { PauseCircleIcon, PlayCircleIcon, SpeakerWaveIcon, SpeakerXMarkIcon } from '@heroicons/vue/20/solid';
import { onBeforeUpdate, onMounted, onUpdated, ref, watch } from 'vue';
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue';
import { ExclamationTriangleIcon } from '@heroicons/vue/24/outline';

let props = defineProps({
    currentPlay: Object,
})

onUpdated(() => {
    initProgress()
    checkStop(props.currentPlay)
})

onMounted(() => {
    let audio = new Audio()
    let progressBar = document.querySelector('#progressBar')
    progressBar.value = 0
})

let audio = new Audio()
let isPlaying = ref(false)
let index = ref(0)
let activeItem = ref([])
let volume = ref(true)
let currentDuration = ref(0)
let currentTime = ref(0)
let currentTimeTxt = ref('0:00')
let currentDurationTxt = ref('0:00')
let isloading = ref(false)

function play() {
    // select audio tag
    if (typeof props.currentPlay.song == 'undefined') {
        return alert('pilih audio')
    } else {
        audio = document.querySelector('#musik')
    }
    audio.play()
    isPlaying.value = true
    activeItem.value = props.currentPlay
}

function pause() {
    audio.pause()
    isPlaying.value = false
}

function mute() {
    audio.volume = 0
    volume.value = false
}

function max() {
    audio.volume = 1
    volume.value = true
}

function undo() {
    audio = document.querySelector('#musik')
    audio.currentTime = audio.currentTime - 15
}

function next() {
    audio = document.querySelector('#musik')
    audio.currentTime = audio.currentTime + 15
}

function initProgress(value) {
    audio = document.querySelector('#musik')
    audio.addEventListener('loadedmetadata', () => {
        currentDuration.value = audio.duration
        let secs = `${parseInt(`${currentDuration.value % 60}`, 10)}`.padStart(2, '0')
        let mins = parseInt(`${(currentDuration.value / 60) % 60}`, 10)
        currentDurationTxt.value = `${mins}:${secs}`
        progressBar.max = currentDuration.value
    })
    audio.addEventListener('timeupdate', () => {
        updateProgress(audio.currentTime)
    })
}

function updateProgress(time) {
    progressBar.value = time
    let secs = `${parseInt(`${time % 60}`, 10)}`.padStart(2, '0')
    let mins = parseInt(`${(time / 60) % 60}`, 10)
    currentTimeTxt.value = `${mins}:${secs}`
    // console.log(progressBar.value);
}

function checkStop(a) {
    if (a !== activeItem.value) {
        isPlaying.value = false
        audio.pause()
    }
}


</script>
