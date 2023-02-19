<template>
    <Header />

    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                <p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you
                    share.</p>
            </div>
        </div>
        <div class="mt-5 md:col-span-2 md:mt-0">
            <form @submit.prevent="submit">
                <div class="sm:overflow-hidden sm:rounded-md">
                    <div class="bg-white space-y-6 px-4 py-6 sm:p-6">

                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3 sm:col-span-2">
                                <label for="Name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="Name" id="Name" autocomplete="given-name" v-model="form.name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <div v-if="form.errors.name" v-text="form.errors.name" class="text-sm text-red-600">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3 sm:col-span-2">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" autocomplete="@email.com" disabled
                                    v-model="form.email"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <div v-if="form.errors.email" v-text="form.errors.email" class="text-sm text-red-600">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Photo</label>
                            <div class="mt-1 flex items-center">
                                <div v-if="form.avatar == null">
                                    <span
                                        class="flex justify-center items-center h-16 w-16 overflow-hidden rounded-full bg-gray-100">
                                        <span class="font-bold text-lg text-gray-600">{{ identity }}</span>
                                    </span>
                                </div>
                                <div v-else class="inline-block h-14 w-14 overflow-hidden rounded-full">
                                    <img :src="`storage/${form.avatar}`" alt="avatar">
                                </div>
                                <input type="file" @input="form.avatar = $event.target.files[0]" name="avatar"
                                    id="avatar" autocomplete="family-name"
                                    class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <div v-if="form.errors.avatar" v-text="form.errors.avatar" class="text-sm text-red-600">
                                </div>
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
</template>

<script setup>
import Header from '@/Components/HeaderSearchless.vue';
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

let props = defineProps({
    profile: Object,
})

let identity = ref(props.profile.data.name.split(' ').map(name => name[0]).join('').toUpperCase())

let form = useForm({
    id: props.profile.id,
    name: props.profile.data.name,
    email: props.profile.data.email,
    avatar: props.profile.data.avatar,
})

let submit = () => {
    Inertia.post(`/profile/${props.profile.data.id}`, {
        _method: 'put',
        id: form.id,
        name: form.name,
        email: form.email,
        avatar: form.avatar,
    })
}

</script>