<template>
    <Header />
    <Menu class="mt-3" />

    <section>
        <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
            <form @submit.prevent="submit">
                <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                    <div class="pb-8 pr-6 w-full lg:w-1/2">
                        <label for="id" class="block text-sm font-medium text-gray-700">
                            id Pimpinan
                        </label>
                        <input type="text" v-model="form.id" name="id" id="id" autocomplete="family-name"
                            class="mt-1 block w-auto rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                        <div v-if="form.errors.id" v-text="form.errors.id" class="text-sm text-red-600"></div>
                    </div>

                    <div class="pb-8 pr-6 w-full lg:w-1/2">
                        <label for="nama_pimpinan" class="block text-sm font-medium text-gray-700">
                            nama Pimpinan
                        </label>
                        <input type="text" v-model="form.nama_pimpinan" name="nama_pimpinan" id="nama_pimpinan"
                            autocomplete="family-name"
                            class="mt-1 block w-auto rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                        <div v-if="form.errors.nama_pimpinan" v-text="form.errors.nama_pimpinan"
                            class="text-sm text-red-600"></div>
                    </div>

                    <div class="pb-8 pr-6 w-full lg:w-1/2">
                        <label for="asal" class="block text-sm font-medium text-gray-700">
                            asal Pimpinan
                        </label>
                        <input type="text" v-model="form.asal" name="asal" id="asal" autocomplete="family-name"
                            class="mt-1 block w-auto rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                        <div v-if="form.errors.asal" v-text="form.errors.asal" class="text-sm text-red-600"></div>
                    </div>

                    <div class="pb-8 pr-6 w-full lg:w-1/2">
                        <label for="avatar" class="block text-sm font-medium text-gray-700">
                            Avatar Pimpinan
                        </label>
                        <img :src="props.pimpinan.avatar" class="w-20 h-20">

                        <input type="file" @input="form.avatar = $event.target.files[0]" name="avatar" id="avatar"
                            autocomplete="family-name"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                        <div v-if="form.errors.avatar" v-text="form.errors.avatar" class="text-sm text-red-600"></div>
                    </div>
                </div>
                <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
                    <!-- <button v-if="!organization.deleted_at" class="text-red-600 hover:underline" tabindex="-1"
                        type="button" @click="destroy">Delete Organization</button> -->
                    <button class="btn-indigo ml-auto" type="submit">Update
                        Pimpinan</button>
                </div>
            </form>
        </div>
    </section>
</template>

<script setup>
import Menu from '@/Pages/Admin/Menu.vue';
import Header from '@/Components/HeaderSearchless.vue';
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3';

let props = defineProps({
    pimpinan: Object,
})

let form = useForm({
    id: props.pimpinan.id,
    nama_pimpinan: props.pimpinan.nama_pimpinan,
    asal: props.pimpinan.asal,
    avatar: '',
})

let submit = () => {
    Inertia.post(`/admin/daftarPimpinan/${props.pimpinan.id}`, {
        _method: 'put',
        avatar: form.avatar,
        nama: form.nama_pimpinan,
        asal: form.asal
    })
}

</script>
