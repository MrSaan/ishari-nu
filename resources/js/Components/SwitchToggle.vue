<template>
    <div class="py-2 flex items-center gap-2 text-xs">
        <span>N</span>
        <Switch v-model="enabled" @click="enable(enabled)" :class="enabled ? 'bg-teal-900' : 'bg-teal-600'"
            class="relative inline-flex h-5 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75">
            <span class="sr-only">Use setting</span>
            <span aria-hidden="true" :class="enabled ? 'translate-x-6' : 'translate-x-0'"
                class="pointer-events-none inline-block h-4 w-4 transform rounded-full bg-white shadow-lg ring-0 transition duration-200 ease-in-out" />
        </Switch>
        <span>Y</span>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { Switch } from '@headlessui/vue'

const emit = defineEmits(["enabled"])
const props = defineProps(["button"])
const enabled = ref(props.button)

function enable(value) {
    enabled.value = !value
    emit('enabled', enabled.value)
}
</script>
