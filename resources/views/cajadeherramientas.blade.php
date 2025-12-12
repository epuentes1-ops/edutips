<x-layouts.app :title="__('EduTips - Caja de herramientas')">
    <div class="flex flex-col items-center w-full gap-10 p-6">
        <!-- Banner principal -->
        <div
            class="relative w-full max-w-6xl aspect-[16/6] sm:aspect-[16/7] md:aspect-[16/5] lg:aspect-[16/4] overflow-hidden rounded-2xl shadow-xl">
            <img src="/images/banners/bannertres.png" alt="Banner"
                class="w-full h-full object-cover object-center transition-opacity duration-700 ease-in-out">
        </div>

        <!-- Mensaje principal -->
        <div class="text-center max-w-4xl px-4">
            <h2
                class="text-base sm:text-lg md:text-xl lg:text-2xl font-semibold text-gray-800 dark:text-gray-100 leading-relaxed">
                La tecnología no reemplaza la enseñanza, la potencia. <br> Aquí encontrarás guías, tutoriales y trucos
                que harán tus clases más fáciles, dinámicas y llenas de ritmo.
            </h2>
        </div>

        <!-- Cuadrícula de videos -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full max-w-6xl mx-auto mt-12">
            <!-- Video 1 -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 cursor-pointer group"
                onclick="openModal('https://player.vimeo.com/video/1145320800', 'Ingreso a la Solución E-Learning', 'Ingresar a la Solución E-Learning es abrir la puerta a tu aula virtual. En este video conocerás, paso a paso, cómo acceder y moverte con facilidad por el espacio donde comienza cada encuentro con tus estudiantes.')">
                <!-- Imagen del video -->
                <img src="/images/card 1.png" alt="Ingreso a la Solución E-Learning"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                <p class="absolute bottom-4 left-4 text-white font-semibold">Ingreso a la Solución E-Learning</p>
            </div>

            <!-- Video 2 -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 cursor-pointer group"
                onclick="openModal('https://player.vimeo.com/video/1145351302', 'Nuestros cursos tienen un nuevo look', 'Porque aprender también puede sentirse fácil, cercano y visualmente bonito… Te damos la bienvenida a una nueva forma de vivir tus cursos virtuales.')">
                <!-- Imagen del video -->
                <img src="/images/card 2.png" alt="Nuestros cursos tienen un nuevo look"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                <p class="absolute bottom-4 left-4 text-white font-semibold">Nuestros cursos tienen un nuevo look</p>
            </div>

            <!-- Video 3 -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 cursor-pointer group"
                onclick="openModal('https://player.vimeo.com/video/1145326773', 'Cómo editar las fechas de entrega de tareas, foros, etc', 'A veces el calendario está muy encima: una entrega que vence mañana o un foro que cerró antes de tiempo... Tranquilo, en la Solución E-Learning puedes ajustar las fechas de tus actividades sin enredos. Este video te muestra cómo hacerlo paso a paso para que todo quede al día y tus estudiantes aprendan sin correr.')">
                <!-- Imagen del video -->
                <img src="/images/card 3.png" alt="Cómo editar las fechas de entrega"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                <p class="absolute bottom-4 left-4 text-white font-semibold">Cómo editar las fechas de entrega</p>
            </div>

            <!-- Video 4 -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 cursor-pointer group"
                onclick="openModal('https://player.vimeo.com/video/1145334419', 'Manejo de recurso lección','El recurso Lección es una de esas herramientas que facilitan la vida cuando se entiende bien.  En este video aprenderás a configurarla paso a paso, sin enredos ni sustos de última hora. Así, tus estudiantes vivirán la experiencia completa y tú tendrás todo bajo control.')">
                <!-- Imagen del video -->
                <img src="/images/card 4.png" alt="Manejo de recurso lección"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                <p class="absolute bottom-4 left-4 text-[#00adba] font-semibold">Manejo de recurso lección</p>
            </div>

            <!-- Video 5 -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 cursor-pointer group"
                onclick="openModal('https://player.vimeo.com/video/888123655', 'Creación de grupos manuales','En la virtualidad, los grupos son como los equipos de un salón: cada uno con su ritmo y su forma de aprender. En este video verás cómo crear y gestionar grupos paso a paso para acompañar más de cerca a tus estudiantes. Así tendrás clases más organizadas y entregas más claras.')">
                <!-- Imagen del video -->
                <img src="/images/card 1.png" alt="Creación de grupos manuales"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                <p class="absolute bottom-4 left-4 text-[#00adba] font-semibold">Creación de grupos manuales</p>
            </div>

            <!-- Video 6 -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 cursor-pointer group"
                onclick="openModal('https://player.vimeo.com/video/888123655', 'Los estudiantes pueden crear sus propios grupos','En la virtualidad, cada grupo encuentra su propio ritmo cuando puede formarse de manera natural. En este video aprenderás cómo crear grupos y permitir que tus estudiantes se vinculen por sí mismos. Una forma sencilla de fomentar la colaboración y enfocarte en lo que más importa: acompañar el aprendizaje.')">
                <!-- Imagen del video -->
                <img src="/images/card 2.png" alt="Los estudiantes pueden crear sus propios grupos"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                <p class="absolute bottom-4 left-4 text-[#00adba] font-semibold">Los estudiantes pueden crear sus
                    propios grupos</p>
            </div>

            <!-- Video 7 -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 cursor-pointer group"
                onclick="openModal('https://player.vimeo.com/video/990795198', 'Creación de encuentros sincrónicos en la Solución E-Learning','Cada clase tiene su propio ritmo y su espacio para encontrarse, incluso detrás de una pantalla. Configurar tu sala WebEx es abrir la puerta a ese salón virtual donde todo sucede. Aquí verás cómo crear, programar y llevar tus clases con orden y buena conexión.')">
                <!-- Imagen del video -->
                <img src="/images/card 3.png" alt="Creación de encuentros sincrónicos en la Solución E-Learning"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                <p class="absolute bottom-4 left-4 text-gray-900 font-semibold">Creación de encuentros sincrónicos en la
                    Solución E-Learning</p>
            </div>

            <!-- Video 8 -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 cursor-pointer group"
                onclick="openModal('https://player.vimeo.com/video/990795221', 'Encuentros sincrónicos para dos o más grupos','Hay clases que merecen compartirse, donde distintos grupos se conectan y aprenden juntos. Con un solo encuentro, puedes unir ideas, voces y energía en una misma sesión. Porque enseñar también es eso: saber conectar personas y propósitos.')">
                <!-- Imagen del video -->
                <img src="/images/card 4.png" alt="Encuentros sincrónicos para dos o más grupos"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                <p class="absolute bottom-4 left-4 text-gray-900 font-semibold">Encuentros sincrónicos para dos o más
                    grupos</p>
            </div>

            <!-- Video 9 -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 cursor-pointer group"
                onclick="openModal('https://player.vimeo.com/video/1145344604', 'Cómo evaluar y retroalimentar','Evaluar también es cuidar. Aprende a dejar una retroalimentación clara, cercana y oportuna que inspire a tus estudiantes a seguir aprendiendo con ganas.')">
                <!-- Imagen del video -->
                <img src="/images/card 1.png" alt="Cómo evaluar y retroalimentar"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                <p class="absolute bottom-4 left-4 text-gray-900 font-semibold">Cómo evaluar y retroalimentar</p>
            </div>

            <!-- Video 10 -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 cursor-pointer group"
                onclick="openModal('https://player.vimeo.com/video/885851845', 'Autoevaluación','La autoevaluación invita a reflexionar y a reconocer logros. En este video verás cómo validar este recurso y revisar las notas en el libro de calificaciones. Un paso corto que fortalece el crecimiento de cada estudiante.')">
                <!-- Imagen del video -->
                <img src="/images/card 2.png" alt="Autoevaluación"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                <p class="absolute bottom-4 left-4 text-[#00adba] font-semibold">Autoevaluación</p>
            </div>

            <!-- Video 11 -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 cursor-pointer group"
                onclick="openModal('https://player.vimeo.com/video/887486769', 'Coevaluación docente (tarea)','En este video verás cómo calificar de forma individual o grupal y registrar las notas en el libro de calificaciones. Un proceso sencillo que refuerza la retroalimentación y el acompañamiento en cada clase virtual.')">
                <!-- Imagen del video -->
                <img src="/images/card 3.png" alt="Coevaluación docente (tarea)"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                <p class="absolute bottom-4 left-4 text-[#00adba] font-semibold">Coevaluación docente (tarea)</p>
            </div>

            <!-- Video 12 -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 cursor-pointer group"
                onclick="openModal('https://player.vimeo.com/video/1145348191', 'Consultar Libro de calificaciones','¿Alguna vez has sentido esa mezcla entre curiosidad y expectativa por ver cómo van tus estudiantes?  Este paso a paso está hecho para ti: simple, claro y con todo lo que necesitas para revisar las calificaciones sin enredos y acompañar mejor su proceso.')">
                <!-- Imagen del video -->
                <img src="/images/card 4.png" alt="Consultar Libro de calificaciones"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                <p class="absolute bottom-4 left-4 text-[#00adba] font-semibold">Consultar Libro de calificaciones</p>
            </div>

            <!-- Video 13 -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 cursor-pointer group"
                onclick="openModal('https://view.genially.com/691ed98cebc829189bdff04e%22', 'Tips de buenas prácticas tecnologicas','Así como todo aventurero necesita su kit antes de salir al camino, todo docente tutor necesita su kit tecnológico para enseñar sin estrés y con todo bajo control. Cada “herramienta” del kit representa una buena práctica esencial para cuidar el entorno digital, prevenir imprevistos y garantizar una experiencia virtual fluida y humana.')">
                <!-- Imagen del video -->
                <img src="/images/card 1.png" alt="Tips de buenas prácticas tecnologicas"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                <p class="absolute bottom-4 left-4 text-[#00adba] font-semibold">Tips de buenas prácticas tecnologicas
                </p>
            </div>

        </div>


        <!-- Modal (Pop-up) para mostrar el video -->
        <div id="videoModal"
            class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden">
            <div class="bg-white dark:bg-gray-800 rounded-xl w-full max-w-4xl p-6 relative">
                <!-- Botón de cierre ajustado para pantallas pequeñas -->
                <button onclick="closeModal()"
                    class="absolute top-2 right-2 sm:right-4 text-[#00adba] font-bold text-4xl">
                    ×
                </button>
                <div class="flex flex-col items-center">
                    <iframe id="modalVideo" src="" frameborder="0" class="w-full h-[500px]"
                        allow="autoplay; fullscreen;" allowfullscreen></iframe>
                    <div class="mt-6 text-center max-w-3xl px-4">
                        <h3 id="modalTitle" class="text-xl font-semibold text-gray-800 dark:text-gray-100"></h3>
                        <p id="modalText"
                            class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-700 dark:text-gray-200 leading-relaxed mt-4">
                        </p>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script>
        function openModal(videoUrl, videoTitle, videoText) {
            document.getElementById('modalVideo').src = videoUrl;
            document.getElementById('modalTitle').innerText = videoTitle;
            document.getElementById('modalText').innerText = videoText;
            // Mostrar el modal con flex
            document.getElementById('videoModal').classList.remove('hidden');
            document.getElementById('videoModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('videoModal').classList.add('hidden');
            document.getElementById('videoModal').classList.remove('flex');
            document.getElementById('modalVideo').src = '';
            document.getElementById('modalTitle').innerText = '';
            document.getElementById('modalText').innerText = '';
        }
    </script>
</x-layouts.app>
