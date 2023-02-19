<template>
    <div class="flex flex-row flex-wrap justify-start gap-2 mb-6 cursor-pointer">
        <Link href="/admin/create" method="get" class="px-2 py-1 rounded-full text-sm bg-rose-600 text-white">
        Add Shalawat
        </Link>

        <Link href="/admin/pimpinan" method="get" class="px-2 py-1 rounded-full text-sm bg-indigo-600 text-white">
        Add Pimpinan
        </Link>

        <Link href="/admin/audio" method="get" class="px-2 py-1 rounded-full text-sm bg-teal-600 text-white">
        Add Audio
        </Link>

        <Link href="/admin/song" method="get" class="px-2 py-1 rounded-full text-sm bg-amber-600 text-white">
        Add Song of Muhud
        </Link>

        <Link href="/admin/daftarPimpinan" method="get" class="px-2 py-1 rounded-full text-sm bg-orange-600 text-white">
        Edit Pimpinan
        </Link>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>