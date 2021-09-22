<div>
    <div class="card">

        <div class="card-header">
            <div class="input-group">
                <input wire:model="search" id="search" class="form-control border-end-0 border rounded-pill"
                    placeholder="Ingrese Código Servicio">
                <span class="input-group-text bg-white border-bottom-0 border rounded-pill ms-n5" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
            </div>
        </div>

        @can('ordenes.create')
            <div class="card-header">
                <td width="10px"> <a class="btn btn-primary" href="{{ route('ordenes.create') }}">Crear</a></td>
            </div>
        @endcan

        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    {{-- <caption>Lista de Normas</caption> --}}
                    <thead>
                        <tr>
                            <th scope="col">Código Servicio</th>
                            <th scope="col">Fecha ALta</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($ordenes as $ordene)

                            <tr>
                                <td>{{ $ordene->codigo_servicio }}</td>
                                <td>{{ $ordene->created_at }}</td>
                                @can('ordenes.show')
                                    <td width="10px"> <a class="btn btn btn-info btn-sm"
                                            href="{{ route('ordenes.show', $ordene->id) }}">Mostrar</a></td>
                                @endcan
                                @can('ordenes.edit')
                                    <td width="10px"> <a class="btn btn btn-secondary btn-sm"
                                            href="{{ route('ordenes.edit', $ordene->id) }}">Editar</a></td>
                                @endcan
                                {{-- <td width="10px">
                                    <form action="{{ route('ordenees.destroy', $ordene->id) }}" method="POST">
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
            {{ $ordenes->links() }}
        </div>
    </div>

</div>
