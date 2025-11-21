<x-layouts.app :title="__('EduTips - Clases con alma')">

    <div class="flex flex-col items-center w-full gap-10 p-6">

        <!-- Banner principal -->
        <div x-data="{
            activeSlide: 0,
            slides: ['/images/banners/banner2.png']
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
                Aquí pasa la magia.
                Aprende a planear, orientar y conectar con tus estudiantes para que tus clases vibren y dejen huella,
                incluso a través de la pantalla.
            </h2>
        </div>

        <!-- Descripción secundaria -->

        <div class="w-full text-left">
            <h4
                class="text-base sm:text-lg md:text-xl lg:text-xl font-semibold text-gray-800 dark:text-gray-100 leading-relaxed text-left">
                Modelo de formación
            </h4>
        </div>

        <div class="flex flex-col md:flex-row items-center justify-center gap-6 max-w-6xl mx-auto mt-8 px-4">


            <div class="w-full md:w-2/3 rounded-xl overflow-hidden shadow-lg">
                <img src="/images/ccalma/Mod_form_UCompensar.png" alt="imagen" class="w-full h-auto object-cover">
            </div>

            <div class="w-full md:w-1/3 text-center md:text-left">
                <p class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-700 dark:text-gray-200 leading-relaxed">
                    En UCompensar creemos que aprender no pasa solo cuando el profe explica o el estudiante toma
                    apuntes.
                    Pasa cuando algo se enciende por dentro, cuando una idea hace clic o una charla deja huella; Aquí se
                    aprende haciendo, conectando y construyendo juntos: cada experiencia transforma la forma de
                    aprender.
                </p>
            </div>

        </div>

        <div class="w-full text-left">
            <h4
                class="text-base sm:text-lg md:text-xl lg:text-xl font-semibold text-gray-800 dark:text-gray-100 leading-relaxed text-left">
                Tipos de encuentros sincrónicos
            </h4>
        </div>

        <!-- Texto antes del Scorm -->
        <div class="text-center max-w-4xl px-4">
            <p class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-700 dark:text-gray-200 leading-relaxed">
                Cada encuentro sincrónico es una oportunidad para que la clase cobre vida.
                No se trata solo de conectarse o abrir la cámara, en UCompensar creemos que enseñar también es
                conversar, reírse, equivocarse y aprender juntos.Descubre cómo hacer de cada encuentro un espacio vivo,
                cercano y con propósito.
            </p>
        </div>

        <!-- SCORM Clases con alma -->
        <div class="w-full max-w-5xl mt-6 rounded-xl overflow-hidden shadow-lg clasesconalma">
            <div class="aspect-video">
                <iframe src="{{ asset('scorm/ccalma/encuentros-sincronicos/content/index.html') }}"
                    class="w-full h-full" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>


        <div class="w-full text-left">
            <h4
                class="text-base sm:text-lg md:text-xl lg:text-xl font-semibold text-gray-800 dark:text-gray-100 leading-relaxed text-left">
                Estrategias de evaluación y retroalimentación
            </h4>
        </div>

        <!-- Genially 1 -->
        <div class="w-full max-w-5xl mt-6 rounded-xl overflow-hidden shadow-lg">
            <div class="aspect-video">
                <iframe title="genially-1" src="https://view.genially.com/690a1befbf918d9073b242ef"
                    class="w-full h-full" frameborder="0" referrerpolicy="strict-origin-when-cross-origin"
                    allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                    allowfullscreen>
                </iframe>
            </div>
        </div>

        <div class="w-full text-left">
            <h4
                class="text-base sm:text-lg md:text-xl lg:text-xl font-semibold text-gray-800 dark:text-gray-100 leading-relaxed text-left">
                Seguimiento y apoyo individual/grupal
            </h4>
        </div>


        <!-- Sección Texto + Genially -->
        <div class="flex flex-col md:flex-row items-center justify-center gap-6 max-w-6xl mx-auto mt-8 px-4">
            <!-- Texto -->
            <div class="w-full md:w-1/3 text-center md:text-left">
                <p class="text-sm sm:text-sm md:text-base lg:text-lg text-gray-700 dark:text-gray-200 leading-relaxed">
                    Acompañar es estar presente, incluso a la distancia.
                    Este espacio te mostrará cómo hacer seguimiento a tus grupos y estudiantes, reconociendo sus avances
                    y apoyando sus procesos.
                    Porque detrás de cada número o reporte, hay una historia que crece con tu guía.
                </p>
            </div>

            <!-- Genially -->
            <div class="w-full md:w-2/3 rounded-xl overflow-hidden shadow-lg">
                <div class="aspect-video">
                    <iframe title="genially-2" src="https://view.genially.com/6909723df5c74b07c13f0944"
                        class="w-full h-full" frameborder="0" referrerpolicy="strict-origin-when-cross-origin"
                        allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>

        <div class="w-full text-left">
            <h4
                class="text-base sm:text-lg md:text-xl lg:text-xl font-semibold text-gray-800 dark:text-gray-100 leading-relaxed text-left">
                Estrategias de comunicación sincrónica y asincrónica
            </h4>
        </div>

        <!-- Video principal -->


        <div class="flex flex-col md:flex-row items-center justify-center gap-6 max-w-6xl mx-auto mt-8 px-4">

            <div class="w-full max-w-5xl mt-6 rounded-xl overflow-hidden shadow-lg">
                <div class="aspect-video">
                    <iframe title="vimeo-player" src="https://player.vimeo.com/video/1133852219?h=6eef8cd54a"
                        class="w-full h-full" frameborder="0" referrerpolicy="strict-origin-when-cross-origin"
                        allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>

            <div class="w-full md:w-1/3 text-center md:text-left">
                <p class="text-sm sm:text-sm md:text-base lg:text-lg text-gray-700 dark:text-gray-200 leading-relaxed">
                    Comunicar no es solo hablar, es saber conectar incluso a la distancia.
                    Este video te muestra cómo los encuentros sincrónicos pueden ser tu mejor aliado para mantener viva
                    la conversación con tus estudiantes.
                </p>
            </div>
        </div>



    </div>

</x-layouts.app>
