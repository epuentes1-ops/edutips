<x-layouts.app :title="__('EduTips - Usuarios')">
    @include('partials.adminusers-heading')

    <div class="w-full p-6">
        <div class="mx-auto w-full max-w-5xl space-y-6">

            {{-- Header --}}
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-xl font-semibold">{{ __('Registrar nuevo usuario') }}</h1>
                    <p class="text-sm text-gray-500">
                        {{ __('Crea el usuario y asigna roles y/o permisos directos.') }}
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
                        form="create-user-form"
                        type="submit"
                        class="inline-flex items-center rounded-lg border px-4 py-2 text-sm font-medium hover:bg-gray-50"
                    >
                        ✅ {{ __('Guardar') }}
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
            <form id="create-user-form" action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Card: Datos --}}
                <div class="rounded-2xl border bg-white shadow-sm">
                    <div class="border-b p-5">
                        <h2 class="text-base font-semibold">{{ __('Datos del usuario') }}</h2>
                        <p class="mt-1 text-sm text-gray-500">
                            {{ __('Completa la información básica para el acceso.') }}
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
                                    value="{{ old('name') }}"
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
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="mt-2 w-full rounded-xl border px-3 py-2 text-sm"
                                    placeholder="correo@ejemplo.com"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                >
                                @error('email')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="md:col-span-2">
                                <label for="password" class="text-sm font-medium text-gray-700">
                                    {{ __('Contraseña') }}
                                </label>
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="mt-2 w-full rounded-xl border px-3 py-2 text-sm"
                                    placeholder="{{ __('Contraseña segura') }}"
                                    required
                                    autocomplete="new-password"
                                >
                                <p class="mt-2 text-xs text-gray-500">
                                    {{ __('Tip: usa una contraseña robusta o genera una desde un gestor.') }}
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
                                    {{ __('Asigna uno o más roles (recomendado).') }}
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
                                <label class="role-item flex items-center gap-3 rounded-xl border p-3 hover:bg-gray-50">
                                    <input
                                        type="checkbox"
                                        name="roles[]"
                                        value="{{ $role->name }}"
                                        class="h-4 w-4"
                                        {{ in_array($role->name, old('roles', [])) ? 'checked' : '' }}
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
                                    {{ __('Úsalos solo si necesitas permisos específicos fuera de los roles.') }}
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
                                <label class="perm-item flex items-center gap-3 rounded-xl border p-3 hover:bg-gray-50">
                                    <input
                                        type="checkbox"
                                        name="permissions[]"
                                        value="{{ $permission->name }}"
                                        class="h-4 w-4"
                                        {{ in_array($permission->name, old('permissions', [])) ? 'checked' : '' }}
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
                        ✅ {{ __('Guardar usuario') }}
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
