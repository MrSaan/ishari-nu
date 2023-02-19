<template>
    <Header />
    <Menu class="mt-3" />

    <section>
        <div class="bg-white rounded-md shadow overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead>
                    <tr class="text-left font-bold">
                        <th class="pb-4 pt-6 px-6">Id</th>
                        <th class="pb-4 pt-6 px-6">Nama</th>
                        <th class="pb-4 pt-6 px-6" colspan="2">Asal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-100 focus-within:bg-gray-100" v-for="person in pimpinan" :key="person.id">
                        <td class="border-t">
                            <Link class="flex items-center px-6 py-4 focus:text-indigo-500"
                                :href="`/admin/daftarPimpinan/${person.id}/edit`">
                            {{ person.id }}
                            <!-- <icon v-if="organization.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" /> -->
                            </Link>
                        </td>
                        <td class="border-t">
                            <Link class="flex items-center px-6 py-4" tabindex="-1"
                                :href="`/admin/daftarPimpinan/${person.id}/edit`">
                            {{ person.nama_pimpinan }}
                            </Link>
                        </td>
                        <td class="border-t">
                            <Link class="flex items-center px-6 py-4" tabindex="-1"
                                :href="`/admin/daftarPimpinan/${person.id}/edit`">
                            {{ person.asal }}
                            </Link>
                        </td>
                        <td class="w-px border-t">
                            <Link class="flex items-center px-4" tabindex="-1"
                                :href="`/admin/daftarPimpinan/${person.id}/edit`">
                            <ChevronRightIcon class="block fill-gray-400 h-6 w-6" />
                            </Link>
                        </td>
                    </tr>
                    <!-- <tr v-if="organizations.data.length === 0">
                        <td class="px-6 py-4 border-t" colspan="4">No organizations found.</td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </section>
</template>

<script setup>
import Menu from '@/Pages/Admin/Menu.vue';
import Header from '@/Components/HeaderSearchless.vue';
import { ChevronRightIcon } from '@heroicons/vue/24/outline';
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    pimpinan: Object,
})
</script>