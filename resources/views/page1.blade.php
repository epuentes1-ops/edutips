<x-layouts.app :title="__('Mi ruta como docente-tutor ¿qué sigue en el camino?')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
        <div class="p-6">

            <div x-data="{
                activeSlide: 0,
                slides: [
                    '/images/banners/banner2.png'

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
        <!-- Sección Pregrado -->
        <h3 class="text-lg font-semibold">Estado académico estudiantes Pregrado</h3>
        <div class="w-full aspect-video mb-6">
            <iframe 
                title="Dashborad_Calificación_PLD"
                src="https://app.powerbi.com/view?r=eyJrIjoiMjY3ZThiZTgtYjViNy00ZTYxLWI2YmMtNmY1ZjMwMGFhZTVmIiwidCI6IjRiZjM4ZWEyLTgzMmQtNDU1Mi1iNTA4LTQyMTU3MGRhNDNmZiIsImMiOjR9"
                class="w-full h-full rounded-lg shadow"
                frameborder="0" 
                allowfullscreen>
            </iframe>
        </div>

        <!-- Sección Posgrado -->
        <h3 class="text-lg font-semibold">Estado académico estudiantes Posgrado</h3>
        <div class="w-full aspect-video mb-6">
            <iframe 
                title="Dashborad_Calificación_PLD - Posgrado"
                src="https://app.powerbi.com/view?r=eyJrIjoiNTY0M2NiMzQtNzcxYS00OTQyLWE1YjctZDM0MjA4NmM4Nzc0IiwidCI6IjRiZjM4ZWEyLTgzMmQtNDU1Mi1iNTA4LTQyMTU3MGRhNDNmZiIsImMiOjR9"
                class="w-full h-full rounded-lg shadow"
                frameborder="0" 
                allowfullscreen>
            </iframe>
        </div>

    </div>

    
</x-layouts.app>

