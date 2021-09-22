<div>
    <div class="card">

        <div class="card-header">
            <div class="input-group">
                <input wire:model="search" id="search" class="form-control border-end-0 border rounded-pill"
                    placeholder="Ingrese Número Solicitud">
                <span class="input-group-text bg-white border-bottom-0 border rounded-pill ms-n5" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
            </div>
        </div>

        @can('solicitud_propuestas.create')
            <div class="card-header">
                <td width="10px"> <a class="btn btn-primary" href="{{ route('solicitud_propuestas.create') }}">Crear</a>
                </td>
            </div>
        @endcan


        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    {{-- <caption>Lista de Normas</caption> --}}
                    <thead>
                        <tr>
                            <th scope="col">Número</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>



                        @foreach ($solicitud_propuestas as $solicitud_propuesta)

                            <tr>
                                <td>{{ $solicitud_propuesta->numero }}</td>
                                {{-- <td>{{ $solicitud_propuesta->name }}</td> --}}
                                @can('solicitud_propuestas.show')
                                    <td width="10px"> <a class="btn btn btn-info btn-sm"
                                            href="{{ route('solicitud_propuestas.show', $solicitud_propuesta->id) }}">Mostrar</a>
                                    </td>
                                @endcan
                                @can('solicitud_propuestas.edit')
                                    <td width="10px"> <a class="btn btn btn-secondary btn-sm"
                                            href="{{ route('solicitud_propuestas.edit', $solicitud_propuesta->id) }}">Editar</a>
                                    </td>
                                @endcan
                                {{-- <td width="10px">
                                    <form action="{{ route('solicitud_propuestas.destroy', $solicitud_propuesta->id) }}" method="POST">
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
            {{ $solicitud_propuestas->links() }}
        </div>
    </div>

</div>
