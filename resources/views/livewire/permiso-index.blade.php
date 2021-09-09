<div>
    <div class="card">
        
        <div class="card-header">
            <div class="input-group">
                <input wire:model="search" id="search" class="form-control border-end-0 border rounded-pill"
                    placeholder="Ingrese Nombre o Descripción">
                <span class="input-group-text bg-white border-bottom-0 border rounded-pill ms-n5" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
            </div>
        </div>

        <div class="card-header">
            <td width="10px"> <a class="btn btn-primary" href="{{ route('permisos.create') }}">Crear</a></td>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    {{-- <caption>Lista de Normas</caption> --}}
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($permisos as $permiso)

                            <tr>
                                <td>{{ $permiso->name }}</td>
                                <td>{{ $permiso->description }}</td>
                                <td width="10px"> <a class="btn btn btn-info btn-sm"
                                        href="{{ route('permisos.show', $permiso->id) }}">Mostrar</a></td>
                                <td width="10px"> <a class="btn btn btn-secondary btn-sm"
                                        href="{{ route('permisos.edit', $permiso->id) }}">Editar</a></td>
                                <td width="10px">
                                    <form action="{{ route('permisos.destroy', $permiso->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                    
                                    
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
        {{$permisos-> links()}}
        </div>
    </div>

</div>
