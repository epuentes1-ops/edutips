<x-layouts.app :title="__('EduTips - Tu camino docente')">
    <div
        class="flex flex-col items-center w-full gap-10 p-6">

        <!-- Banner principal -->
        <div x-data="{
            activeSlide: 0,
            slides: ['/images/banners/banner_2.jpg']
        }" x-init="setInterval(() => activeSlide = (activeSlide + 1) % slides.length, 4000)"
            class="relative w-full max-w-6xl aspect-[16/6] sm:aspect-[16/7] md:aspect-[16/5] lg:aspect-[16/4] overflow-hidden rounded-2xl shadow-xl">
            <template x-for="(slide, index) in slides" :key="index">
                <img :src="slide" alt="Banner"
                    class="absolute inset-0 w-full h-full object-cover object-center transition-opacity duration-700 ease-in-out"
                    :class="{ 'opacity-100': activeSlide === index, 'opacity-0': activeSlide !== index }">
            </template>
        </div>

        <!-- Mensaje principal -->
        <div class="text-center max-w-4xl px-4">
            <h2
                class="text-base sm:text-lg md:text-xl lg:text-2xl font-semibold text-gray-800 dark:text-gray-100 leading-relaxed">
                Ser docente no es solo guiar, también es caminar con otros.
                Aquí descubrirás los pasos, gestos y estrategias que hacen que acompañar sea aprender juntos.
            </h2>
        </div>

        <!-- Descripción secundaria -->
        <div class="text-center max-w-4xl px-4">
            <p class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-700 dark:text-gray-200 leading-relaxed">
                En UCompensar creemos que ser docente-tutor va mucho más allá de enseñar.
                Es acompañar, escuchar y conectar para que cada estudiante encuentre su propio camino de aprendizaje.
            </p>
        </div>

        <!-- Video principal -->
        <div class="w-full max-w-5xl mt-6 rounded-xl overflow-hidden shadow-lg">
            <div class="aspect-video">
                <iframe title="vimeo-player"
                    src="https://player.vimeo.com/video/1133845938?h=86b3d3a807&badge=0&autopause=0&player_id=0&app_id=58479"
                    class="w-full h-full" frameborder="0" referrerpolicy="strict-origin-when-cross-origin"
                    allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                    allowfullscreen>
                </iframe>
            </div>
        </div>

        <!-- Texto antes de los Genially -->
        <div class="text-center max-w-4xl px-4">
            <p class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-700 dark:text-gray-200 leading-relaxed">
                Empezar este viaje es mirarte en el espejo digital de tu día a día.
                Cada respuesta te ayudará a descubrir cómo navegas, enseñas y conectas en la virtualidad.
                Prepárate para recorrer tu camino como docente-tutor y conocer qué tipo de viajero digital eres.
            </p>
        </div>

        <!-- Genially 1 -->
        <div class="w-full max-w-5xl mt-6 rounded-xl overflow-hidden shadow-lg">
            <div class="aspect-video">
                <iframe title="genially-1" src="https://view.genially.com/6900fc80214c3ad0b74c43f8"
                    class="w-full h-full" frameborder="0" referrerpolicy="strict-origin-when-cross-origin"
                    allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
        <!-- Sección Texto + Genially -->
        <div class="flex flex-col md:flex-row items-center justify-center gap-6 max-w-6xl mx-auto mt-8 px-4">
            <!-- Texto -->
            <div class="w-full md:w-1/3 text-center md:text-left">
                <p class="text-sm sm:text-sm md:text-base lg:text-lg text-gray-700 dark:text-gray-200 leading-relaxed">
                    Cada semestre es un nuevo viaje, y tú eres quien guía el camino.
                    A veces hay tramos fáciles, otros con curvas, y momentos donde toca parar a tomar aire…
                    Pero en cada paso hay algo valioso: aprender, acompañar y transformar.
                </p>
            </div>

            <!-- Genially -->
            <div class="w-full md:w-2/3 rounded-xl overflow-hidden shadow-lg">
                <div class="aspect-video">
                    <iframe title="genially-2" src="https://view.genially.com/690288b15151ac3654f965fa"
                        class="w-full h-full" frameborder="0" referrerpolicy="strict-origin-when-cross-origin"
                        allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
@include('partials.footer')
</x-layouts.app>
