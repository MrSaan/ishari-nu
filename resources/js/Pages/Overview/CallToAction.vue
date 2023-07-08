<template>
    <!-- CTA -->
    <div class="max-w-6xl mx-auto">
        <div class="md:w-2/3 lg:w-1/2 lg:mt-20 mt-16">
            <h2 class="my-8 text-2xl font-bold text-gray-700 md:text-4xl dark:text-gray-200">
                ISHARI adalah Amaliyah Thariqah & Budaya Ulama Nusantara NU
            </h2>
            <p class="text-gray-600 dark:text-gray-300">
                Ishari penuh dengan filosifi ajaran Islam, sebagaimana pesan Almaghfurlah Syekh Abdurrokhim
                Pasuruan (pendiri) karena itu setiap pukulan, jawaban lagu dan gerakan dalam ISHARI memiliki
                makna
                filosofis yang mendalam
            </p>
        </div>

        <div
            class="mt-16 grid divide-x divide-y divide-gray-100 dark:divide-gray-700 overflow-hidden rounded-3xl border border-gray-100 text-gray-600 dark:border-gray-700 sm:grid-cols-2 lg:grid-cols-4 lg:divide-y-0 xl:grid-cols-4">
            <div v-for="information in informations" :key="information.id"
                class="group relative bg-white dark:bg-gray-800 transition hover:z-[1] hover:shadow-2xl hover:shadow-gray-600/10">
                <div class="relative space-y-8 py-12 p-8">
                    <img :src="information.asset" class="w-12" width="512" height="512" alt="burger illustration" />

                    <div class="space-y-2">
                        <h5
                            class="text-xl font-semibold text-gray-700 dark:text-white transition group-hover:text-secondary">
                            {{ information.name }}
                        </h5>
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ information.desc }}
                        </p>
                    </div>
                    <div @click="openDialog(information.id)"
                        class="flex items-center justify-between cursor-pointer group-hover:text-secondary">
                        <span class="text-sm">Read more</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-5 h-5 -translate-x-4 text-2xl opacity-0 transition duration-300 group-hover:translate-x-0 group-hover:opacity-100">
                            <path fill-rule="evenodd"
                                d="M12.97 3.97a.75.75 0 011.06 0l7.5 7.5a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 11-1.06-1.06l6.22-6.22H3a.75.75 0 010-1.5h16.19l-6.22-6.22a.75.75 0 010-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- dialog modal -->
    <TransitionRoot as="template" :show="isOpen">
        <Dialog as="div" class="relative z-10" @close="setIsOpen">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100"
                leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </TransitionChild>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <TransitionChild as="template" enter="ease-out duration-300"
                        enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200"
                        leave-from="opacity-100 translate-y-0 sm:scale-100"
                        leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <DialogPanel
                            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full md:max-w-2xl lg:max-w-3xl">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div
                                        class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <ExclamationTriangleIcon class="h-6 w-6 text-red-600" aria-hidden="true" />
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <DialogTitle as="h3" class="text-lg font-medium leading-6 text-gray-900">
                                            {{ dialogMessage.name }}
                                        </DialogTitle>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">
                                                {{ dialogMessage.text }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="button"
                                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm"
                                    @click="setIsOpen(false)">OK</button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import { Dialog, DialogPanel, DialogTitle, DialogDescription, TransitionRoot, TransitionChild } from '@headlessui/vue'
import { Bars3Icon, XMarkIcon, ExclamationTriangleIcon } from '@heroicons/vue/24/outline'
import { onMounted, ref } from 'vue';

const informations = [
    { name: 'Bacaan Shalawat', id: 0, asset: 'https://cdn-icons-png.flaticon.com/512/4341/4341139.png', desc: 'Bacaan Shalawat bersumber dari kitab Diwan Hadrah dan dipadukan dengan pembacaan Kitab Maulid Syaroful Anam dalam bentuk syair.', text: 'Semula hanya bacaan Sholawat yang bersumber dari kitab Diwan hadroh, oleh beliau dipadukan dengan pembacaan Kitab Maulid Syaroful Anam dan ditambah bacaan Sholawat berbentuk Syair yang berfungsi menjadi semacam jawaban atas pembacaan kumpulan Bait-bait Syair Kitab Maulid Syaroful Anam oleh Guru Hadi (kumpulan bait bait tersebut dalam Hadroh dikenal dengan sebutan Mukhud). Ada 13 Mukhud dalam Hadroh selain Mukhud Ibtida’ (Pembuka) dan Takhtim (Penutup), dan nama Mukhud biasanya diambil dari Lafadz Bacaan yang Awwal pada kumpulan bait dalam kitab Maulid Syaroful Anam seperti Mukhud Bi syahri, Tanaqqol ta, Wulidal habib dst. Lantunan lagu pembacaan amalan Sholawat bernotasi dan berintonasi khusus, (Para Ulama berpendapat “itu lagunya orang yang Tadlorru’ kepada Alloh SWT”), dan hanya bisa dilakukan oleh Beliau KH Abdurrokhim (Guru Hadi) dan orang lain (santrinya) yang terbimbing melalui tarbiyah dan talqin (Guru badal hadi) oleh beliau. Dikandung maksud tarbiyah itu untuk sanad bacaan lafadz Sholawatnya sementara talqin itu untuk Thoriqoh lantunan dan notasi Syairnya. ~https://hosnews.id/filosofi-ishari-nu-ikatan-seni-hadrah-indonesia/' },
    { name: 'Rebana', id: 1, asset: 'https://cdn-icons-png.flaticon.com/512/4341/4341134.png', desc: 'Ragam irama dan pukulan syarat dengan filosofi.', text: 'Rebana yang digunakan adalah berdiameter 30 cm dengan tambahan 2 pasang kencreng dan minimal dilakukan oleh 3 orang, sedangkan posisi tempat pemukul adalah 3 Orang disamping kanan Guru hadi dan 3 Orang lagi (kalau ada) sebelah kiri Guru Hadi berhadapan dengan jamaah Roddat. Dikandung maksud jumlah minimal pemukul 3 Orang adalah simbul dari Tiga pokok ajaran Agama yaitu Iman, Islam, dan Ikhsan atau 3 pokok Ilmu dalam agama Islam yaitu Ilmu Tauhid, Ilmu Fiqih, dan Ilmu Tasawwuf. Notasi Irama pukulan rebana mengikuti Notasi lagu yang dibawakan oleh Guru Hadi, oleh karena itu irama pukulan dalam hadroh bukan irama pukulan biasa-biasa yang hanya hasil dari kreasi seni belaka, akan tetapi irama pukulan dalam Hadroh merupakan bagian dari Thoriqoh karna mengandung makna filosofis yang mendalam sehingga penguasaannya pun harus melalui tarbiyah atau belajar kepada Guru Hadi. Ada beberapa ragam istilah nama dalam irama pukulan Hadroh yaitu: (a).Pukulan Irama Juz dan atau Rojaz : Juz diambil dari bahasa Arab Juz’un yang artinya adalah Tubuh, dzat, dikandung maksud arti dari pukulan irama Juz dalam Hadroh adalah simbul dari Dzikir kepada Dzat yang Maha Esa (Alloh SWT) atau mengingat diri pribadi Rosululloh Muhammad SAW yang sempurna secara Kholqon wa Khuluqon, hal ini sesuai dengan notasi irama pukulan Juz yang berbunyi (tak dik -tak), dan irama tersebut sangat selaras dengan Notasi lafadz HU AL- LLOH atau lafadz MU HAM – MAD. Sedangkan kata Rojaz adalah kata yang diambil dari nama aturan pembuatan syair dalam bahasa arab (Ilmu bahar) bahwa syair dalam Hadroh banyak menggunakan bahar Rojaz. (b). Pukulan Irama Yahum/Robby : Yahum diambil dari lafadz Ya Yuwa kalangan sufi membunyikannya dengan Ya Hu atau Ya Hum yang memiliki arti harfiyah “Wahai Dialah (Tuhan Ku,/ Nabiku)” dikandung maksud, Irama pukulan yahum dalam Hadroh adalah simbul dari Dzikir dua kalimah tauhid yaitu kalimah LAILAHA ILLALLOH dan kalimah MUHAMMADUR ROSULULLOH, memang apabila disimak dengan benar maka notasi irama pukulan Yahum akan serasi dengan notasi kalimah LA-ILAHA-ILLALLOH-ROSULULLOH. Dalam irama yahum ada tiga notasi irama yang dipadukan yaitu Krotokan(wedokan), Penyela(selat-an), pengonteng(lanangan)' },
    { name: 'Roddat', id: 2, asset: 'https://cdn-icons-png.flaticon.com/512/4341/4341160.png', desc: 'Roddat diambil dari bahasa arab kata kerja Rodda – yaruddu – roddan adalah orang yang membalas secara bersama sama atas lantunan Syair Solawat yang dilantunkan oleh Guru Hadi.', text: 'Roddat diambil dari bahasa arab kata kerja Rodda – yaruddu – roddan bermakna mengembalikan, membalas, menolak. Artinya bahwa orang yang melaksanakan roddat dalam hadroh adalah orang yang membalas secara bersama sama atas lantunan Syair Solawat yang dilantunkan oleh Guru Hadi. Roddat menurut istilah dalam Hadroh adalah Orang yang membalas secara bersama sama atas lantunan Syair Solawat yang dilantunkan oleh Guru hadi sambil lalu melakukan gerakan tarian khusus (Roqs) sesekali melakukan keplok tangan (Tashfiq), dan bersuara sulukh dalam istilah kaum Sufi atau (Sambat dalam bahasa jawa) atau (Nida’ dalam bahasa Arab). Tatacara semacam ini lazim dilakuan dikalangan sufi seperti Tarian Sima dalam Thoriqoh Maulawiyah Oleh Syeh Jalaluddin Rumy di Turki, Tarian Samman dalam Thoriqoh Sammaniyah oleh Syeh Al Qutb Muhammad Bin Abdul Karim As Sammani dll. Dikandung maksud yang pertama, bahwa “seluruh makhluq yang ada diantara langit dan bumi bertasbih mengagungkan dan menyucikan Alloh SWT “ dan semua makhluq tersebut bergerak, sehingga tarian roddat dimaksudkan melatih seluruh tubuh manusia untuk bergerak bertasbih dan berdzikir kepada Alloh SWT. Kedua bahwa para Malaikat di Sidrotul muntaha bertawaf berputar mengelilingi Arsy karna bahagia dan gembira atas kelahiran Nabi Muhammad SAW. sehingga tarian roddat dimaksudkan melahirkan rasa gembira atas kelahiran dan kehadiran Nabi Muhammad karna hal itu merupakan Anugrah terbesar yang dikaruniakan Alloh SWT kepada Ummat Manusia. Dalam Gerakan Roddat ada Dua Macam yaitu : Roddad hanya dengan badan dengan mengikutsertakan anggukan kepala yang diserasikan dengan Notasi irama rebana. Roddad badan dengan Tarian tangan seakan-akan menulis lafadz Muhammad' },
    { name: 'Pukulan Tangan & Sulukh', id: 3, asset: 'https://cdn-icons-png.flaticon.com/512/4341/4341025.png', desc: 'Gerakan / aktifitas yang dilakukan oleh para pe-Roddat.', text: 'KEPLOK TANGAN (Tashfiq). Dimaksudkan melahirkan rasa bahagia atas kehadliran Rosululloh SAW yang diyakini beliau hadir pada saat sejarah maulidNya dibacakan. Sementara SUARA KECIL (sulukh dalam istilah kaum Sufi) atau (Sambat dalam bahasa jawa) atau (Nida’ dalam bahasa Arab) dimaksud kan untuk bermunajat dan mengadu kepada Alloh SWT dan memohon Syafaat dari Rosululloh SAW' },
]

const isOpen = ref(false)
const dialogMessage = ref()
function openDialog(value) {
    isOpen.value = true
    dialogMessage.value = informations[value]
}
function setIsOpen(value) {
    isOpen.value = value
}

onMounted(() => {
    informations.value
})

</script>
