<x-layouts.app :title="__('EduTips - Usuarios')">
    @include('partials.adminusers-heading')

    <div class="w-full p-6">
        <div class="mx-auto w-full max-w-5xl space-y-6">

            {{-- Header --}}
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-xl font-semibold">{{ __('Actualizar usuario') }}</h1>
                    <p class="text-sm text-gray-500">
                        {{ __('Edita datos básicos y ajusta roles/permisos. La contraseña es opcional.') }}
                    </p>
                </div>

                <div class="flex items-center gap-2">
                    <a
                        href="{{ route('admin.users.index') }}"
                        class="inline-flex items-center rounded-lg border px-4 py-2 text-sm font-medium hover:bg-gray-50"
                    >
                        ← {{ __('Ver usuarios') }}
                    </a>

                    <button
                        form="edit-user-form"
                        type="submit"
                        class="inline-flex items-center rounded-lg border px-4 py-2 text-sm font-medium hover:bg-gray-50"
                    >
                        ✅ {{ __('Actualizar') }}
                    </button>
                </div>
            </div>

            {{-- Errors --}}
            @if ($errors->any())
                <div class="rounded-2xl border p-4">
                    <div class="font-medium">⚠️ {{ __('Revisa los campos:') }}</div>
                    <ul class="mt-2 list-disc pl-5 text-sm text-gray-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form --}}
            <form id="edit-user-form" action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Card: Resumen rápido --}}
                <div class="rounded-2xl border bg-white shadow-sm">
                    <div class="p-5">
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-full border text-sm font-semibold">
                                    {{ mb_strtoupper(mb_substr($user->name ?? 'U', 0, 1)) }}
                                </div>

                                <div class="min-w-0">
                                    <div class="font-semibold truncate">{{ $user->name }}</div>
                                    <div class="text-sm text-gray-500 truncate">{{ $user->email }}</div>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-2">
                                <span class="inline-flex items-center rounded-full border px-3 py-1 text-xs">
                                    {{ __('ID:') }} {{ $user->id }}
                                </span>

                                @php $roleNames = $user->getRoleNames(); @endphp
                                @if($roleNames->count())
                                    <span class="inline-flex items-center rounded-full border px-3 py-1 text-xs">
                                        {{ __('Roles:') }} {{ $roleNames->count() }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center rounded-full border px-3 py-1 text-xs">
                                        {{ __('Sin roles') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card: Datos del usuario --}}
                <div class="rounded-2xl border bg-white shadow-sm">
                    <div class="border-b p-5">
                        <h2 class="text-base font-semibold">{{ __('Datos del usuario') }}</h2>
                        <p class="mt-1 text-sm text-gray-500">
                            {{ __('Actualiza la información básica. Si cambias el email, verifica tu lógica de negocio (SSO/IdP).') }}
                        </p>
                    </div>

                    <div class="p-5">
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                            {{-- Nombre --}}
                            <div>
                                <label for="name" class="text-sm font-medium text-gray-700">
                                    {{ __('Nombre') }}
                                </label>
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="mt-2 w-full rounded-xl border px-3 py-2 text-sm"
                                    placeholder="{{ __('Nombre completo') }}"
                                    value="{{ old('name', $user->name) }}"
                                    required
                                    autocomplete="name"
                                >
                                @error('name')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div>
                                <label for="email" class="text-sm font-medium text-gray-700">
                                    {{ __('Correo electrónico') }}
                                </label>
                                <div class="mt-2 flex items-center gap-2">
                                    <input
                                        type="email"
                                        name="email"
                                        id="email"
                                        class="w-full rounded-xl border px-3 py-2 text-sm"
                                        placeholder="correo@ejemplo.com"
                                        value="{{ old('email', $user->email) }}"
                                        required
                                        autocomplete="email"
                                    >
                                    <button
                                        type="button"
                                        class="shrink-0 rounded-lg border px-3 py-2 text-xs font-medium hover:bg-gray-50"
                                        onclick="navigator.clipboard.writeText(@js($user->email));"
                                        title="{{ __('Copiar email actual') }}"
                                    >
                                        {{ __('Copiar') }}
                                    </button>
                                </div>
                                @error('email')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Password opcional --}}
                            <div class="md:col-span-2">
                                <label for="password" class="text-sm font-medium text-gray-700">
                                    {{ __('Contraseña (opcional)') }}
                                </label>
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="mt-2 w-full rounded-xl border px-3 py-2 text-sm"
                                    placeholder="{{ __('Deja en blanco para mantener la contraseña actual') }}"
                                    autocomplete="new-password"
                                >
                                <p class="mt-2 text-xs text-gray-500">
                                    {{ __('Si llenas este campo, se actualizará la contraseña del usuario.') }}
                                </p>
                                @error('password')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>

                {{-- Card: Roles --}}
                <div class="rounded-2xl border bg-white shadow-sm">
                    <div class="border-b p-5">
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h2 class="text-base font-semibold">{{ __('Roles') }}</h2>
                                <p class="mt-1 text-sm text-gray-500">
                                    {{ __('Asigna roles (recomendado). Los permisos pueden venir de aquí.') }}
                                </p>
                            </div>

                            <div class="w-full sm:w-72">
                                <input
                                    type="text"
                                    id="roleSearch"
                                    class="w-full rounded-xl border px-3 py-2 text-sm"
                                    placeholder="{{ __('Buscar rol…') }}"
                                    oninput="filterChecklist('roleSearch','rolesList')"
                                >
                            </div>
                        </div>
                    </div>

                    <div class="p-5">
                        <div id="rolesList" class="grid grid-cols-1 gap-2 md:grid-cols-2">
                            @foreach ($roles as $role)
                                @php
                                    $checked = in_array($role->name, old('roles', $user->getRoleNames()->toArray()));
                                @endphp

                                <label class="role-item flex items-center gap-3 rounded-xl border p-3 hover:bg-gray-50">
                                    <input
                                        type="checkbox"
                                        name="roles[]"
                                        value="{{ $role->name }}"
                                        class="h-4 w-4"
                                        {{ $checked ? 'checked' : '' }}
                                    >
                                    <div class="min-w-0">
                                        <div class="text-sm font-medium truncate">
                                            {{ ucfirst($role->name) }}
                                        </div>
                                        <div class="text-xs text-gray-500 truncate">
                                            {{ __('Rol') }}
                                        </div>
                                    </div>
                                </label>
                            @endforeach
                        </div>

                        @error('roles')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Card: Permisos --}}
                <div class="rounded-2xl border bg-white shadow-sm">
                    <div class="border-b p-5">
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h2 class="text-base font-semibold">{{ __('Permisos directos') }}</h2>
                                <p class="mt-1 text-sm text-gray-500">
                                    {{ __('Permisos asignados directamente al usuario (independientes de roles).') }}
                                </p>
                            </div>

                            <div class="w-full sm:w-72">
                                <input
                                    type="text"
                                    id="permSearch"
                                    class="w-full rounded-xl border px-3 py-2 text-sm"
                                    placeholder="{{ __('Buscar permiso…') }}"
                                    oninput="filterChecklist('permSearch','permsList')"
                                >
                            </div>
                        </div>
                    </div>

                    <div class="p-5">
                        <div id="permsList" class="grid grid-cols-1 gap-2 md:grid-cols-2">
                            @foreach ($permissions as $permission)
                                @php
                                    // Para editar es más seguro “persistir” lo que ya tiene el usuario
                                    // pero también respetar old() si hubo error de validación.
                                    $current = $user->getPermissionNames()->toArray();
                                    $checked = in_array($permission->name, old('permissions', $current));
                                @endphp

                                <label class="perm-item flex items-center gap-3 rounded-xl border p-3 hover:bg-gray-50">
                                    <input
                                        type="checkbox"
                                        name="permissions[]"
                                        value="{{ $permission->name }}"
                                        class="h-4 w-4"
                                        {{ $checked ? 'checked' : '' }}
                                    >
                                    <div class="min-w-0">
                                        <div class="text-sm font-medium truncate">
                                            {{ ucfirst($permission->name) }}
                                        </div>
                                        <div class="text-xs text-gray-500 truncate">
                                            {{ __('Permiso') }}
                                        </div>
                                    </div>
                                </label>
                            @endforeach
                        </div>

                        @error('permissions')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Footer actions --}}
                <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                    <a
                        href="{{ route('admin.users.index') }}"
                        class="inline-flex items-center justify-center rounded-lg border px-4 py-2 text-sm font-medium hover:bg-gray-50"
                    >
                        {{ __('Cancelar') }}
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-lg border px-4 py-2 text-sm font-medium hover:bg-gray-50"
                    >
                        ✅ {{ __('Guardar cambios') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- JS liviano para filtrar roles/permisos --}}
    <script>
        function filterChecklist(inputId, listId) {
            const input = document.getElementById(inputId);
            const filter = (input.value || '').toLowerCase().trim();
            const list = document.getElementById(listId);

            if (!list) return;

            const items = list.querySelectorAll('label');
            items.forEach(label => {
                const text = (label.innerText || '').toLowerCase();
                label.style.display = text.includes(filter) ? '' : 'none';
            });
        }
    </script>
</x-layouts.app>
