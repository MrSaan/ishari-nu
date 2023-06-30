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
                    Assalamu'alaikum warahmatullahi wabarakatuh,
                    <br><br>
                    Kami dengan penuh rasa syukur dan kebahagiaan, mempersembahkan aplikasi membaca shalawat nabi sebagai
                    bentuk penghormatan dan kecintaan kami kepada junjungan kita, Nabi Muhammad SAW.
                    <br><br>
                    Aplikasi ini dirancang sebagai sarana untuk membantu umat Islam dalam membaca dan mengamalkan shalawat
                    nabi secara rutin dan konsisten, sebagai bentuk penghormatan dan rasa syukur kita kepada Nabi Muhammad
                    SAW yang telah membawa risalah agama Islam ke dunia ini.
                    <br><br>
                    Kami percaya bahwa dengan membaca shalawat nabi secara rutin, kita dapat mendapatkan berbagai keberkahan
                    dan rahmat dari Allah SWT, serta meraih kebahagiaan di dunia dan di akhirat.
                    <br><br>
                    Oleh karena itu, kami berharap bahwa aplikasi ini dapat menjadi sarana yang bermanfaat bagi umat Islam
                    dalam memperbanyak bacaan shalawat nabi khususnya shalawat ISHARI, serta memperkuat cinta dan kecintaan kita kepada Nabi Muhammad SAW.
                    <br><br>
                    Terima kasih atas kepercayaan dan dukungan Anda dalam menggunakan aplikasi kami. Semoga Allah SWT
                    senantiasa memberikan rahmat dan keberkahan kepada kita semua. Amin.
                    <br><br>
                    Aplikasi dibangun dengan
                    mangambil berbagai sumber baik teks shalawat dan audio. Sebagian
                    besar teks
                    berasal dari dokumen terbitan PW ISHARI JATIM yang dibuat Oleh Ustadz M
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
                    Kontak email : aamarfirmansyah@gmail.com
                </DisclosurePanel>
            </Disclosure>
            <Disclosure as="div" class="mt-2" v-slot="{ open }" :defaultOpen="open">
                <DisclosureButton
                    class="flex w-full justify-between rounded-lg bg-green-100 px-4 py-2 text-left text-sm font-medium text-green-900 hover:bg-green-200 focus:outline-none focus-visible:ring focus-visible:ring-green-500 focus-visible:ring-opacity-75">
                    <span>Support Us?</span>
                    <ChevronUpIcon :class="open ? 'rotate-180 transform' : ''" class="h-5 w-5 text-green-500" />
                </DisclosureButton>
                <DisclosurePanel class="px-4 pt-4 pb-2 text-base text-gray-500">
                    Buy me a coffe !!
                    <br>
                    link : <a href="https://saweria.co/AmarFirmansyah"
                        class="text-indigo-600">https://saweria.co/AmarFirmansyah</a>
                    <br><br>
                    Segala puji bagi Allah SWT. Atas segala nikmat dan karunia -Nya yang senantiasa melimpah kepada kita
                    semua.
                    <br><br>
                    Kami sebagai pengembang aplikasi, dengan penuh rasa syukur dan kebahagiaan, ingin mengucapkan terima
                    kasih yang sebesar-besarnya kepada seluruh pengunjung website ini yang telah memberikan dukungan dan
                    kepercayaan kepada kami.
                    <br><br>
                    Kami juga berharap bahwa melalui website ini, kami dapat saling berbagi informasi dan pengetahuan yang
                    bermanfaat, terutama dalam konteks bershalawat khususnya shalawat ISHARI. Semoga website ini dapat
                    menjadi media yang membantu kita semua dalam meningkatkan keimanan dan ketakwaan kepada Allah SWT.
                    <br><br>
                    Kami akan sangat berterima kasih kepada Anda yang telah me-nyawer Kami. tiada kata yang pantas kami
                    ucapkan selain do'a kami dan balasan dari Allah SWT. Kami membuat aplikasi ini dari awal, mengumpulkan
                    dan menyusun teks demi teks sholawat, sehingga kami bisa sajikan dalam bentuk digital dan potongan
                    audio dari Pimpinan Hadrah.
                    <br><br>
                    Kurang lebih 2 tahun Kami membangun aplikasi ini dengan segala kesibukan yang ada. dan Alhamdulillah
                    bisa terwujud. dan memang inilah yang Kami inginkan sejak lama mengikuti kegiatan ISHARI.
                    <br>
                    <br>
                    <p class="text-black hover:text-green-600 text-center"><span
                            class="text-base font-semibold text-black">Website</span> ini dikembangkan secara mandiri. dan
                        jika Anda ingin berpartisipasi membangun ekosistem aplikasi ini. Anda bisa mentraktir Kami atau
                        Donasi melalui link saweria di atas.</p>
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
import { ref } from 'vue';

const open = ref(true)

</script>
