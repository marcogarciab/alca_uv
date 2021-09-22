<div>
    <div class="card">

        <div class="card-header">
            <div class="input-group">
                <input wire:model="search" id="search" class="form-control border-end-0 border rounded-pill"
                    placeholder="Ingrese Número de Dictamen">
                <span class="input-group-text bg-white border-bottom-0 border rounded-pill ms-n5" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
            </div>
        </div>


        @can('dictamenes.create')
            <div class="card-header">
                <td width="10px"> <a class="btn btn-primary" href="{{ route('dictamenes.create') }}">Crear</a></td>
            </div>
        @endcan


        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    {{-- <caption>Lista de Normas</caption> --}}
                    <thead>
                        <tr>
                            <th scope="col">Número</th>
                            <th colspan="2">Fecha Alta</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($dictamenes as $dictamen)

                            <tr>
                                <td>{{ $dictamen->numero }}</td>
                                <td>{{ $dictamen->created_at }}</td>

                                @can('dictamenes.show')
                                    <td width="10px"> <a class="btn btn btn-info btn-sm"
                                            href="{{ route('dictamenes.show', $dictamen->id) }}">Mostrar</a></td>
                                @endcan


                                @can('dictamenes.edit')
                                    <td width="10px"> <a class="btn btn btn-secondary btn-sm"
                                            href="{{ route('dictamenes.edit', $dictamen->id) }}">Editar</a></td>
                                @endcan

                                {{-- <td width="10px">
                                <form action="{{ route('dictamenes.destroy', $dictamen->id) }}" method="POST">
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
            {{ $dictamenes->links() }}
        </div>
    </div>

</div>
