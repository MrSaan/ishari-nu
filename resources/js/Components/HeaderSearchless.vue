<template>
    <header class="flex flex-row mt-2 justify-between bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="m-4 flex flex-row justify-items-center space-x-2">
            <button class="sm:hidden p-2" @click="mobileFiltersOpen = true">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10zm0 5.25a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <!-- Dropdown -->
        <div class="m-4 ">
            <Dropdown :align="right">
                <template #trigger>
                    <button type="button" class="inline-flex max-w-xs items-center rounded-full text-sm">
                        <span class=" sr-only">Open user menu</span>
                        <div v-if="$page.props.auth.user == null" class="flex items-center">
                            <img class="h-8 w-8 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                            <span class="flex pl-3 font-semibold">Guest</span>
                        </div>
                        <div v-else class="flex items-center">
                            <img v-if="user.avatar" class="h-8 w-8 rounded-full" :src="`/storage/${user.avatar}`"
                                alt="avatar">
                            <span v-else
                                class="flex justify-center items-center h-8 w-8 overflow-hidden rounded-full bg-gray-300">
                                <span class="font-thin text-xs text-gray-600">{{ identity }}</span>
                            </span>
                            <h1 class="flex ml-3">{{ user.name }}</h1>
                            <ChevronDownIcon class="ml-2 -mr-0.5 h-4 w-4" />
                        </div>
                    </button>
                </template>

                <template #content>
                    <div v-if="$page.props.auth.user == null">
                        <DropdownLink :href="route('login')" method="get" as="button">Login</DropdownLink>
                        <DropdownLink :href="route('register')" method="get" as="button">Register
                        </DropdownLink>
                    </div>
                    <div v-else>
                        <DropdownLink :href="route('admin')" method="get" as="button">Admin
                        </DropdownLink>
                        <DropdownLink :href="route('profile')" method="get" as="button">Profile
                        </DropdownLink>
                        <DropdownLink :href="route('logout')" method="post" as="button">Log Out
                        </DropdownLink>
                    </div>
                </template>
            </Dropdown>
        </div>
        <!-- end Dropdown -->
    </header>

    <!-- Mobile filter dialog -->
    <TransitionRoot as="template" :show="mobileFiltersOpen">
        <Dialog as="div" class="relative z-40 lg:hidden" @close="mobileFiltersOpen = false">
            <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0"
                enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100"
                leave-to="opacity-0">
                <div class="fixed inset-0 bg-black bg-opacity-25" />
            </TransitionChild>

            <div class="fixed inset-0 z-40 flex">
                <TransitionChild as="template" enter="transition ease-in-out duration-300 transform"
                    enter-from="translate-x-full" enter-to="translate-x-0"
                    leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0"
                    leave-to="translate-x-full">
                    <DialogPanel
                        class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl">
                        <div class="flex items-center justify-between px-4">
                            <h2 class="text-lg font-medium text-gray-900">Ishari</h2>
                            <button type="button"
                                class="-mr-2 flex h-10 w-10 items-center justify-center rounded-md bg-white p-2 text-gray-400"
                                @click="mobileFiltersOpen = false">
                                <span class="sr-only">Close menu</span>
                                <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                            </button>
                        </div>

                        <!-- Filters -->
                        <Nav />
                    </DialogPanel>
                </TransitionChild>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import Nav from '@/Components/Nav.vue';
import { Inertia } from '@inertiajs/inertia';
import { usePage } from '@inertiajs/inertia-vue3';
import { computed, ref, watch } from 'vue';
import { TransitionRoot, TransitionChild, Dialog, DialogPanel } from '@headlessui/vue';
import { XMarkIcon, ChevronDownIcon } from '@heroicons/vue/24/outline';

let mobileFiltersOpen = ref(false)
let right = ref('right')
const user = computed(() => usePage().props.value.auth.user)
let identity = ref(user.value !== null ? user.value.name.split(' ').map(name => name[0]).join('').toUpperCase() : 'Guest')

</script>
