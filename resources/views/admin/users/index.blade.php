<x-layouts.app :title="__('EduTips - Usuarios')">

    <div class="flex flex-col items-center w-full gap-8 p-6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <b>Usuario</b>
                            <a href="{{ route('admin.users.create') }}">Nuevo usuario</a>
                        </div>
                        <div class="card-body">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Roles</th>
                                        <th>Email</th>
                                        <th>Permisos</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $users)
                                        <tr>
                                            <td>{{ $users->name }}</td>
                                            <td>{{ implode(', ', $users->getRoleNames()->toArray()) }}</td>
                                            <td>{{ $users->email }}</td>
                                            <td>{{ implode(', ', $users->getPermissionNames()->toArray()) }}</td>
                                            <td>
                                                <a href="{{ route('admin.users.edit', $users) }}">Editar</a>
                                                <form action="{{ route('admin.users.destroy', $users->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        onclick="return confirm('¿Seguro que desea eliminar este usuario?')"
                                                        class="btn btn-danger btn-sm">
                                                        Eliminar
                                                    </button>
                                                </form>


                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>

            </div>


        </div>



    </div>


</x-layouts.app>
