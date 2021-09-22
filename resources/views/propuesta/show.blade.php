@extends('adminlte::page')

@section('title', 'Mostrar Propuestas')

@section('content_header')
    <h1>Mostrar Propuestas de Servicios.</h1>
@stop

@section('content')

    {!! Form::model($propuesta, ['route' => ['propuestas.index', $propuesta], 'method' => 'get', 'files' => true]) !!}


    <div class="card h-100">
        <div class="card-body">
            <div class="row gutters">


                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('numero_control', 'Número Control') !!}
                        {!! Form::number('numero_control', null, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                    </div>
                </div>
    
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('created_at', 'Fecha de creación') !!}
                        {!! Form::date('created_at', $propuesta->created_at, ['class' => 'form-control', 'disabled']) !!}
                    </div>
                </div>
    
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('updated_at', 'Fecha de Actualización') !!}
                        {!! Form::date('updated_at', $propuesta->updated_at, ['class' => 'form-control', 'disabled']) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('costo', 'Costo') !!}
                        {!! Form::number('costo', null, ['class' => 'form-control', 'placeholder' => 'Inserte Costo', 'disabled']) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('solicitud_propuesta_id ', 'Solicitud a Atender') !!}
                        {!! Form::select('solicitud_propuesta_id', $solicitud_propuestas, $propuesta->solicitud_propuesta_id, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                    </div>

                    @error('solicitud_propuesta_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="form-group">
                        {!! Form::label('verificadore_id', 'Verificador que revisó') !!}
                        {!! Form::select('verificadore_id', $verificadores, $propuesta->verificadore_id, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                    </div>

                    @error('verificadore_id ')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('es_aceptada', '¿Es Aprobada?') !!}
                        {!! Form::checkbox('es_aceptada', null, $propuesta->es_aceptada) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('fecha_aceptacion', 'Fecha de aceptación') !!}
                        {!! Form::date('fecha_aceptacion', $propuesta->fecha_aceptacion, ['class' => 'form-control','disabled']) !!}
                    </div>
                </div>

            </div>

            <a class="btn btn-secondary btn-lg" href="{{ $url }}" role="button">Mostrar Documento</a>
            {!! Form::submit('Regresar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
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
