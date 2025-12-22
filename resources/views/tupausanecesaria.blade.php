<x-layouts.app :title="__('EduTips - Tu pausa necesaria')">

    <div class="flex flex-col items-center w-full gap-10 p-6">

        <!-- Banner principal -->
        <div x-data="{
            activeSlide: 0,
            slides: ['/images/banners/banner_5.jpg']
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
                Antes de cuidar a los demás, también hay que cuidarse.
                Este es tu rincón para recargar energía, hacer pausas y mantener el equilibrio que te inspira a seguir
                enseñando con corazón.
            </h2>
        </div>

        <!-- CONTENIDO EN PESTAÑAS -->
        <div x-data="{ activeTab: 'relajacion' }" class="w-full max-w-6xl mx-auto mt-8">

            <!-- Barra de pestañas -->
            <div
                class="flex flex-col sm:flex-row border-b border-gray-200 dark:border-gray-700 rounded-t-xl overflow-hidden">
                <button
                    class="flex-1 px-4 py-3 text-xs sm:text-sm md:text-base font-semibold text-center tracking-wide
                           border-b-2 sm:border-b-0 sm:border-r-2
                           border-transparent hover:bg-gray-300 dark:hover:bg-gray-800
                           transition"
                    :class="activeTab === 'relajacion'
                        ?
                        'bg-[#00adba] text-white dark:bg-[#00adba] dark:text-gray-900' :
                        'bg-gray-50 text-gray-700 dark:bg-gray-800 dark:text-gray-200'"
                    @click="activeTab = 'relajacion'">
                    Ejercicios de relajación y pausas activas frente al computador
                </button>

                <button
                    class="flex-1 px-4 py-3 text-xs sm:text-sm md:text-base font-semibold text-center tracking-wide
                           border-b-2 sm:border-b-0 sm:border-r-2
                           border-transparent  hover:bg-gray-300 dark:hover:bg-gray-800
                           transition"
                    :class="activeTab === 'estres'
                        ?
                        'bg-[#00adba] text-white dark:bg-[#00adba] dark:text-gray-900' :
                        'bg-gray-50 text-gray-700 dark:bg-gray-800 dark:text-gray-200'"
                    @click="activeTab = 'estres'">
                    Gestión del estrés académico y salud mental cuando eres docente-tutor
                </button>

                <button
                    class="flex-1 px-4 py-3 text-xs sm:text-sm md:text-base font-semibold text-center tracking-wide
                           border-b-2 sm:border-b-0 sm:border-r-2
                           border-transparent hover:bg-gray-300 dark:hover:bg-gray-800
                           transition"
                    :class="activeTab === 'procrastinacion'
                        ?
                        'bg-[#00adba] text-white dark:bg-[#00adba] dark:text-gray-900' :
                        'bg-gray-50 text-gray-700 dark:bg-gray-800 dark:text-gray-200'"
                    @click="activeTab = 'procrastinacion'">
                    Estrategias para la procrastinación - pequeños hábitos para vencer la postergación
                </button>
            </div>

            <!-- Contenedor de contenido -->
            <div
                class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-b-xl shadow-lg p-6">

                <!-- TAB 1: relajacion -->
                <div x-show="activeTab === 'relajacion'" x-transition>
                    <p class="mb-6 text-sm sm:text-base md:text-lg text-gray-700 dark:text-gray-200 leading-relaxed">
                        A veces el cuerpo habla bajito: se tensa, se cansa, se apaga.
                        Por eso, más que seguir corriendo, vale la pena detenerse un momento, respirar y volver a ti.
                        <br>
                        Este video es un recordatorio de que cuidarte también hace parte del trabajo.
                    </p>

                    <div class="w-full rounded-xl overflow-hidden shadow-md">
                        <div class="aspect-video">
                            <iframe title="vimeo-player" src="https://player.vimeo.com/video/1142119961?h=bf95d9a431"
                                class="w-full h-full" frameborder="0" referrerpolicy="strict-origin-when-cross-origin"
                                allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

                <!-- TAB 2: estres -->
                <div x-show="activeTab === 'estres'" x-transition>
                    <p class="mb-6 text-sm sm:text-base md:text-lg text-gray-700 dark:text-gray-200 leading-relaxed">
                        Entre clases, correos y pantallas, a veces olvidamos que también necesitamos
                        una pausa para el alma. <br>
                        Este video te invita a soltar el peso del día, reencontrarte contigo y
                        recordar que enseñar también es cuidarse.
                    </p>

                    <div class="w-full rounded-xl overflow-hidden shadow-md">
                        <div class="aspect-video">
                            <iframe title="video-estres" src="https://player.vimeo.com/video/1142121397?h=a2bc8b49ed"
                                class="w-full h-full" frameborder="0" referrerpolicy="strict-origin-when-cross-origin"
                                allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>

                <!-- TAB 3: procrastinacion -->
                <div x-show="activeTab === 'procrastinacion'" x-transition>
                    <p class="mb-6 text-sm sm:text-base md:text-lg text-gray-700 dark:text-gray-200 leading-relaxed">
                        A todos nos pasa: decimos “ya casi empiezo” y el día se nos va entre correos, mensajes y
                        pendientes. <br>
                        Esta cápsula te invita a retomar el ritmo con tres microhábitos sencillos que te devuelven el
                        foco, la energía y las ganas de avanzar.
                    </p>

                    <div class="w-full rounded-xl overflow-hidden shadow-md">
                        <div class="aspect-video">
                            <iframe title="video-estres" src="https://player.vimeo.com/video/1142123570?h=b77700a266"
                                class="w-full h-full" frameborder="0" referrerpolicy="strict-origin-when-cross-origin"
                                allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>

            </div> <!-- fin contenedor contenido tabs -->
        </div> <!-- fin x-data tabs -->

        <!-- 2Do CONTENIDO EN PESTAÑAS -->
        <div x-data="{ activeTab: 'detox' }" class="w-full max-w-6xl mx-auto mt-8">

            <!-- Barra de pestañas -->
            <div
                class="flex flex-col sm:flex-row border-b border-gray-200 dark:border-gray-700 rounded-t-xl overflow-hidden">
                <button
                    class="flex-1 px-4 py-3 text-xs sm:text-sm md:text-base font-semibold text-center tracking-wide
                           border-b-2 sm:border-b-0 sm:border-r-2
                           border-transparent hover:bg-gray-300 dark:hover:bg-gray-800
                           transition"
                    :class="activeTab === 'detox'
                        ?
                        'bg-[#00adba] text-white dark:bg-[#00adba] dark:text-gray-900' :
                        'bg-gray-50 text-gray-700 dark:bg-gray-800 dark:text-gray-200'"
                    @click="activeTab = 'detox'">
                    Equilibrio conexión-desconexión digital (detox digital)
                </button>

                <button
                    class="flex-1 px-4 py-3 text-xs sm:text-sm md:text-base font-semibold text-center tracking-wide
                           border-b-2 sm:border-b-0 sm:border-r-2
                           border-transparent  hover:bg-gray-300 dark:hover:bg-gray-800
                           transition"
                    :class="activeTab === 'recarga'
                        ?
                        'bg-[#00adba] text-white dark:bg-[#00adba] dark:text-gray-900' :
                        'bg-gray-50 text-gray-700 dark:bg-gray-800 dark:text-gray-200'"
                    @click="activeTab = 'recarga'">
                    Infografía - Recarga Emocional Docente
                </button>

                
            </div>

            <!-- Contenedor de contenido -->
            <div
                class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-b-xl shadow-lg p-6">

                <!-- TAB 1: detox -->
                <div x-show="activeTab === 'detox'" x-transition>
                    <p class="mb-6 text-sm sm:text-base md:text-lg text-gray-700 dark:text-gray-200 leading-relaxed">
                        ¿Hace cuánto no parpadeas frente a la pantalla? <br>
                        A veces creemos que “descansar” es cerrar el portátil, pero seguimos en el celular, el chat o el
                        correo. Este recurso te invita a hacer tres pausas pequeñas que no apagan tu día, pero sí lo
                        devuelven a ti.

                    </p>

                    <div class="w-full rounded-xl overflow-hidden shadow-md">
                        <div class="aspect-video">
                            <iframe title="genially-detox" src="https://view.genially.com/6916294f89704d593799c585"
                                class="w-full h-full" frameborder="0" referrerpolicy="strict-origin-when-cross-origin"
                                allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

                <!-- TAB 2: recarga -->
                <div x-show="activeTab === 'recarga'" x-transition>
                    <p class="mb-6 text-sm sm:text-base md:text-lg text-gray-700 dark:text-gray-200 leading-relaxed">
                        Docente, ¡cuida tu fuente! <br>
                        Manejo de la fatiga por empatía y la carga emocional
                        <br>
                        Hay días en los que das tanto, que terminas vacío sin darte cuenta. <br>
                        Esta infografía te recuerda algo simple: para seguir acompañando, primero hay que volver a
                        llenarse.
                    </p>

                    <div class="w-full rounded-xl overflow-hidden shadow-md">
                        <div class="aspect-video">
                            <iframe title="genially-recarga" src="https://view.genially.com/6918488c5ab63ef82bb74d5c"
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
