<template>
    <nav>
        <ul>
            <li>
                <NavLink href="/" :active="$page.component === 'Welcome'">
                    <Squares2X2Icon class="w-5 h-5"
                        :class="{ 'text-white': $page.component === 'Muhud', 'text-green-600': $page.component !== 'Welcome' }" />
                    <span class="mx-4 text-lg font-semibold">Overview</span>
                </NavLink>
            </li>
            <li>
                <NavLink href="/muhud/1" :active="$page.component === 'Muhud'">
                    <BookOpenIcon class="w-5 h-5"
                        :class="{ 'text-white': $page.component === 'Muhud', 'text-green-600': $page.component !== 'Muhud' }" />
                    <span class="mx-4 text-lg font-semibold">Muhud</span>
                </NavLink>
            </li>
            <li>
                <NavLink href="/reciters" :active="$page.component === 'Reciters'">
                    <MicrophoneIcon class="w-5 h-5"
                        :class="{ 'text-white': $page.component === 'Muhud', 'text-green-600': $page.component !== 'Reciters' }" />
                    <span class="mx-4 text-lg font-semibold">Pimpinan</span>
                </NavLink>
            </li>
            <li>
                <NavLink href="/play" :active="$page.component === 'PlayMusic'">
                    <PlayCircleIcon class="w-5 h-5"
                        :class="{ 'text-white': $page.component === 'Muhud', 'text-green-600': $page.component !== 'PlayMusic' }" />
                    <span class="mx-4 text-lg font-semibold">Lagu Ishari</span>
                </NavLink>
            </li>
            <li class="border-t-[1px] my-2 border-gray-400">
            </li>
            <li>
                <NavLink href="/muhud" :active="$page.component === 'Note'">
                    <PencilSquareIcon class="w-5 h-5"
                        :class="{ 'text-white': $page.component === 'Muhud', 'text-green-600': $page.component !== 'Note' }" />
                    <span class="mx-4 text-lg font-semibold">Note</span>
                </NavLink>
            </li>
            <li>
                <NavLink href="/loved" :active="$page.component === 'Loved'">
                    <HeartIcon class="w-5 h-5"
                        :class="{ 'text-white': $page.component === 'Muhud', 'text-green-600': $page.component !== 'Loved' }" />
                    <span class="mx-4 text-lg font-semibold">Disukai</span>
                </NavLink>
            </li>
            <li>
                <NavLink href="/support" :active="$page.component === 'SupportUs'">
                    <GiftIcon class="w-5 h-5"
                        :class="{ 'text-white': $page.component === 'Muhud', 'text-green-600': $page.component !== 'SupportUs' }" />
                    <span class="mx-4 text-lg font-semibold">Support Us</span>
                </NavLink>
            </li>
        </ul>
    </nav>
</template>

<script setup>
import NavLink from './NavLink.vue';
import { BookOpenIcon, MicrophoneIcon, PlayCircleIcon, PencilSquareIcon, HeartIcon, Squares2X2Icon, GiftIcon } from '@heroicons/vue/24/outline';

defineProps({
    active: Boolean,
})
</script>
