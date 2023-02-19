<template>
    <section>
        <div class="flex flex-col mx-6 md:ml-6 lg:ml-0">
            <!-- memorization -->
            <div class="bg-white rounded-lg p-3">
                <h1 class="text-lg font-semibold">Memorization</h1>
                <div class="flex flex-col mt-2 space-y-2">

                    <div class="bg-teal-600 px-4 py-2 rounded-xl">
                        <div class="flex justify-between items-center text-white pb-2">
                            <span class="text-sm px-2 rounded-full bg-gray-100 bg-opacity-40">1</span>
                            <span>:</span>
                        </div>
                        <span class="text-xl text-white font-semibold">Ibtida'</span>
                        <div class="mt-1 text-white text-xs">Remaining days: 10/12</div>
                        <div class="mt-1 flex justify-between text-white">
                            <div class="text-white text-xs">Remaining days: 10/12</div>
                            <div class="text-white text-xs">50%</div>
                        </div>
                        <input type="range" min="0" max="100" value="50"
                            class="w-full h-1 bg-white bg-opacity-40 rounded-full appearance-none overflow-hidden">
                    </div>


                    <div class="bg-orange-400 px-4 py-2 rounded-xl">
                        <div class="flex justify-between items-center text-white pb-2">
                            <span class="text-sm px-2 rounded-full bg-gray-100 bg-opacity-40">1</span>
                            <span>:</span>
                        </div>
                        <span class="text-xl text-white font-semibold">Ibtida'</span>
                        <div class="mt-1 text-white text-xs">Remaining days: 10/12</div>
                        <div class="mt-1 flex justify-between text-white">
                            <div class="text-white text-xs">Remaining days: 10/12</div>
                            <div class="text-white text-xs">50%</div>
                        </div>
                        <input type="range" min="0" max="100" value="50"
                            class="w-full h-1 bg-white bg-opacity-40 rounded-full appearance-none overflow-hidden">
                    </div>


                    <div class="bg-slate-400 px-4 py-2 rounded-xl">
                        <div class="flex justify-between items-center text-white pb-2">
                            <span class="text-sm px-2 rounded-full bg-gray-100 bg-opacity-40">1</span>
                            <span>:</span>
                        </div>
                        <span class="text-xl text-white font-semibold">Ibtida'</span>
                        <div class="mt-1 text-white text-xs">Remaining days: 10/12</div>
                        <div class="mt-1 flex justify-between text-white">
                            <div class="text-white text-xs">Remaining days: 10/12</div>
                            <div class="text-white text-xs">50%</div>
                        </div>
                        <input type="range" min="0" max="100" value="50"
                            class="w-full h-1 bg-white bg-opacity-40 rounded-full appearance-none overflow-hidden">
                    </div>
                </div>

            </div>

        </div>
    </section>
</template>

<style>
@media screen and (-webkit-min-device-pixel-ratio: 0) {

    input[type="range"]::-webkit-slider-thumb {
        width: 15px;
        -webkit-appearance: none;
        appearance: none;
        cursor: ew-resize;
        box-shadow: -405px 0 0 400px #FFFFFF;
        border-radius: 50%;

    }
}
</style>
