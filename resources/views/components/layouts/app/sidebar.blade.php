@php
    $groups = [
        'Menu EduTips' => [
            [
                'name' => 'Aquí empieza todo',
                'icon' => 'home',
                'url' => route('aquiempiezatodo'),
                'current' => request()->routeIs('aquiempiezatodo'),
            ],
            [
                'name' => 'Tu camino docente',
                'icon' => 'map',
                'url' => route('tucaminodocente'),
                'current' => request()->routeIs('tucaminodocente'),
            ],
            [
                'name' => 'Caja de herramientas',
                'icon' => 'rectangle-stack',
                'url' => route('cajadeherramientas'),
                'current' => request()->routeIs('cajadeherramientas'),
            ],
            [
                'name' => 'Clases con alma',
                'icon' => 'academic-cap',
                'url' => route('clasesconalma'),
                'current' => request()->routeIs('clasesconalma'),
            ],
            [
                'name' => 'Tu pausa necesaria',
                'icon' => 'battery-50',
                'url' => route('tupausanecesaria'),
                'current' => request()->routeIs('tupausanecesaria'),
            ],
            [
                'name' => 'Al día',
                'icon' => 'sun',
                'url' => route('aldia'),
                'current' => request()->routeIs('aldia'),
            ],
            // [
            //     'name' => '¿Cómo van tus estudiantes?',
            //     'icon' => 'chart-pie',
            //     'url' => route('comovantusestudiantes'),
            //     'current' => request()->routeIs('comovantusestudiantes'),
            // ],
        ],
    ];
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    
    <script>
        function paintStars(wrap, n) {
            wrap.querySelectorAll('[data-star]').forEach(btn => {
                const v = parseInt(btn.getAttribute('data-star'), 10);
                const icon = btn.querySelector('span');
                icon.classList.toggle('text-yellow-400', v <= n);
                icon.classList.toggle('text-gray-400', v > n);
            });
        }

        async function postRating(sectionKey, rating) {
            const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

            const res = await fetch("{{ route('section-rating.store') }}", {
                method: "POST",
                credentials: "same-origin",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    ...(csrf ? {
                        "X-CSRF-TOKEN": csrf
                    } : {})
                },
                body: JSON.stringify({
                    section_key: sectionKey,
                    rating
                })
            });

            const ct = res.headers.get("content-type") || "";
            const payload = ct.includes("application/json") ? await res.json() : await res.text();
            return {
                res,
                payload
            };
        }

        document.addEventListener("click", async (e) => {
            const btn = e.target.closest("[data-star]");
            if (!btn) return;

            const wrap = btn.closest("[data-section-rating]");
            if (!wrap) return;

            const sectionKey = wrap.getAttribute("data-section-key");
            const rating = parseInt(btn.getAttribute("data-star"), 10);
            const msg = wrap.parentElement.querySelector("[data-rating-msg]");

            try {
                const {
                    res,
                    payload
                } = await postRating(sectionKey, rating);

                if (!res.ok || (payload && payload.ok === false)) {
                    console.error("Rating error:", res.status, payload);
                    if (msg) msg.textContent = `No se pudo guardar (HTTP ${res.status}).`;
                    return;
                }

                paintStars(wrap, rating);
                if (msg) msg.textContent = "¡Gracias! Calificación guardada.";
            } catch (err) {
                console.error("Fetch failed:", err);
                if (msg) msg.textContent = "Error de red/JS. Revisa consola.";
            }
        });
    </script>

    <script>
        async function loadRatingFor(wrap) {
            const sectionKey = wrap.getAttribute('data-section-key');

            // Evita spam de requests: si consultó esta sección hace < 2s, no repite
            const now = Date.now();
            const lastKey = wrap.dataset.lastKey;
            const lastAt = parseInt(wrap.dataset.lastAt || "0", 10);

            if (lastKey === sectionKey && (now - lastAt) < 2000) return;

            wrap.dataset.lastKey = sectionKey;
            wrap.dataset.lastAt = String(now);

            try {
                const url = new URL("{{ route('section-rating.show') }}", window.location.origin);
                url.searchParams.set('section_key', sectionKey);

                const res = await fetch(url.toString(), {
                    method: "GET",
                    credentials: "same-origin",
                    headers: {
                        "Accept": "application/json"
                    }
                });

                const data = await res.json();
                if (data?.ok) {
                    paintStars(wrap, parseInt(data.rating || 0, 10));
                }
            } catch (e) {
                console.error("loadRatingFor failed:", e);
            }
        }

        function hydrateAllRatings() {
            document.querySelectorAll('[data-section-rating]').forEach(loadRatingFor);
        }

        // Carga normal
        document.addEventListener("DOMContentLoaded", hydrateAllRatings);

        // Livewire Navigate (TU PROYECTO USA wire:navigate)
        document.addEventListener("livewire:navigated", hydrateAllRatings);

        // Extra por si hay BFCache / volver atrás
        window.addEventListener("pageshow", hydrateAllRatings);

        // Observa cambios del DOM (Flux/Livewire swaps)
        const obs = new MutationObserver(() => hydrateAllRatings());
        obs.observe(document.body, {
            childList: true,
            subtree: true
        });
    </script>



    <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('aquiempiezatodo') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse"
            wire:navigate>
            <x-app-logo />
        </a>

        <flux:navlist variant="outline">
            @foreach ($groups as $group => $links)
                <flux:navlist.group :heading="$group" class="grid">
                    @foreach ($links as $link)
                        <flux:navlist.item :icon="$link['icon']" :href="$link['url']" :current="$link['current']"
                            wire:navigate>
                            {{ $link['name'] }}
                        </flux:navlist.item>
                    @endforeach

                </flux:navlist.group>
            @endforeach

        </flux:navlist>

        <flux:spacer />

        <!-- Desktop User Menu -->
        <flux:dropdown class="hidden lg:block" position="bottom" align="start">
            <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()"
                icon:trailing="chevrons-up-down" />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Configuración') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                @hasanyrole('Administrador|Editor')
                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('admin.users.index')" icon="users" wire:navigate>
                            {{ __('Usuarios') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('admin.categories.index')" icon="funnel" wire:navigate>
                            {{ __('Categorías') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('admin.reports.index')" icon="presentation-chart-bar" wire:navigate>
                            {{ __('Reportes') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />
                @endhasanyrole

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full"
                        data-test="logout-button">
                        {{ __('Cerrar Sesión') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>

    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                @hasanyrole('Administrador|Editor')
                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('admin.users.index')" icon="users" wire:navigate>
                            {{ __('Usuarios') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('admin.categories.index')" icon="funnel" wire:navigate>
                            {{ __('Categorías') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('admin.reports.index')" icon="presentation-chart-bar" wire:navigate>
                            {{ __('Reportes') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />
                @endhasanyrole

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full"
                        data-test="logout-button">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}


    @fluxScripts
</body>

</html>
