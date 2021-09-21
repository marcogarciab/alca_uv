<div>
    <div class="card">
        
        <div class="card-header">
            <div class="input-group">
                <input wire:model="search" id="search" class="form-control border-end-0 border rounded-pill"
                    placeholder="Ingrese Nombre o Serial Certificado Verificador">
                <span class="input-group-text bg-white border-bottom-0 border rounded-pill ms-n5" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
            </div>
        </div>

        <div class="card-header">
            <td width="10px"> <a class="btn btn-primary" href="{{ route('verificadores.create') }}">Crear</a></td>
        </div>        
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    {{-- <caption>Lista de Normas</caption> --}}
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th colspan="2">Certificado</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($verificadore as $verificador)

                        <tr>
                            <td>{{ $verificador->nombre }}</td>
                            <td>{{ $verificador->serial_certificacion }}</td>
                            <td width="10px"> <a class="btn btn btn-info btn-sm"
                                    href="{{ route('verificadores.show', $verificador->id) }}">Mostrar</a></td>
                            <td width="10px"> <a class="btn btn btn-secondary btn-sm"
                                    href="{{ route('verificadores.edit', $verificador->id) }}">Editar</a></td>
                            <td width="10px">
                                <form action="{{ route('verificadores.destroy', $verificador->id) }}" method="POST">
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
        {{$verificadore-> links()}}
        </div>
    </div>

</div>
