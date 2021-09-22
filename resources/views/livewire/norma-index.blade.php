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
        @can('normas.create')
            <div class="card-header">
                <td width="10px"> <a class="btn btn-primary" href="{{ route('normas.create') }}">Crear</a></td>
            </div>
        @endcan


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

                        @foreach ($normas as $norma)

                            <tr>
                                <td>{{ $norma->nombre }}</td>
                                <td>{{ $norma->descripcion }}</td>
                                @can('normas.show')
                                    <td width="10px"> <a class="btn btn btn-info btn-sm"
                                            href="{{ route('normas.show', $norma->id) }}">Mostrar</a></td>
                                @endcan
                                @can('normas.edit')
                                    <td width="10px"> <a class="btn btn btn-secondary btn-sm"
                                            href="{{ route('normas.edit', $norma->id) }}">Editar</a></td>
                                @endcan
                                {{-- <td width="10px">
                                    <form action="{{ route('normas.destroy', $norma->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                    
                                    
                                </td> --}}
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
            {{ $normas->links() }}
        </div>
    </div>

</div>
