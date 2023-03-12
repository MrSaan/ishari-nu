<!-- This example requires Tailwind CSS v3.0+ -->
<template>
    <div class="isolate bg-white">
        <!-- gradient warna -->
        <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]">
            <svg class="relative left-[calc(50%-11rem)] -z-10 h-[21.1875rem] max-w-none -translate-x-1/2 rotate-[30deg] sm:left-[calc(50%-30rem)] sm:h-[42.375rem]"
                viewBox="0 0 1155 678" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill="url(#45de2b6b-92d5-4d68-a6a0-9b9b2abad533)" fill-opacity=".3"
                    d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
                <defs>
                    <linearGradient id="45de2b6b-92d5-4d68-a6a0-9b9b2abad533" x1="1155.49" x2="-78.208" y1=".177"
                        y2="474.645" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#16a34a" />
                        <stop offset="1" stop-color="#14532d" />
                    </linearGradient>
                </defs>
            </svg>
        </div>
        <div class="px-6 pt-6 lg:px-8">
            <div>
                <nav class="flex h-9 items-center justify-between" aria-label="Global">
                    <div class="flex lg:min-w-0 lg:flex-1" aria-label="Global">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <!-- <img class="h-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                                alt="" /> -->
                        </a>
                    </div>
                    <!-- mobile button -->
                    <div class="flex lg:hidden">
                        <button type="button"
                            class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700"
                            @click="mobileMenuOpen = true">
                            <span class="sr-only">Open main menu</span>
                            <Bars3Icon class="h-6 w-6" aria-hidden="true" />
                        </button>
                    </div>

                    <!-- navigation -->
                    <div class="hidden lg:flex lg:min-w-0 lg:flex-1 lg:justify-center lg:gap-x-12">
                        <Link v-for="item in navigation" :key="item.name" :href="item.href"
                            class="font-semibold text-gray-900 hover:text-green-600 hover:underline hover:underline-offset-4">
                        {{
                            item.name
                        }}</Link>
                    </div>
                    <div class="hidden lg:flex lg:min-w-0 lg:flex-1 lg:justify-end">
                        <Link v-if="!user" href="/login"
                            class="inline-block rounded-lg px-3 py-1.5 text-sm font-semibold leading-6 text-gray-900 shadow-sm ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                        Log in
                        </Link>
                        <div v-else class="cursor-pointer hover:text-green-600">
                            {{ user?.name }}
                        </div>
                    </div>
                </nav>
                <!-- mobile menu -->
                <Dialog as="div" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
                    <DialogPanel focus="true" class="fixed inset-0 z-10 overflow-y-auto bg-white px-6 py-6 lg:hidden">
                        <div class="flex h-9 items-center justify-between">
                            <div class="flex">
                                <a href="#" class="-m-1.5 p-1.5">
                                    <span class="sr-only">Your Company</span>
                                    <img class="h-8"
                                        src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="" />
                                </a>
                            </div>
                            <div class="flex">
                                <button type="button"
                                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700"
                                    @click="mobileMenuOpen = false">
                                    <span class="sr-only">Close menu</span>
                                    <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                                </button>
                            </div>
                        </div>
                        <div class="mt-6 flow-root">
                            <div class="-my-6 divide-y divide-gray-500/10">
                                <div class="space-y-2 py-6">
                                    <a v-for="item in navigation" :key="item.name" :href="item.href"
                                        class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-400/10">
                                        {{ item.name }}
                                    </a>
                                </div>
                                <div class="py-6" v-if="!user">
                                    <a href="/login"
                                        class="-mx-3 block rounded-lg py-2.5 px-3 text-base font-semibold leading-6 text-gray-900 hover:bg-gray-400/10">
                                        Log in
                                    </a>
                                </div>
                            </div>
                        </div>
                    </DialogPanel>
                </Dialog>

            </div>
        </div>
        <main>
            <div class="relative px-6 lg:px-8">
                <HeroSection />
                <Testimonial />
                <CallToAction />
            </div>
            <div class="relative max-w-6xl mx-auto pt-10 xl:pt-0 mt-10 xl:mt-2">
                <div class="absolute inset-x-0 bg-top bg-no-repeat GridLockup_beams-5__G7h2t top-0 xl:top-8">
                </div>
                <div
                    class="absolute inset-x-0 h-[37.5rem] bg-grid-slate-900/[0.04] bg-top [mask-image:linear-gradient(0deg,transparent,black)] dark:bg-grid-slate-100/[0.03] dark:bg-[center_top_-1px] dark:border-t dark:border-slate-100/5 top-0 xl:top-8">
                </div>
                <Feature />
                <ContactUs />
            </div>
        </main>
        <Footer />
    </div>
</template>

<script setup>
import HeroSection from '@/Pages/Overview/HeroSection.vue';
import Testimonial from '@/Pages/Overview/Testimonial.vue';
import CallToAction from '@/Pages/Overview/CallToAction.vue';
import Feature from '@/Pages/Overview/Feature.vue';
import Footer from '@/Components/Footer.vue';
import ContactUs from '@/Components/ContactUs.vue';
import { computed, ref } from 'vue'
import { Bars3Icon, XMarkIcon, ExclamationTriangleIcon } from '@heroicons/vue/24/outline'
import { Dialog, DialogPanel, DialogTitle, DialogDescription, TransitionRoot, TransitionChild } from '@headlessui/vue'
import { Link, usePage } from '@inertiajs/inertia-vue3'

const user = computed(() => usePage().props.value?.auth?.user)
const mobileMenuOpen = ref(false)

const navigation = [
    { name: 'Muhud', href: '/muhud/1' },
    { name: 'Pimpinan', href: '/reciters' },
    { name: 'Shalawat Ishari', href: '/play' },
    { name: 'Loved', href: '/loved' },
]
</script>
