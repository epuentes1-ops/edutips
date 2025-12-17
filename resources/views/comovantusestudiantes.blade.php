<x-layouts.app :title="__('EduTips - ¿Cómo van tus estudiantes?')">

    <div class="p-6 space-y-12">


        <div 
            x-data="{
                activeSlide: 0,
                slides: [
                    '/images/banners/banner4.png',
                    '/images/banners/banner3.png',
                    '/images/banners/banner2.png'
                ]
            }" 
            x-init="setInterval(() => activeSlide = (activeSlide + 1) % slides.length, 4000)"
            class="relative w-full max-w-7xl mx-auto aspect-[16/6] sm:aspect-[16/7] md:aspect-[16/5] lg:aspect-[16/4] rounded-3xl overflow-hidden shadow-2xl ring-1 ring-gray-300/40">

            <!-- Imágenes -->
            <template x-for="(slide, index) in slides" :key="index">
                <img 
                    :src="slide" 
                    alt="Banner EduTips"
                    class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out"
                    :class="{ 'opacity-100': activeSlide === index, 'opacity-0': activeSlide !== index }"
                >
            </template>

            <!-- Indicadores -->
            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
                <template x-for="(slide, index) in slides" :key="index">
                    <button 
                        @click="activeSlide = index" 
                        class="w-3 h-3 rounded-full transition-all"
                        :class="activeSlide === index 
                            ? 'bg-white scale-125 shadow-md' 
                            : 'bg-gray-400 opacity-70 hover:opacity-100'">
                    </button>
                </template>
            </div>

            <!-- Flechas -->
            <button 
                @click="activeSlide = (activeSlide - 1 + slides.length) % slides.length"
                class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/70 hover:bg-white text-gray-800 rounded-full p-2 shadow-md transition">
                ‹
            </button>
            <button 
                @click="activeSlide = (activeSlide + 1) % slides.length"
                class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/70 hover:bg-white text-gray-800 rounded-full p-2 shadow-md transition">
                ›
            </button>
        </div>

        <!-- === TÍTULO PRINCIPAL === -->
        <div class="text-center max-w-4xl mx-auto">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-100 mb-2">
                ¿Cómo van tus estudiantes?
            </h1>
            <p class="text-gray-600 dark:text-gray-400">
                Consulta el estado académico de los estudiantes de Pregrado y Posgrado en tiempo real.
            </p>
        </div>

        <!-- === SECCIÓN PREGRADO === -->
        <section class="max-w-6xl mx-auto space-y-4">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 border-l-4 border-blue-500 pl-3">
                Estado académico - Pregrado
            </h2>

            <div class="w-full aspect-video">
                <iframe 
                    title="Dashboard Calificación PLD - Pregrado"
                    src="https://app.powerbi.com/view?r=eyJrIjoiMjY3ZThiZTgtYjViNy00ZTYxLWI2YmMtNmY1ZjMwMGFhZTVmIiwidCI6IjRiZjM4ZWEyLTgzMmQtNDU1Mi1iNTA4LTQyMTU3MGRhNDNmZiIsImMiOjR9"
                    class="w-full h-full rounded-xl shadow-lg ring-1 ring-gray-300/40"
                    frameborder="0" 
                    allowfullscreen>
                </iframe>
            </div>
        </section>

        <!-- === SECCIÓN POSGRADO === -->
        <section class="max-w-6xl mx-auto space-y-4">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 border-l-4 border-green-500 pl-3">
                Estado académico - Posgrado
            </h2>

            <div class="w-full aspect-video">
                <iframe 
                    title="Dashboard Calificación PLD - Posgrado"
                    src="https://app.powerbi.com/view?r=eyJrIjoiNTY0M2NiMzQtNzcxYS00OTQyLWE1YjctZDM0MjA4NmM4Nzc0IiwidCI6IjRiZjM4ZWEyLTgzMmQtNDU1Mi1iNTA4LTQyMTU3MGRhNDNmZiIsImMiOjR9"
                    class="w-full h-full rounded-xl shadow-lg ring-1 ring-gray-300/40"
                    frameborder="0" 
                    allowfullscreen>
                </iframe>
            </div>
        </section>

    </div>
    @include('partials.footer')
</x-layouts.app>
