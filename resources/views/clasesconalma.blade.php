<x-layouts.app :title="__('EduTips - Clases con alma')">
    <style>
        /* Estilo para el modal */
        #imageModal {
            display: none;
            /* Ocultamos el modal inicialmente */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1050;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        #imageModal img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;

        }

        #imageModal .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 30px;
            color: white;
            background-color: transparent;
            border: none;
            cursor: pointer;
        }
    </style>


    <div class="flex flex-col items-center w-full gap-10 p-6">

        <!-- Banner principal -->
        <div x-data="{
            activeSlide: 0,
            slides: ['/images/banners/banner_4.jpg']
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
                <img src="/images/ccalma/Mod_form_UCompensar.png" alt="imagen" class="w-full h-auto object-cover"
                    id="modelImage" style="cursor: pointer;">
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
                conversar, reírse, equivocarse y aprender juntos. Descubre cómo hacer de cada encuentro un espacio vivo,
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

        <!-- ACORDEÓN-->
        <div x-data="{ openSection: 'seguimiento' }" class="w-full max-w-6xl mx-auto mt-8 px-4 space-y-6">

            <!-- Ítem 1: Seguimiento y apoyo individual/grupal -->
            <div class="border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden">
                <button class="w-full flex justify-between items-center px-4 py-3 text-left focus:outline-none"
                    @click="openSection = openSection === 'seguimiento' ? null : 'seguimiento'">
                    <h4
                        class="text-base sm:text-lg md:text-xl lg:text-xl font-semibold text-gray-800 dark:text-gray-100">
                        Seguimiento y apoyo individual/grupal
                    </h4>
                    <span x-text="openSection === 'seguimiento' ? '-' : '+'"
                        class="text-xl font-bold text-gray-700 dark:text-gray-200"></span>
                </button>

                <div x-show="openSection === 'seguimiento'" x-collapse
                    class="border-t border-gray-200 dark:border-gray-700">
                    <div class="flex flex-col md:flex-row items-center justify-center gap-6 mt-6 px-4 pb-6">
                        <!-- Texto -->
                        <div class="w-full md:w-1/3 text-center md:text-left">
                            <p
                                class="text-sm sm:text-sm md:text-base lg:text-lg text-gray-700 dark:text-gray-200 leading-relaxed">
                                Acompañar es estar presente, incluso a la distancia.
                                Este espacio te mostrará cómo hacer seguimiento a tus grupos y estudiantes, reconociendo
                                sus avances
                                y apoyando sus procesos.
                                Porque detrás de cada número o reporte, hay una historia que crece con tu guía.
                            </p>
                        </div>
                        <!-- Genially -->
                        <div class="w-full md:w-2/3 rounded-xl overflow-hidden shadow-lg">
                            <div class="aspect-video">
                                <iframe title="genially-seguimiento"
                                    src="https://view.genially.com/6909723df5c74b07c13f0944" class="w-full h-full"
                                    frameborder="0" referrerpolicy="strict-origin-when-cross-origin"
                                    allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ítem 2: Estrategias de comunicación sincrónica y asincrónica -->
            <div class="border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden">
                <button class="w-full flex justify-between items-center px-4 py-3 text-left focus:outline-none"
                    @click="openSection = openSection === 'estrategias' ? null : 'estrategias'">
                    <h4
                        class="text-base sm:text-lg md:text-xl lg:text-xl font-semibold text-gray-800 dark:text-gray-100">
                        Estrategias de comunicación sincrónica y asincrónica
                    </h4>
                    <span x-text="openSection === 'estrategias' ? '-' : '+'"
                        class="text-xl font-bold text-gray-700 dark:text-gray-200"></span>
                </button>

                <div x-show="openSection === 'estrategias'" x-collapse
                    class="border-t border-gray-200 dark:border-gray-700">
                    <div class="flex flex-col md:flex-row items-center justify-center gap-6 mt-6 px-4 pb-6">
                        <!-- Genially -->
                        <div class="w-full md:w-2/3 rounded-xl overflow-hidden shadow-lg">
                            <div class="aspect-video">
                                <iframe title="genially-estrategias"
                                    src="https://player.vimeo.com/video/1133852219?h=6eef8cd54a" class="w-full h-full"
                                    frameborder="0" referrerpolicy="strict-origin-when-cross-origin"
                                    allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>

                        <!-- Texto -->
                        <div class="w-full md:w-1/3 text-center md:text-left">
                            <p
                                class="text-sm sm:text-sm md:text-base lg:text-lg text-gray-700 dark:text-gray-200 leading-relaxed">
                                Comunicar no es solo hablar, es saber conectar incluso a la distancia.
                                Este video te muestra cómo los encuentros sincrónicos pueden ser tu mejor aliado para
                                mantener viva
                                la conversación con tus estudiantes.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ítem 3: Niveles de lectura -->
            <div class="border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden">
                <button class="w-full flex justify-between items-center px-4 py-3 text-left focus:outline-none"
                    @click="openSection = openSection === 'niveles' ? null : 'niveles'">
                    <h4
                        class="text-base sm:text-lg md:text-xl lg:text-xl font-semibold text-gray-800 dark:text-gray-100">
                        Niveles de lectura
                    </h4>
                    <span x-text="openSection === 'niveles' ? '-' : '+'"
                        class="text-xl font-bold text-gray-700 dark:text-gray-200"></span>
                </button>

                <div x-show="openSection === 'niveles'" x-collapse
                    class="border-t border-gray-200 dark:border-gray-700">
                    <div class="flex flex-col md:flex-row items-center justify-center gap-6 mt-6 px-4 pb-6">
                        <!-- Texto -->
                        <div class="w-full md:w-1/3 text-center md:text-left">
                            <p
                                class="text-sm sm:text-sm md:text-base lg:text-lg text-gray-700 dark:text-gray-200 leading-relaxed">
                                Leemos todo el día: mensajes, caras, silencios y hasta recetas que no salen como en la
                                foto.
                                Pero leer de verdad es detenerse, conectar y encontrar sentido.
                                En UCompensar te invitamos a leer con otros ojos, a descubrir lo que el texto dice… y lo
                                que te
                                deja pensando.
                            </p>
                        </div>
                        <!-- Genially -->
                        <div class="w-full md:w-2/3 rounded-xl overflow-hidden shadow-lg">
                            <div class="aspect-video">
                                <iframe title="genially-niveles-lectura"
                                    src="https://view.genially.com/68bdb2c9e52ddd58a801f0e9" class="w-full h-full"
                                    frameborder="0" referrerpolicy="strict-origin-when-cross-origin"
                                    allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ítem 4: Herramientas externas -->
            <div class="border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden">
                <button class="w-full flex justify-between items-center px-4 py-3 text-left focus:outline-none"
                    @click="openSection = openSection === 'herramientas' ? null : 'herramientas'">
                    <h4
                        class="text-base sm:text-lg md:text-xl lg:text-xl font-semibold text-gray-800 dark:text-gray-100">
                        Herramientas externas para dinamizar los encuentros
                    </h4>
                    <span x-text="openSection === 'herramientas' ? '-' : '+'"
                        class="text-xl font-bold text-gray-700 dark:text-gray-200"></span>
                </button>

                <div x-show="openSection === 'herramientas'" x-collapse
                    class="border-t border-gray-200 dark:border-gray-700">
                    <div class="flex flex-col md:flex-row items-center justify-center gap-6 mt-6 px-4 pb-6">
                        <!-- Genially -->
                        <div class="w-full md:w-2/3 rounded-xl overflow-hidden shadow-lg">
                            <div class="aspect-video">
                                <iframe title="genially-herramientas"
                                    src="https://view.genially.com/66bb8c8990672ae837c00954" class="w-full h-full"
                                    frameborder="0" referrerpolicy="strict-origin-when-cross-origin"
                                    allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>

                        <!-- Texto -->
                        <div class="w-full md:w-1/3 text-center md:text-left">
                            <p
                                class="text-sm sm:text-sm md:text-base lg:text-lg text-gray-700 dark:text-gray-200 leading-relaxed">
                                Hay clases que se sienten vivas desde el primer minuto, donde las ideas fluyen y la
                                energía se
                                nota.
                                Detrás de eso hay un profe que sabe usar las herramientas adecuadas: simples, prácticas
                                y llenas
                                de ritmo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>

    <!-- Modal de imagen -->
    <div id="imageModal">
        <button class="close-btn">×</button> <!-- Botón de cierre -->
    </div>

    <script>
        // Obtener el modal y la imagen
        const imageModal = document.getElementById('imageModal');
        const modelImage = document.getElementById('modelImage');
        const closeBtn = document.createElement('button');

        // Crear el botón de cierre
        closeBtn.classList.add('close-btn');
        closeBtn.innerHTML = '×'; // Carácter de cierre

        // Función para abrir el modal
        modelImage.onclick = function() {
            const imgSrc = modelImage.src; // Obtener la URL de la imagen
            imageModal.innerHTML = `<img src="${imgSrc}" alt="Imagen ampliada">`; // Establecer la imagen ampliada
            imageModal.appendChild(closeBtn); // Añadir el botón de cierre
            imageModal.style.display = 'flex'; // Mostrar el modal
        };

        // Función para cerrar el modal
        closeBtn.onclick = function() {
            imageModal.style.display = 'none'; // Ocultar el modal
        };
    </script>

    <x-section-rating sectionKey="clasesconalma" />

    @include('partials.footer')

</x-layouts.app>
