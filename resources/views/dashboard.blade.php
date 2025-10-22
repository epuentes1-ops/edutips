<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="p-6">

            <div x-data="{
                activeSlide: 0,
                slides: [
                    '/images/banners/banner1.png'

                ]
            }" x-init="setInterval(() => activeSlide = (activeSlide + 1) % slides.length, 4000)"
                class="relative w-full max-w-6xl mx-auto aspect-[16/6] sm:aspect-[16/7] md:aspect-[16/5] lg:aspect-[16/4] rounded-2xl overflow-hidden shadow-xl">

                <!-- Imágenes -->
                <template x-for="(slide, index) in slides" :key="index">
                    <img :src="slide" alt="Banner"
                        class="absolute inset-0 w-full h-full object-cover object-center transition-opacity duration-700 ease-in-out"
                        :class="{ 'opacity-100': activeSlide === index, 'opacity-0': activeSlide !== index }">
                </template>

                <!-- Indicadores (puntos inferiores) -->
                <!--<div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-2">
                    <template x-for="(slide, index) in slides" :key="index">
                        <button @click="activeSlide = index" class="w-3 h-3 rounded-full transition-all"
                            :class="activeSlide === index ? 'bg-white scale-110' : 'bg-gray-400 opacity-70 hover:opacity-100'"></button>
                    </template>
                </div>-->

                <!-- Flechas -->
                <!--<button @click="activeSlide = (activeSlide - 1 + slides.length) % slides.length"
                    class="absolute left-3 top-1/2 -translate-y-1/2 bg-white/70 hover:bg-white text-gray-700 rounded-full p-2 shadow-md">
                    ‹
                </button>
                <button @click="activeSlide = (activeSlide + 1) % slides.length"
                    class="absolute right-3 top-1/2 -translate-y-1/2 bg-white/70 hover:bg-white text-gray-700 rounded-full p-2 shadow-md">
                    ›
                </button>-->

            </div>
        </div>
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>
        <div
            class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">

            <iframe title="vimeo-player" src="https://player.vimeo.com/video/879961277?h=fb2dc97155" width="100%"
                height="100%" frameborder="0" referrerpolicy="strict-origin-when-cross-origin"
                allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                allowfullscreen></iframe>
        </div>
    </div>
</x-layouts.app>
