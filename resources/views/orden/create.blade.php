@extends('adminlte::page')

@section('title', 'Órdenes Servicio')

@section('content_header')
    <h1>Crear Orden Servicio</h1>
@stop

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::open(array('route' => 'ordenes.store', 'files' => true)) }}

    <div class="card h-100">
        <div class="card-body">
            <div class="row gutters">


                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('codigo_servicio', 'Código Servicio') !!}
                        {!! Form::number('codigo_servicio', null, ['class' => 'form-control', 'placeholder' => 'Inserte Código Servicio']) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('created_at', 'Fecha de creación') !!}
                        {!! Form::date('created_at', null, ['class' => 'form-control','disabled']) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('updated_at', 'Fecha de Actualización') !!}
                        {!! Form::date('updated_at', null, ['class' => 'form-control','disabled']) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="form-group">
                        {!! Form::label('propuesta_id', 'Propuesta') !!}
                        {!! Form::select('propuesta_id', $propuestas, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Solicitud Propuesta a Atender']) !!}
                    </div>
                
                    @error('solicitud_propuesta_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                
                </div>


                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="form-group">
                        {!! Form::label('verificadore_id', 'Verificador que realiza Verificación') !!}
                        {!! Form::select('verificadore_id', $verificadores, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Verificador que revisó propuesta']) !!}
                    </div>
                
                    @error('verificadore_id ')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('fecha_verificacion', 'Fecha de Verificación') !!}
                        {!! Form::date('fecha_verificacion', null, ['class' => 'form-control']) !!}
                    </div>
                </div>


                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="form-group">
                        {!! Form::label('path', 'Path') !!}
                        {!! Form::file('path', ['class' => 'form-control']) !!}
                    </div>
                
                    @error('path')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                
                </div>
            </div>

            {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}

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
        console.log('Hi!');
    </script>
@stop
