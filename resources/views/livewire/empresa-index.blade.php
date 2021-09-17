<div>
    <div class="card">
        
        <div class="card-header">
            <div class="input-group">
                <input wire:model="search" id="search" class="form-control border-end-0 border rounded-pill"
                    placeholder="Ingrese Razón Social o Número Cliente">
                <span class="input-group-text bg-white border-bottom-0 border rounded-pill ms-n5" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
            </div>
        </div>

        <div class="card-header">
            <td width="10px"> <a class="btn btn-primary" href="{{ route('empresas.create') }}">Crear</a></td>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    {{-- <caption>Lista de Normas</caption> --}}
                    <thead>
                        <tr>
                            <th scope="col">Razón Social</th>
                            <th scope="col">Nombre Comercial</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($empresas as $empresa)

                            <tr>
                                <td>{{ $empresa->razon_social }}</td>
                                <td>{{ $empresa->nombre_comercial }}</td>
                                <td width="10px"> <a class="btn btn btn-info btn-sm"
                                        href="{{ route('empresas.show', $empresa->id) }}">Mostrar</a></td>
                                <td width="10px"> <a class="btn btn btn-secondary btn-sm"
                                        href="{{ route('empresas.edit', $empresa->id) }}">Editar</a></td>
                                {{-- <td width="10px">
                                    <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST">
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
        {{$empresas-> links()}}
        </div>
    </div>

</div>
