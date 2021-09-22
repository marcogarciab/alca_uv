<div>
    <div class="card">

        <div class="card-header">
            <div class="input-group">
                <input wire:model="search" id="search" class="form-control border-end-0 border rounded-pill"
                    placeholder="Ingrese Nombre">
                <span class="input-group-text bg-white border-bottom-0 border rounded-pill ms-n5" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
            </div>
        </div>

        @can('roles.create')
            <div class="card-header">
                <td width="10px"> <a class="btn btn-primary" href="{{ route('roles.create') }}">Crear</a></td>
            </div>
        @endcan


        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    {{-- <caption>Lista de Normas</caption> --}}
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($roles as $role)

                            <tr>
                                <td>{{ $role->name }}</td>
                                @can('roles.show')
                                    <td width="10px"> <a class="btn btn btn-info btn-sm"
                                            href="{{ route('roles.show', $role->id) }}">Mostrar</a></td>
                                @endcan

                                @can('roles.edit')
                                    <td width="10px"> <a class="btn btn btn-secondary btn-sm" @endcan @can('roles.create')
                                            href="{{ route('roles.edit', $role->id) }}">Editar</a>
                                    </td>
                                @endcan

                                @can('roles.create')
                                    <td width="10px">
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                @endcan
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
            {{ $roles->links() }}
        </div>
    </div>

</div>
