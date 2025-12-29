@props(['sectionKey', 'currentRating' => 0])

<div class="mt-10 border-t pt-6">
    <div class="flex flex-col gap-2 items-center text-center">
        <p class="text-sm sm:text-base font-semibold">¿Qué te pareció este contenido?</p>

        <div class="flex items-center gap-2" data-section-rating data-section-key="{{ $sectionKey }}">
            @for ($i = 1; $i <= 5; $i++)
                <button type="button" class="text-2xl sm:text-3xl hover:scale-110 transition-transform"
                    data-star="{{ $i }}">
                    <span class="{{ ($currentRating ?? 0) >= $i ? 'text-yellow-400' : 'text-gray-400' }}">★</span>
                </button>
            @endfor
        </div>
        <p class="text-xs sm:text-sm opacity-70" data-rating-msg></p>

    </div>
</div>

@once
    <script>
        function initSectionRatings() {
            document.querySelectorAll('[data-section-rating]').forEach((wrap) => {
                // Evita duplicar listeners si se re-inicializa
                if (wrap.dataset.initialized === '1') return;
                wrap.dataset.initialized = '1';

                const sectionKey = wrap.getAttribute('data-section-key');
                const msg = wrap.closest('div').querySelector('[data-rating-msg]');
                const stars = wrap.querySelectorAll('[data-star]');

                const paint = (n) => {
                    stars.forEach(btn => {
                        const v = parseInt(btn.getAttribute('data-star'), 10);
                        const icon = btn.querySelector('span');

                        icon.classList.toggle('text-yellow-400', v <= n);
                        icon.classList.toggle('text-gray-400', v > n);
                    });
                };

                stars.forEach((btn) => {
                    btn.addEventListener('click', async () => {
                        const rating = parseInt(btn.getAttribute('data-star'), 10);

                        try {
                            const res = await fetch(`{{ route('section-rating.store') }}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute(
                                        'content')
                                },
                                body: JSON.stringify({
                                    section_key: sectionKey,
                                    rating
                                })
                            });

                            const data = await res.json();
                            if (!res.ok || !data.ok) throw new Error(data?.message || 'Error');

                            paint(rating);
                            if (msg) msg.textContent = '¡Gracias! Tú calificación nos ayuda mejorar.';
                        } catch (e) {
                            if (msg) msg.textContent = 'No se pudo guardar. Intenta de nuevo.';
                        }
                    });
                });
            });
        }

        // Carga normal
        document.addEventListener('DOMContentLoaded', initSectionRatings);

        // Si usas Livewire Navigate (muy común)
        document.addEventListener('livewire:navigated', initSectionRatings);

        // Si usas Turbo / Hotwire
        document.addEventListener('turbo:load', initSectionRatings);

        // Por si el layout hace swaps custom
        window.addEventListener('pageshow', initSectionRatings);
    </script>
@endonce
