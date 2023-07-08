<template>
    <div class="flex flex-row space-x-2">
        <div class="p-2 bg-white rounded-full h-min">
            <ArrowLeftIcon class="h-4 w-4" />
        </div>
        <div class="flex flex-col">
            <Dropdown v-model="choiceFasal">
                <template #trigger>
                    <div class="inline-flex items-center space-x-2 dark:text-white">
                        <h6 class="text-sm lg:text-xl font-semibold">{{ choiceFasal.transliteration_id }}
                        </h6>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-3 h-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                    </div>
                    <h5 class="text-xs lg:text-sm text-gray-400">{{ choiceFasal.translation_id }}</h5>
                </template>
                <template #content>
                    <DropdownLink :href="`/${props.category}/${muhud.id}`" method="get"
                        v-for="muhud in kumpulanMuhud" :key="muhud.id"
                        class="block w-full px-4 py-2 text-sm text-left leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out dark:bg-gray-900 dark:hover:bg-green-800 dark:text-gray-200">
                        {{ muhud.transliteration_id }}
                    </DropdownLink>
                </template>
            </Dropdown>
        </div>
    </div>
</template>

<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { ArrowLeftIcon } from '@heroicons/vue/24/outline';
import { ref } from 'vue';

let props = defineProps({
    filters: String,
    kumpulanMuhud: Array,
    category: String,
})

let pasal = ref(props.filters)
let choiceFasal = ref(props.kumpulanMuhud[pasal.value - 1])
</script>
