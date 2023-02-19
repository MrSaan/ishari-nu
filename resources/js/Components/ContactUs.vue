<template>
    <div class="bg-white py-24 sm:py-32 lg:py-40">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="sm:text-center">
                <h2 class="text-lg font-semibold leading-8 text-green-600">Get in Touch</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Anda bisa menghubungi saya
                    melalui email.
                </p>
                <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-gray-600">Masukan, Saran, Rekomendasi konten
                    yang lebih baik akan sangat membantu Kami. Anda juga bisa mengirim audio kepada Kami untuk disajikan
                    kepada jamaah Hadrah ISHARI.</p>
            </div>

            <div class="mt-20 max-w-lg sm:mx-auto md:max-w-none">
                <div class="w-full md:max-w-xl lg:max-w-4xl mx-auto mt-6 shadow-2xl ">
                    <div class="py-1 md:py-0">
                        <form action="#" method="POST">
                            <div class="overflow-hidden shadow rounded-xl">
                                <div class="bg-white px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6">
                                            <label for="full-name" class="block text-sm font-medium text-gray-700">Full
                                                name</label>
                                            <input type="text" name="full-name" id="full-name" autocomplete="given-name"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm" />
                                        </div>

                                        <div class="col-span-6">
                                            <label for="email-address"
                                                class="block text-sm font-medium text-gray-700">Email
                                                address</label>
                                            <input type="text" name="email-address" id="email-address"
                                                autocomplete="email"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm" />
                                        </div>

                                        <div class="col-span-6">
                                            <label for="phone"
                                                class="block text-sm font-medium text-gray-700">Phone</label>
                                            <input type="number" name="phone" id="phone" autocomplete="phone"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm" />
                                        </div>

                                        <div class="col-span-6">
                                            <label for="message"
                                                class="block text-sm font-medium text-gray-700">Message</label>
                                            <div class="mt-1">
                                                <textarea id="message" name="message" rows="3"
                                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm"
                                                    placeholder="Text your message" />
                                            </div>
                                            <p class="mt-2 text-sm text-gray-500"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                    <button type="submit"
                                        class="inline-flex justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
import { EnvelopeIcon } from '@heroicons/vue/24/outline'

</script>