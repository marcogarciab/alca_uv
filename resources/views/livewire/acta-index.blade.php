<div>
    <div class="card">

        <div class="card-header">
            <div class="input-group">
                <input wire:model="search" id="search" class="form-control border-end-0 border rounded-pill"
                    placeholder="Ingrese Numero Acta">
                <span class="input-group-text bg-white border-bottom-0 border rounded-pill ms-n5" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
            </div>
        </div>

        @can('actas.create')
            <div class="card-header">
                <td width="10px"> <a class="btn btn-primary" href="{{ route('actas.create') }}">Crear</a></td>
            </div>
        @endcan


        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    {{-- <caption>Lista de Normas</caption> --}}
                    <thead>
                        <tr>
                            <th scope="col">Número</th>
                            <th scope="col">Fecha Alta</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($actas as $acta)

                            <tr>
                                <td>{{ $acta->numero }}</td>
                                <td>{{ $acta->created_at }}</td>
                                @can('actas.show')
                                    <td width="10px"> <a class="btn btn btn-info btn-sm"
                                            href="{{ route('actas.show', $acta->id) }}">Mostrar</a></td>
                                @endcan

                                @can('actas.edit')
                                    <td width="10px"> <a class="btn btn btn-secondary btn-sm"
                                            href="{{ route('actas.edit', $acta->id) }}">Editar</a></td>
                                @endcan

                                {{-- <td width="10px">
                                    <form action="{{ route('actas.destroy', $acta->id) }}" method="POST">
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
            {{ $actas->links() }}
        </div>
    </div>

</div>
