<template>
    <Listbox as="div">
        <div class="relative mt-1">
            <ListboxButton
                class="relative flex items-center md:w-60 lg:w-max text-sm w-24 cursor-default rounded-full bg-white py-2 pl-3 pr-10 text-left focus:border-green-500 focus:outline-none focus:ring-1 focus:ring-green-500">
                <div v-if="selectedPerson" class="flex items-center">
                    <span class="flex justify-center items-center h-6 w-6 overflow-hidden rounded-full bg-gray-300">
                        <span class="font-thin text-xs text-gray-600">
                            {{ selectedPerson.nama_pimpinan.charAt() }}
                        </span>
                    </span>
                    <span class="ml-3 md:block truncate hidden">
                        {{ selectedPerson.nama_pimpinan }}
                    </span>
                    <span class="pointer-events-none     absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                        <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                    </span>
                </div>
                <div v-else class="flex items-center">
                    <span class="flex justify-center items-center h-6 w-6 overflow-hidden rounded-full bg-gray-300">
                        <span class="font-thin text-xs text-gray-600">
                            A
                        </span>
                    </span>
                    <span class="ml-3 md:block truncate hidden">
                        audio
                    </span>
                    <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                        <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                    </span>
                </div>
            </ListboxButton>

            <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100"
                leave-to-class="opacity-0">
                <ListboxOptions
                    class="absolute z-10 right-0 mt-1 max-h-56 overflow-auto w-64 md:w-max rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                    <ListboxOption as="template" v-for="person in pimpinan" :key="person.id" :value="person"
                        v-slot="{ active, selected }">
                        <Link :href="`?pimpinan=${person.pimpinan_id}`" method="get">
                        <li
                            :class="[active ? 'text-white bg-green-600' : 'text-gray-900', 'relative text-xs md:text-sm md:w-auto cursor-default select-none py-2 pl-3 pr-9']">
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
                                :class="[active ? 'text-white' : 'text-green-600', 'absolute inset-y-0 right-0 flex items-center pr-4']">
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
import { ref, computed } from 'vue'
import { Link } from '@inertiajs/inertia-vue3';
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue'
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'

let props = defineProps({
    pimpinan: Array,
    filter: Object,
})

let right = ref('right')
const selectedPerson = computed(() => {
    return props.pimpinan.find((item) => item.pimpinan_id === parseInt(props.filter.pimpinan));
})
// const selectedPerson = ref(props.pimpinan[0])

</script>
