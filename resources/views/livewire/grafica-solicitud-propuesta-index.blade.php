<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Análisis Solicitudes
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>


            {!! Form::open(['route' => ['grafica_solicitud_propuestas.index'], 'method' => 'put']) !!}
            <div class="modal-body">

                <div>
                    <div class="form-group">
                        {!! Form::label('year ', 'Año') !!}
                        {!! Form::selectRange('year', 2015, 2021,null, ['class' => 'form-control', 'placeholder' => 'Ver']) !!}
                    </div>
                </div>
            

                <div>
                    <div class="form-group">
                        {!! Form::label('tipo ', 'Ver por') !!}
                        {!! Form::select('tipo', $tipos, null, ['class' => 'form-control', 'placeholder' => 'Ver']) !!}
                    </div>
                </div>

                <div>
                    <div class="form-group">
                        {!! Form::label('empresa_id ', 'Empresa') !!}
                        {!! Form::select('empresa_id', $empresas, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una Empresa']) !!}
                    </div>
                </div>
                <br>

                {!! Form::submit('Editar Permiso', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}

            </div>

        </div>
    </div>
</div>
