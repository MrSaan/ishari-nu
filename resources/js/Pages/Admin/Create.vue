<template>
    <Header />
    <Menu class="mt-3" />

    <section>
        <div class="mt-10 sm:mt-0">
            <div class="lg:grid lg:grid-cols-3 lg:gap-6">
                <div class="lg:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Add Bait Shalawat</h3>
                        <p class="mt-1 text-sm text-gray-600">Untuk Menambahkan bait Shalawat.</p>
                    </div>
                </div>
                <div class="mt-5 lg:col-span-2">
                    <form @submit.prevent="submit">
                        <div class="overflow-hidden shadow sm:rounded-md">
                            <div class="bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-8 gap-6">
                                    <div class="col-span-8 sm:col-span-2">
                                        <label for="Muhud" class="block text-sm font-medium text-gray-700">
                                            Muhud
                                        </label>
                                        <input type="text" v-model="form.muhud_id" name="Muhud" id="Muhud"
                                            autocomplete="given-name"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                        <div v-if="form.errors.muhud_id" v-text="form.errors.muhud_id"
                                            class="text-sm text-red-600"></div>
                                    </div>

                                    <div class="col-span-8 sm:col-span-2">
                                        <label for="Audio id" class="block text-sm font-medium text-gray-700">
                                            Audio id
                                        </label>
                                        <input type="text" v-model="form.audio_id" name="Audio id" id="Audio id"
                                            autocomplete="family-name"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                        <div v-if="form.errors.audio_id" v-text="form.errors.audio_id"
                                            class="text-sm text-red-600"></div>
                                    </div>

                                    <div class="col-span-8 sm:col-span-2">
                                        <label for="number_muhud" class="block text-sm font-medium text-gray-700">
                                            Number Muhud
                                        </label>
                                        <input type="text" v-model="form.numberOfMuhud" name="number_muhud"
                                            id="number_muhud" autocomplete="family-name"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                        <div v-if="form.errors.numberOfMuhud" v-text="form.errors.numberOfMuhud"
                                            class="text-sm text-red-600"></div>
                                    </div>

                                    <div class="col-span-8 sm:col-span-2">
                                        <label for="number_diwan" class="block text-sm font-medium text-gray-700">
                                            Number Diwan
                                        </label>
                                        <input type="text" v-model="form.numberOfDiwan" name="number_diwan"
                                            id="number_diwan" autocomplete="family-name"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                        <div v-if="form.errors.numberOfDiwan" v-text="form.errors.numberOfDiwan"
                                            class="text-sm text-red-600"></div>
                                    </div>

                                    <div class="col-span-8 sm:col-span-2">
                                        <label for="number_maulid" class="block text-sm font-medium text-gray-700">
                                            Number Maulid
                                        </label>
                                        <input type="text" v-model="form.numberOfMaulidSyarafulAnam"
                                            name="number_maulid" id="number_maulid" autocomplete="family-name"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                        <div v-if="form.errors.numberOfMaulidSyarafulAnam"
                                            v-text="form.errors.numberOfMaulidSyarafulAnam"
                                            class="text-sm text-red-600"></div>
                                    </div>

                                    <div class="col-span-8">
                                        <label for="text_shalawat" class="block text-sm font-medium text-gray-700">
                                            text shalawat
                                        </label>
                                        <input type="text" v-model="form.text_shalawat" name="text_shalawat"
                                            id="text_shalawat" autocomplete="text_shalawat"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                        <div v-if="form.errors.text_shalawat" v-text="form.errors.text_shalawat"
                                            class="text-sm text-red-600"></div>
                                    </div>

                                    <div class="col-span-8">
                                        <label for="transliteration" class="block text-sm font-medium text-gray-700">
                                            Transliteration
                                        </label>
                                        <input type="text" v-model="form.transliteration" name="transliteration"
                                            id="transliteration" autocomplete="transliteration"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                        <div v-if="form.errors.transliteration" v-text="form.errors.transliteration"
                                            class="text-sm text-red-600"></div>
                                    </div>

                                    <div class="col-span-8">
                                        <label for="translation_id" class="block text-sm font-medium text-gray-700">
                                            Terjemahan id
                                        </label>
                                        <input type="text" v-model="form.translation_id" name="translation_id"
                                            id="translation_id" autocomplete="translation_id"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                        <div v-if="form.errors.translation_id" v-text="form.errors.translation_id"
                                            class="text-sm text-red-600"></div>
                                    </div>

                                    <div class="col-span-8">
                                        <label for="translation_en" class="block text-sm font-medium text-gray-700">
                                            Terjemahan en
                                        </label>
                                        <input type="text" v-model="form.translation_en" name="translation_en"
                                            id="translation_en" autocomplete="translation_en"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                        <div v-if="form.errors.translation_en" v-text="form.errors.translation_en"
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
    muhud_id: '',
    audio_id: '',
    numberOfMuhud: '',
    numberOfDiwan: '',
    numberOfMaulidSyarafulAnam: '',
    text_shalawat: '',
    transliteration: '',
    translation_id: '',
    translation_en: null,
})

let submit = () => {
    form.post('/admin/create/shalawat', {
        onSuccess: () => {
            alert('success');
            // form.reset();
        },
    })
}

</script>