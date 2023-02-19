<template>
    <Header />
    <Menu class="mt-3" />

    <section>
        <div class="mt-10 sm:mt-0">
            <div class="lg:grid lg:grid-cols-3 lg:gap-6">
                <div class="lg:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Add Pimpinan Shalawat</h3>
                        <p class="mt-1 text-sm text-gray-600">Untuk Menambahkan Pimpinan Ishari.</p>
                    </div>
                </div>
                <div class="mt-5 lg:col-span-2">
                    <form @submit.prevent="submit" enctype="multipart/form-data">
                        <div class="overflow-hidden shadow sm:rounded-md">
                            <div class="bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-8 gap-6">
                                    <div class="col-span-8 sm:col-span-4">
                                        <label for="nama_pimpinan" class="block text-sm font-medium text-gray-700">
                                            Nama Pimpinan
                                        </label>
                                        <input type="text" v-model="form.nama_pimpinan" name="nama_pimpinan"
                                            id="nama_pimpinan" autocomplete="given-name"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                        <div v-if="form.errors.nama_pimpinan" v-text="form.errors.nama_pimpinan"
                                            class="text-sm text-red-600"></div>
                                    </div>

                                    <div class="col-span-8 sm:col-span-4">
                                        <label for="asal" class="block text-sm font-medium text-gray-700">
                                            Asal
                                        </label>
                                        <input type="text" v-model="form.asal" name="asal" id="asal"
                                            autocomplete="family-name"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                        <div v-if="form.errors.asal" v-text="form.errors.asal"
                                            class="text-sm text-red-600"></div>
                                    </div>

                                    <div class="col-span-8 sm:col-span-4">
                                        <label for="avatar" class="block text-sm font-medium text-gray-700">
                                            avatar
                                        </label>
                                        <input type="file" @input="form.avatar = $event.target.files[0]" name="avatar"
                                            id="avatar" autocomplete="family-name"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                        <div v-if="form.errors.avatar" v-text="form.errors.avatar"
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

<script setup>
import Menu from '@/Pages/Admin/Menu.vue';
import Header from '@/Components/HeaderSearchless.vue';
import { useForm } from '@inertiajs/inertia-vue3';

let form = useForm({
    nama_pimpinan: '',
    asal: '',
    avatar: '',
})

let submit = () => {
    form.post('/admin/create/pimpinan', {
        onSuccess: () => {
            alert('success');
            form.reset();
        },
    })
}

</script>