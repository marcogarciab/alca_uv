@extends('adminlte::page')

@section('title', 'Mostrar Órdenes de Servicios')

@section('content_header')
    <h1>Mostrar Orden</h1>
@stop

@section('content')

    {!! Form::model($acta, ['route' => ['actas.index', $acta], 'method' => 'get', 'files' => true]) !!}

    <div class="card h-100">
        <div class="card-body">
            <div class="row gutters">

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('numero', 'Número Servicio') !!}
                        {!! Form::number('numero', null, ['class' => 'form-control', 'placeholder' => 'Inserte Número Servicio', 'disabled']) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('created_at', 'Fecha de creación') !!}
                        {!! Form::date('created_at', $acta->created_at, ['class' => 'form-control', 'disabled']) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('updated_at', 'Fecha de Actualización') !!}
                        {!! Form::date('updated_at', $acta->updated_at, ['class' => 'form-control', 'disabled']) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="form-group">
                        {!! Form::label('ordene_id', 'Orden de Servicio') !!}
                        {!! Form::select('ordene_id', $ordenes, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Orden Servicio', 'disabled']) !!}
                    </div>

                    @error('solicitud_propuesta_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('alcance_verificacion', 'Alcance Verificación') !!}
                        {!! Form::textArea('alcance_verificacion', null, ['rows' => '3', 'class' => 'form-control', 'placeholder' => 'Inserte Alcance de Verificación', 'disabled']) !!}
                    </div>

                    @error('alcance_verificacion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('hechos_verificacion', 'Hechos Verificación') !!}
                        {!! Form::textArea('hechos_verificacion', null, ['rows' => '3', 'class' => 'form-control', 'placeholder' => 'Inserte Hechos de Verificación', 'disabled']) !!}
                    </div>

                    @error('alcance_verificacion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('es_modifica_alcance', '¿Modifica Alcance?') !!}
                        {!! Form::checkbox('es_modifica_alcance', null, $acta->es_modifica_alcance) !!}                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('es_no_conformidad', '¿Existe NO Conformidad?') !!}
                        {!! Form::checkbox('es_no_conformidad', null, $acta->es_no_conformidad) !!}
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('descripcion_no_conformidad', 'Descripción NO Conformidad Verificación') !!}
                        {!! Form::textArea('descripcion_no_conformidad', null, ['rows' => '3', 'class' => 'form-control', 'placeholder' => 'Inserte NO Conformidad de Verificación', 'disabled']) !!}
                    </div>

                    @error('descripcion_no_conformidad')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('descripcion_accion_correctiva', 'Acción Correctiva') !!}
                        {!! Form::textArea('descripcion_accion_correctiva', null, ['rows' => '3', 'class' => 'form-control', 'placeholder' => 'Inserte Acción Correctiva', 'disabled']) !!}
                    </div>

                    @error('descripcion_accion_correctiva')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('observaciones_protesta', 'Observaciones Protesta') !!}
                        {!! Form::textArea('observaciones_protesta', null, ['rows' => '3', 'class' => 'form-control', 'placeholder' => 'Inserte Observaciones Protesta CLiente', 'disabled']) !!}
                    </div>

                    @error('observaciones_protesta')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('observaciones_representante', 'Observaciones Representante') !!}
                        {!! Form::textArea('observaciones_representante', null, ['rows' => '3', 'class' => 'form-control', 'placeholder' => 'Inserte Observaciones Representante', 'disabled']) !!}
                    </div>

                    @error('observaciones_representante')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('fecha_fin', 'Fecha de FIN Verificación') !!}
                        {!! Form::date('fecha_fin', $acta->fecha_fin, ['class' => 'form-control', 'disabled']) !!}
                    </div>
                </div>


                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="form-group">
                        {!! Form::label('path', 'Path') !!}
                        {!! Form::file('path', ['class' => 'form-control', 'disabled']) !!}
                    </div>

                    @error('path')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

            </div>
            <a class="btn btn-secondary btn-lg" href="{{ $url }}" role="button">Mostrar Documento</a>
            {!! Form::submit('Regresar', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>


    <br>


    <br>

@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('{!! $url !!}');
    </script>
@stop
