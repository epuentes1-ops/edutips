<x-layouts.app :title="__('EduTips - Usuarios')">

    <div class="flex flex-col items-center w-full gap-8 p-6">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="card shadow-lg">
                        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                            <h5 class="mb-0">Registrar nuevo usuario</h5>
                            <div>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-light btn-sm me-2">Ver Usuarios</a>
                                <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                            </div>
                        </div>

                        <div class="card-body">
                            {{-- Datos del usuario --}}
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">Nombre:</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       placeholder="Nombre completo" value="{{ old('name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Correo electrónico:</label>
                                <input type="email" name="email" id="email" class="form-control"
                                       placeholder="correo@ejemplo.com" value="{{ old('email') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label fw-bold">Contraseña:</label>
                                <input type="password" name="password" id="password" class="form-control"
                                       placeholder="Contraseña segura" required>
                            </div>

                            {{-- Roles --}}
                            <div class="mb-4">
                                <p class="fw-bold text-primary">Roles disponibles</p>
                                <div class="row">
                                    @foreach ($roles as $role)
                                        <div class="col-md-6 mb-2">
                                            <div class="form-check">
                                                <input type="checkbox" name="roles[]" value="{{ $role->name }}"
                                                       id="role_{{ $role->id }}" class="form-check-input"
                                                       {{ in_array($role->name, old('roles', [])) ? 'checked' : '' }}>
                                                <label for="role_{{ $role->id }}" class="form-check-label">
                                                    {{ ucfirst($role->name) }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Permisos --}}
                            <div class="mb-4">
                                <p class="fw-bold text-primary">Permisos disponibles</p>
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        <div class="col-md-6 mb-2">
                                            <div class="form-check">
                                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                                       id="permission_{{ $permission->id }}" class="form-check-input"
                                                       {{ in_array($permission->name, old('permissions', [])) ? 'checked' : '' }}>
                                                <label for="permission_{{ $permission->id }}" class="form-check-label">
                                                    {{ ucfirst($permission->name) }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div> {{-- card-body --}}
                    </div> {{-- card --}}
                </form>
            </div>
        </div>
    </div>
</div>



</x-layouts.app>
