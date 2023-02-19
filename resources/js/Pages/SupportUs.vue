<template>
    <HeaderSearchLess />
    <div class="mx-auto flex flex-col items-center">
        <div class="bg-white py-6 px-4 w-full md:rounded-md">
            <span class="font-semibold text-lg"></span>
            <Disclosure v-slot="{ open }">
                <DisclosureButton
                    class="flex w-full justify-between rounded-lg bg-green-100 px-4 py-2 text-left text-sm font-medium text-green-900 hover:bg-green-200 focus:outline-none focus-visible:ring focus-visible:ring-green-500 focus-visible:ring-opacity-75">
                    <span>Tentang Kami?</span>
                    <ChevronUpIcon :class="open ? 'rotate-180 transform' : ''" class="h-5 w-5 text-green-500" />
                </DisclosureButton>
                <DisclosurePanel class="px-4 pt-4 pb-2 text-base text-gray-500">
                    Aplikasi ini didirikan tahun 2022. pada saat ini aplikasi ini masih tahap beta!. Terima kasih semua
                    yang telah mensupport kami. Aplikasi ini bertujuan untuk memberikan kemudahan untuk siapa saja
                    mempelajari shalawat ISHARI NU dan memperkenalkan kepada khalayak umum. Aplikasi ini dibuat oleh
                    <span class="text-green-600">'M
                        Amar Firmansyah'</span> untuk lebih lanjut bisa menghubungi lewat 'get in touch'.
                    <br><br>
                    Aplikasi dibangun dengan
                    mangambil berbagai sumber baik teks shalawat dan audio. Sebagian
                    besar teks
                    berasal dari dokumen terbitan PW ISHARI JATIM yang dibuat Oleh Al – Faqir ilaa Rohmati Al Muhaimin M
                    Nuruddin.
                    <br>
                    Untuk masukan dan saran kami mengharapkan bantuan dari rekan-rekan sekalian untuk pengembangan
                    aplikasi yang lebih baik.
                </DisclosurePanel>
            </Disclosure>
            <Disclosure as="div" class="mt-2" v-slot="{ open }">
                <DisclosureButton
                    class="flex w-full justify-between rounded-lg bg-green-100 px-4 py-2 text-left text-sm font-medium text-green-900 hover:bg-green-200 focus:outline-none focus-visible:ring focus-visible:ring-green-500 focus-visible:ring-opacity-75">
                    <span>Hubungi?</span>
                    <ChevronUpIcon :class="open ? 'rotate-180 transform' : ''" class="h-5 w-5 text-green-500" />
                </DisclosureButton>
                <DisclosurePanel class="px-4 pt-4 pb-2 text-base text-gray-500">
                    Kontak email : langlangbolang87@gmail.com
                </DisclosurePanel>
            </Disclosure>
            <Disclosure as="div" class="mt-2" v-slot="{ open }" defaultOpen="true">
                <DisclosureButton
                    class="flex w-full justify-between rounded-lg bg-green-100 px-4 py-2 text-left text-sm font-medium text-green-900 hover:bg-green-200 focus:outline-none focus-visible:ring focus-visible:ring-green-500 focus-visible:ring-opacity-75">
                    <span>Support Us?</span>
                    <ChevronUpIcon :class="open ? 'rotate-180 transform' : ''" class="h-5 w-5 text-green-500" />
                </DisclosureButton>
                <DisclosurePanel class="px-4 pt-4 pb-2 text-base text-gray-500">
                    Anda bisa mensupport kami melalui Donasi Saweria (ovo, dana, linkAja, gopay , Qris).
                    <br>
                    link : <a href="https://saweria.co/AmarFirmansyah"
                        class="text-indigo-600">https://saweria.co/AmarFirmansyah</a>
                    <br><br>
                    Kami akan sangat berterima kasih kepada Anda yang telah me-nyawer Kami. tiada kata yang pantas kami
                    ucapkan selain do'a kami dan balasan dari Allah SWT. Kami membuat aplikasi ini dari dasar,
                    mengumpulkan
                    dan menyusun teks demi teks sholawat, sehingga kami bisa sajikan dalam bentuk digital dan potongan
                    audio dari Pimpinan Hadrah. Dari saweran Anda, kami bisa memberikan konten yang lebih baik dan
                    perawatan Aplikasi sehingga bisa diakses oleh khalayak umum.
                    <br>
                    <br>
                    InsyaAllah kedepan kami akan memberikan API untuk shalawat ISHARI beserta audio. dalam artian
                    project kedepan akan Kami Open Source sehingga developer bisa mengembangkan lebih jauh lagi. Tetap
                    dukung kami melalui saweria ☕ ...
                    <br>
                    <br>
                    Terima Kasih,
                    <br>
                    Wassalamu'alaikum Wr. Wb.
                </DisclosurePanel>
            </Disclosure>
        </div>
    </div>
</template>

<script setup>
import HeaderSearchLess from '@/Components/HeaderSearchless.vue';
import { ChevronUpIcon } from '@heroicons/vue/20/solid';
import {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
} from '@headlessui/vue'

</script>