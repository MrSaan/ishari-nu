<template>
    <div class="mx-auto max-w-3xl pt-20 pb-24 sm:pt-40">
        <div>
            <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                <div
                    class="relative overflow-hidden rounded-full py-1.5 px-4 text-sm leading-6 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                    <span class="text-gray-600 dark:text-gray-300">
                        Support kami untuk menyajikan konten yang lebih baik.
                        <Link href="/support" class="font-semibold text-green-600"><span class="absolute inset-0"
                            aria-hidden="true" />Read more <span aria-hidden="true">&rarr;</span>
                        </Link>
                    </span>
                </div>
            </div>
            <div>
                <h1 class="text-4xl font-bold tracking-tight sm:text-center sm:text-6xl dark:text-gray-200">
                    Ikatan Seni Hadrah Indonesia
                </h1>
                <p class="mt-6 sm:text-lg text-base leading-8 text-gray-600 italic sm:text-center dark:text-gray-300">
                    Mendengarkan dan membaca shalawat ISHARI.
                </p>
                <p class="text-lg leading-8 text-gray-600 sm:text-center dark:text-gray-400">
                    "Sesungguhnya Allah dan para malaikat-Nya bersalawat untuk Nabi. Wahai orang-orang yang
                    beriman! Bersalawatlah kamu untuk Nabi dan ucapkanlah salam dengan penuh penghormatan
                    kepadanya.” (QS. Al-Ahzab [33]: 56)
                </p>
                <div class="mt-8 flex gap-x-4 sm:justify-center">
                    <Link href="/muhud/1"
                        class="inline-block rounded-lg bg-green-500 px-4 py-1.5 text-base font-semibold leading-7 text-white shadow-sm ring-1 ring-green-600 hover:bg-green-700 hover:ring-green-700 dark:bg-green-600">
                    Get started
                    <span class="text-green-200" aria-hidden="true">&rarr;</span>
                    </Link>
                    <Link href="/support"
                        class="inline-block rounded-lg px-4 py-1.5 text-base font-semibold leading-7 text-gray-900 ring-1 ring-gray-900/10 hover:ring-gray-900/20 dark:bg-gray-200">
                    About Us
                    <span class="text-gray-400" aria-hidden="true">&rarr;</span>
                    </Link>
                </div>
            </div>
            <div
                class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]">
                <svg class="relative left-[calc(50%+3rem)] h-[21.1875rem] max-w-none -translate-x-1/2 sm:left-[calc(50%+36rem)] sm:h-[42.375rem]"
                    viewBox="0 0 1155 678" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill="url(#ecb5b0c9-546c-4772-8c71-4d3f06d544bc)" fill-opacity=".3"
                        d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
                    <defs>
                        <linearGradient id="ecb5b0c9-546c-4772-8c71-4d3f06d544bc" x1="1155.49" x2="-78.208" y1=".177"
                            y2="474.645" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#16a34a" />
                            <stop offset="1" stop-color="#34d399" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
</script>
