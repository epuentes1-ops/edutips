{{-- <section class="w-full">
    @include('partials.adminusers-heading') --}}

    <x-layouts.app :title="__('EduTips - Usuarios')">
        @include('partials.adminusers-heading')
        <div class="w-full p-6">
            <div class="mx-auto w-full max-w-6xl space-y-6">

                {{-- Header --}}
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h1 class="text-xl font-semibold">{{ __('Usuarios') }}</h1>
                        <p class="text-sm text-gray-500">
                            {{ __('Visualiza usuarios, roles, permisos y administra acciones.') }}
                        </p>
                    </div>

                    <div class="flex items-center gap-2">
                        <a
                            href="{{ route('admin.users.create') }}"
                            class="inline-flex items-center rounded-lg border px-4 py-2 text-sm font-medium hover:bg-gray-50"
                        >
                            + {{ __('Nuevo usuario') }}
                        </a>
                    </div>
                </div>

                {{-- Alerts --}}
                @if (session('success'))
                    <div class="rounded-xl border p-4 text-sm">
                        ✅ {{ session('success') }}
                    </div>
                @endif

                {{-- Table card --}}
                <div class="rounded-2xl border bg-white shadow-sm">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="border-b bg-gray-50 text-gray-600">
                                <tr>
                                    <th class="px-4 py-3">{{ __('Nombre') }}</th>
                                    <th class="px-4 py-3">{{ __('Email') }}</th>
                                    <th class="px-4 py-3">{{ __('Roles') }}</th>
                                    <th class="px-4 py-3">{{ __('Permisos') }}</th>
                                    <th class="px-4 py-3 text-right">{{ __('Acciones') }}</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y">
                                @forelse ($users as $user)
                                    <tr class="hover:bg-gray-50/50">
                                        {{-- Nombre --}}
                                        <td class="px-4 py-3">
                                            <div class="flex items-center gap-3">
                                                {{-- “Avatar” con inicial --}}
                                                <div class="flex h-9 w-9 items-center justify-center rounded-full border text-xs font-semibold">
                                                    {{ mb_strtoupper(mb_substr($user->name ?? 'U', 0, 1)) }}
                                                </div>

                                                <div class="min-w-0">
                                                    <div class="font-medium text-gray-900 truncate">
                                                        {{ $user->name }}
                                                    </div>
                                                    <div class="text-xs text-gray-500">
                                                        {{ __('ID:') }} {{ $user->id }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        {{-- Email --}}
                                        <td class="px-4 py-3">
                                            <div class="flex items-center justify-between gap-3">
                                                <span class="truncate">{{ $user->email }}</span>

                                                <button
                                                    type="button"
                                                    class="rounded-md border px-2 py-1 text-xs hover:bg-gray-50"
                                                    onclick="navigator.clipboard.writeText(@js($user->email));"
                                                    title="{{ __('Copiar email') }}"
                                                >
                                                    {{ __('Copiar') }}
                                                </button>
                                            </div>
                                        </td>

                                        {{-- Roles --}}
                                        <td class="px-4 py-3">
                                            @php
                                                $roles = $user->getRoleNames();
                                            @endphp

                                            @if($roles->count())
                                                <div class="flex flex-wrap gap-1">
                                                    @foreach ($roles as $role)
                                                        <span class="inline-flex items-center rounded-full border px-2 py-0.5 text-xs">
                                                            {{ $role }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            @else
                                                <span class="text-xs text-gray-500">
                                                    {{ __('Sin roles') }}
                                                </span>
                                            @endif
                                        </td>

                                        {{-- Permisos --}}
                                        <td class="px-4 py-3">
                                            @php
                                                $perms = $user->getPermissionNames();
                                            @endphp

                                            @if($perms->count())
                                                <details class="group">
                                                    <summary class="cursor-pointer select-none text-xs text-gray-600 hover:text-gray-900">
                                                        {{ __('Ver permisos') }} ({{ $perms->count() }})
                                                    </summary>

                                                    <div class="mt-2 flex flex-wrap gap-1">
                                                        @foreach ($perms as $perm)
                                                            <span class="inline-flex items-center rounded-full border px-2 py-0.5 text-xs">
                                                                {{ $perm }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                </details>
                                            @else
                                                <span class="text-xs text-gray-500">
                                                    {{ __('Sin permisos directos') }}
                                                </span>
                                            @endif
                                        </td>

                                        {{-- Acciones --}}
                                        <td class="px-4 py-3">
                                            <div class="flex items-center justify-end gap-2">
                                                <a
                                                    href="{{ route('admin.users.edit', $user) }}"
                                                    class="rounded-lg border px-3 py-2 text-xs font-medium hover:bg-gray-50"
                                                >
                                                    ✏️ {{ __('Editar') }}
                                                </a>

                                                <form
                                                    action="{{ route('admin.users.destroy', $user->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('¿Seguro que desea eliminar a este usuario? Esta acción no se puede deshacer.')"
                                                >
                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="rounded-lg border px-3 py-2 text-xs font-medium hover:bg-gray-50"
                                                    >
                                                        🗑️ {{ __('Eliminar') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-4 py-8 text-center text-sm text-gray-500" colspan="5">
                                            {{ __('No hay usuarios para mostrar.') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    
                </div>

            </div>
        </div>
    </x-layouts.app>
{{-- </section> --}}
