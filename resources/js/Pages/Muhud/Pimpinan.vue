<template>
    <Listbox as="div">
        <div class="relative mt-1">
            <ListboxButton
                class="relative md:w-60 lg:w-max text-sm w-24 cursor-default rounded-full bg-white py-2 pl-3 pr-10 text-left focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                <div v-if="!props.filters.pimpinan">
                    <span class="flex items-center">
                        <span class="ml-3 block truncate">
                            pilih audio
                        </span>
                    </span>
                </div>
                <div v-else>
                    <template v-for="choicePerson in pimpinan" :key="choicePerson.pimpinan_id">
                        <span v-if="choicePerson.pimpinan_id == props.filters.pimpinan" class="flex items-center">
                            <span
                                class="flex justify-center items-center h-6 w-6 overflow-hidden rounded-full bg-gray-300">
                                <span class="font-thin text-xs text-gray-600">
                                    {{ choicePerson.nama_pimpinan.charAt() }}
                                </span>
                            </span>
                            <span class="ml-3 md:block truncate hidden">
                                {{ choicePerson.nama_pimpinan }}
                            </span>
                        </span>
                    </template>
                </div>
                <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                    <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                </span>
            </ListboxButton>

            <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100"
                leave-to-class="opacity-0">
                <ListboxOptions
                    class="absolute z-10 right-0 mt-1 max-h-56 overflow-auto w-64 md:w-max rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                    <ListboxOption as="template" v-for="person in pimpinan" :key="person.id" :value="person"
                        v-slot="{ active, selected }">
                        <Link :href="`/${category}?category=${props?.filters?.category}&pimpinan=${person.pimpinan_id}`"
                            method="get">
                        <li
                            :class="[active ? 'text-white bg-indigo-600' : 'text-gray-900', 'relative text-xs md:text-sm md:w-auto cursor-default select-none py-2 pl-3 pr-9']">
                            <div class="flex items-center">
                                <span
                                    class="flex justify-center items-center h-6 w-6 overflow-hidden rounded-full bg-gray-300">
                                    <span class="font-thin text-xs text-gray-600">
                                        {{ person.nama_pimpinan.charAt(0) }}
                                    </span>
                                </span>
                                <span :class="[selected ? 'font-semibold' : 'font-normal', 'ml-3 block truncate']">
                                    {{ person.nama_pimpinan }}
                                </span>
                            </div>

                            <span v-if="selected"
                                :class="[active ? 'text-white' : 'text-indigo-600', 'absolute inset-y-0 right-0 flex items-center pr-4']">
                                <CheckIcon class="h-5 w-5" aria-hidden="true" />
                            </span>
                        </li>
                        </Link>
                    </ListboxOption>
                </ListboxOptions>
            </transition>
        </div>
    </Listbox>
</template>

<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { ref } from 'vue'
import { Link } from '@inertiajs/inertia-vue3';
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue'
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'

let props = defineProps({
    pimpinan: Array,
    filters: Object,
    category: String,
})

let right = ref('right')

</script>