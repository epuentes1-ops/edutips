<x-layouts.app :title="__('EduTips - Al día')">

    <div class="flex flex-col items-center w-full gap-10 p-6">

        <!-- Banner principal -->
        <div x-data="{
            activeSlide: 0,
            slides: ['/images/banners/banner6.png']
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
                La educación está viva, cambia y se reinventa. <br>
                En esta sección encontrarás eventos, noticias y lanzamientos para mantenerte al día e inspirarte a
                probar nuevas formas de enseñar.
            </h2>
        </div>

        <!-- CONTENIDO EN PESTAÑAS -->
        <div x-data="{ activeTab: 'contacto' }" class="w-full max-w-6xl mx-auto mt-8">

            <!-- Barra de pestañas -->
            <div
                class="flex flex-col sm:flex-row border-b border-gray-200 dark:border-gray-700 rounded-t-xl overflow-hidden">
                <button
                    class="flex-1 px-4 py-3 text-xs sm:text-sm md:text-base font-semibold text-center tracking-wide
                           border-b-2 sm:border-b-0 sm:border-r-2
                           border-transparent hover:bg-gray-300 dark:hover:bg-gray-800
                           transition"
                    :class="activeTab === 'contacto'
                        ?
                        'bg-[#00adba] text-white dark:bg-[#00adba] dark:text-gray-900' :
                        'bg-gray-50 text-gray-700 dark:bg-gray-800 dark:text-gray-200'"
                    @click="activeTab = 'contacto'">
                    1. Contacto con Operación y Soporte
                </button>

                <button
                    class="flex-1 px-4 py-3 text-xs sm:text-sm md:text-base font-semibold text-center tracking-wide
                           border-b-2 sm:border-b-0 sm:border-r-2
                           border-transparent  hover:bg-gray-300 dark:hover:bg-gray-800
                           transition"
                    :class="activeTab === 'preguntas'
                        ?
                        'bg-[#00adba] text-white dark:bg-[#00adba] dark:text-gray-900' :
                        'bg-gray-50 text-gray-700 dark:bg-gray-800 dark:text-gray-200'"
                    @click="activeTab = 'preguntas'">
                    2. Preguntas frecuentes
                </button>

                <button
                    class="flex-1 px-4 py-3 text-xs sm:text-sm md:text-base font-semibold text-center tracking-wide
                           border-b-2 sm:border-b-0 sm:border-r-2
                           border-transparent hover:bg-gray-300 dark:hover:bg-gray-800
                           transition"
                    :class="activeTab === 'experiencia'
                        ?
                        'bg-[#00adba] text-white dark:bg-[#00adba] dark:text-gray-900' :
                        'bg-gray-50 text-gray-700 dark:bg-gray-800 dark:text-gray-200'"
                    @click="activeTab = 'experiencia'">
                    3. Experiencia de tus pares
                </button>
            </div>

            <!-- Contenedor de contenido -->
            <div
                class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-b-xl shadow-lg p-6">

                <!-- TAB 1: contacto -->
                <div x-show="activeTab === 'contacto'" x-transition>
                    <p class="mb-6 text-sm sm:text-base md:text-lg text-gray-700 dark:text-gray-200 leading-relaxed">
                        Cuando algo no sale como esperabas o simplemente necesitas una mano, aquí estamos. <br>
                        Nuestro equipo de Operación y Soporte es ese aliado que te escucha, te guía y te acompaña paso a
                        paso. <br>
                        No estás solo en esto: escríbenos, cuéntanos qué pasa y resolvemos juntos.
                    </p>

                    <div class="w-full rounded-xl overflow-hidden shadow-md">
                        <!-- Contenedor para imagen centrada y responsiva -->
                        <div class="flex justify-center items-center w-full">
                            <img src="/images/aldia/Canales de comunicacion.png" alt="imagen"
                                class="w-full h-auto object-cover max-w-full rounded-xl shadow-lg">
                        </div>
                    </div>
                </div>

                <!-- TAB 2: preguntas -->
                <div x-show="activeTab === 'preguntas'" x-transition>
                    <p class="mb-6 text-sm sm:text-base md:text-lg text-gray-700 dark:text-gray-200 leading-relaxed">
                        Las preguntas siempre aparecen justo cuando más las necesitas. <br>
                        Por eso creamos este espacio: un lugar para resolver dudas rápidas y encontrar respuestas claras
                        sin dar tantas vueltas. <br>
                        Explora las categorías, haz clic y encuentra en segundos lo que necesitas para seguir enseñando
                        y aprendiendo sin pausas.
                    </p>
                    <button
                        class="flex-1 px-4 py-3 text-xs sm:text-sm md:text-base font-semibold text-center tracking-wide
                           border-b-2 sm:border-b-0 sm:border-r-2
                           border-transparent hover:bg-[#00adba] dark:hover:bg-gray-800
                           transition">

                        <a href="https://ucompensar.edu.co/preguntas-frecuentes/" target="_blank"
                            rel="noopener noreferrer">
                            Ir a Preguntas frecuentes
                        </a>
                    </button>

                </div>

                <!-- TAB 3: Experiencia -->
                <div x-show="activeTab === 'experiencia'" x-transition>
                    <p class="mb-6 text-sm sm:text-base md:text-lg text-gray-700 dark:text-gray-200 leading-relaxed">
                        Hay consejos que solo se aprenden con la experiencia. <br>
                        Pequeños gestos que hacen la diferencia: revisar el correo o responder con amabilidad. <br>
                        Este video reúne esas buenas prácticas que hacen que enseñar en la virtualidad se sienta más
                        humano y cercano.
                    </p>

                    <div class="w-full rounded-xl overflow-hidden shadow-md">
                        <div class="aspect-video">
                            <iframe title="video-estres"
                                src="https://player.vimeo.com/video/803493159?h=2faaaaff07&badge=0&autopause=0&player_id=0&app_id=58479"
                                class="w-full h-full" frameborder="0" referrerpolicy="strict-origin-when-cross-origin"
                                allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>

            </div> <!-- fin contenedor contenido tabs -->
        </div> <!-- fin x-data tabs -->

    </div>
    @include('partials.footer')
</x-layouts.app>
