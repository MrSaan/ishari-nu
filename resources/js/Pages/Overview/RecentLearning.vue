<template>
    <section>
        <div class="mt-6 p-3 bg-white rounded-lg">
            <div class="flex justify-between">
                <h3 class="text-base font-semibold">Recent Learning</h3>
                <div class="inline-flex">
                    <!-- left -->
                    <div class="p-1 rounded-lg hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>

                    <!-- right -->
                    <div class="p-1 rounded-lg hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>


                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-x-2 pt-2">
                <div v-for="product in products" :key="product.id" class="group relative">
                    <div class="w-full h-32 overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75">
                        <img :src="product.imageSrc" :alt="product.imageAlt"
                            class="h-full w-full object-cover object-center" />
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a :href="product.href">
                                    <span aria-hidden="true" class="absolute inset-0" />
                                    {{ product.title }}
                                </a>
                            </h3>
                            <p class="mt-1 text-xs text-gray-500">{{ product.name }}</p>
                            <div class="mt-2 inline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                                </svg>
                                <h6 class="text-[10px] font-bold">123</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>

const products = [
    {
        id: 1,
        title: 'Salah lesson',
        name: 'Abu Bakar',
        href: '#',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg',
        imageAlt: "Front of men's Basic Tee in black.",
        like: '123',
        comment: '123',
    },
    {
        id: 2,
        title: 'Salah lesson',
        name: 'Abu Bakar',
        href: '#',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg',
        imageAlt: "Front of men's Basic Tee in black.",
        like: '123',
        comment: '123',
    },
    {
        id: 3,
        title: 'Salah lesson',
        name: 'Abu Bakar',
        href: '#',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg',
        imageAlt: "Front of men's Basic Tee in black.",
        like: '123',
        comment: '123',
    },
    // More products...
]
</script>