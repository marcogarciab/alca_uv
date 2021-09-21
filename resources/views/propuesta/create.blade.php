@extends('adminlte::page')

@section('title', 'Enviar Propuestas')

@section('content_header')
    <h1>Crear Propuestas</h1>
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

    {{ Form::open(array('route' => 'propuestas.store', 'files' => true)) }}

    <div class="card h-100">
        <div class="card-body">
            <div class="row gutters">


                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('numero_control', 'Número Control') !!}
                        {!! Form::number('numero_control', null, ['class' => 'form-control', 'placeholder' => 'Inserte Numero']) !!}
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
                        {!! Form::label('costo', 'Costo') !!}
                        {!! Form::number('costo', null, ['class' => 'form-control', 'placeholder' => 'Inserte Costo']) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('es_aceptada', '¿Acepta la Propuesta?') !!}
                        <div>{!! Form::checkbox('es_aceptada', null, ['class' => 'form-control', 'placeholder' => 'Seleccione Solicitud Propuesta a Atender']) !!}</div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('fecha_aceptacion', 'Fecha de aceptación') !!}
                        {!! Form::date('fecha_aceptacion', null, ['class' => 'form-control','disabled']) !!}
                    </div>
                </div>

               
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="form-group">
                        {!! Form::label('solicitud_propuesta_id', 'Solicitud a Atender') !!}
                        {!! Form::select('solicitud_propuesta_id', $solicitud_propuestas, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Solicitud Propuesta a Atender']) !!}
                    </div>
                
                    @error('solicitud_propuesta_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                
                </div>


                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="form-group">
                        {!! Form::label('verificadore_id', 'Verificador que Revisó Propuesta') !!}
                        {!! Form::select('verificadore_id', $verificadores, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Verificador que revisó propuesta']) !!}
                    </div>
                
                    @error('verificadore_id ')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                
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
                
               
                {!! Form::submit('Crear Propuesta', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}
                
            </div>
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
