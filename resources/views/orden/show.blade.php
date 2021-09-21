@extends('adminlte::page')

@section('title', 'Mostrar Órdenes de Servicios')

@section('content_header')
    <h1>Mostrar Orden</h1>
@stop

@section('content')

    {!! Form::model($ordene, ['route' => ['ordenes.index', $ordene], 'method' => 'get', 'files' => true]) !!}
    <div class="card h-100">
        <div class="card-body">
            <div class="row gutters">


                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('codigo_servicio', 'Código Servicio') !!}
                        {!! Form::number('codigo_servicio', null, ['class' => 'form-control', 'placeholder' => 'Inserte Código Servicio','disabled']) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('created_at', 'Fecha de creación') !!}
                        {!! Form::date('created_at', $ordene->created_at, ['class' => 'form-control','disabled']) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('updated_at', 'Fecha de Actualización') !!}
                        {!! Form::date('updated_at', $ordene->updated_at, ['class' => 'form-control','disabled']) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="form-group">
                        {!! Form::label('propuesta_id', 'Propuesta') !!}
                        {!! Form::select('propuesta_id', $propuestas, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Solicitud Propuesta a Atender','disabled']) !!}
                    </div>
                
                    @error('solicitud_propuesta_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                
                </div>


                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="form-group">
                        {!! Form::label('verificadore_id', 'Verificador que realiza Verificación') !!}
                        {!! Form::select('verificadore_id', $verificadores, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Verificador que revisó propuesta','disabled']) !!}
                    </div>
                
                    @error('verificadore_id ')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('fecha_verificacion', 'Fecha de Verificación') !!}
                        {!! Form::date('fecha_verificacion', $ordene->fecha_verificacion, ['class' => 'form-control','disabled']) !!}
                    </div>
                </div>


                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="form-group">
                        {!! Form::label('path', 'Path') !!}
                        {!! Form::file('path', ['class' => 'form-control','disabled']) !!}
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
