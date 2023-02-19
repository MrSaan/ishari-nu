<script setup>
import Header from '@/Components/HeaderSearchless.vue';
import Menu from '@/Pages/Admin/Menu.vue';
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue';
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid';
import { useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

let props = defineProps({
    muhud: Object,
    pimpinan: Object
});

let selectedMuhud = ref(props.muhud[0]);
let selectedPimpinan = ref(props.pimpinan[0]);

let form = useForm({
    muhud: selectedMuhud,
    pimpinan: selectedPimpinan,
    judul: '',
    deskripsi: '',
    song: '',
});

let submit = () => {
    form.post('/admin/song', {
        onSuccess: () => {
            alert("success adding song!")
            form.reset();
        },
    });
}

</script>

<template>
    <Header />
    <Menu class="mt-3" />

    <section>
        <div class="mt-10 sm:mt-0 z-10">
            <div class="lg:grid lg:grid-cols-3 lg:gap-6">
                <div class="lg:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Add Audio Shalawat</h3>
                        <p class="mt-1 text-sm text-gray-600">Untuk Menambahkan Audio Shalawat Ishari.</p>
                    </div>
                </div>
                <div class="mt-5 lg:col-span-2">
                    <form @submit.prevent="submit">
                        <div class="shadow sm:rounded-md">
                            <div class="bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <!-- part of muhud list -->
                                        <Listbox as="div" v-model="form.muhud" class="z-50">
                                            <ListboxLabel class="block text-sm font-medium text-gray-700">Muhud
                                            </ListboxLabel>
                                            <div class="relative mt-1">
                                                <ListboxButton
                                                    class="relative w-full cursor-default rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 text-left shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm">
                                                    <span class="flex items-center">
                                                        <span class="ml-3 block truncate">
                                                            {{ form.muhud.transliteration_id }}
                                                        </span>
                                                    </span>
                                                    <span
                                                        class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                                                        <ChevronUpDownIcon class="h-5 w-5 text-gray-400"
                                                            aria-hidden="true" />
                                                    </span>
                                                </ListboxButton>

                                                <transition leave-active-class="transition ease-in duration-100"
                                                    leave-from-class="opacity-100" leave-to-class="opacity-0">
                                                    <ListboxOptions
                                                        class="absolute z-50 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                                                        <ListboxOption as="template" v-for="pasal in muhud"
                                                            :key="pasal.id" :value="pasal"
                                                            v-slot="{ active, selected }">
                                                            <li
                                                                :class="[active ? 'text-white bg-indigo-600' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-3 pr-9']">
                                                                <div class="flex items-center">
                                                                    <span
                                                                        :class="[selected ? 'font-semibold' : 'font-normal', 'ml-3 block truncate']">
                                                                        {{ pasal.transliteration_id }}
                                                                    </span>
                                                                </div>

                                                                <span v-if="selected"
                                                                    :class="[active ? 'text-white' : 'text-indigo-600', 'absolute inset-y-0 right-0 flex items-center pr-4']">
                                                                    <CheckIcon class="h-5 w-5" aria-hidden="true" />
                                                                </span>
                                                            </li>
                                                        </ListboxOption>
                                                    </ListboxOptions>
                                                </transition>
                                            </div>
                                        </Listbox>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <!-- part of pimpinan -->
                                        <Listbox as="div" v-model="form.pimpinan">
                                            <ListboxLabel class="block text-sm font-medium text-gray-700">Pimpinan
                                            </ListboxLabel>
                                            <div class="relative mt-1">
                                                <ListboxButton
                                                    class="relative w-full cursor-default rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 text-left shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm">
                                                    <span class="flex items-center">
                                                        <span class="ml-3 block truncate">
                                                            {{ form.pimpinan.nama_pimpinan }}
                                                        </span>
                                                    </span>
                                                    <span
                                                        class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                                                        <ChevronUpDownIcon class="h-5 w-5 text-gray-400"
                                                            aria-hidden="true" />
                                                    </span>
                                                </ListboxButton>

                                                <transition leave-active-class="transition ease-in duration-100"
                                                    leave-from-class="opacity-100" leave-to-class="opacity-0">
                                                    <ListboxOptions
                                                        class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                                                        <ListboxOption as="template" v-for="person in pimpinan"
                                                            :key="person.id" :value="person"
                                                            v-slot="{ active, selected }">
                                                            <li
                                                                :class="[active ? 'text-white bg-indigo-600' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-3 pr-9']">
                                                                <div class="flex items-center">
                                                                    <span
                                                                        :class="[selected ? 'font-semibold' : 'font-normal', 'ml-3 block truncate']">
                                                                        {{ person.nama_pimpinan }}</span>
                                                                </div>

                                                                <span v-if="selected"
                                                                    :class="[active ? 'text-white' : 'text-indigo-600', 'absolute inset-y-0 right-0 flex items-center pr-4']">
                                                                    <CheckIcon class="h-5 w-5" aria-hidden="true" />
                                                                </span>
                                                            </li>
                                                        </ListboxOption>
                                                    </ListboxOptions>
                                                </transition>
                                            </div>
                                        </Listbox>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="judul" class="block text-sm font-medium text-gray-700">
                                            Judul
                                        </label>
                                        <input type="text" v-model="form.judul" name="judul" id="judul"
                                            autocomplete="given-name"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                        <div v-if="form.errors.judul" v-text="form.errors.judul"
                                            class="text-sm text-red-600"></div>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="deskripsi" class="block text-sm font-medium text-gray-700">
                                            deskripsi
                                        </label>
                                        <input type="text" v-model="form.deskripsi" name="deskripsi" id="deskripsi"
                                            autocomplete="given-name"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                        <div v-if="form.errors.deskripsi" v-text="form.errors.deskripsi"
                                            class="text-sm text-red-600"></div>
                                    </div>

                                    <div class="col-span-6 sm:col-span-6">
                                        <label for="avatar" class="block text-sm font-medium text-gray-700">
                                            Audio
                                        </label>

                                        <input type="file" @input="form.song = $event.target.files[0]" name="avatar"
                                            id="avatar" autocomplete="family-name"
                                            class="mt-1 block w-full border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                        <div v-if="form.errors.song" v-text="form.errors.song"
                                            class="text-sm text-red-600"></div>
                                    </div>

                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                <button type="submit"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>