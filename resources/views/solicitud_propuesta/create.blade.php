@extends('adminlte::page')

@section('title', 'Enviar Solicitud Propuesta')

@section('content_header')
    <h1>Crear Solicitud Propuesta</h1>
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

    
    {{ Form::open(array('route' => 'solicitud_propuestas.store', 'files' => true)) }}

    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="form-group">
            {!! Form::label('empresa_id ', 'Empresa') !!}
            {!! Form::select('empresa_id', $empresas, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una Empresa']) !!}
        </div>

        @error('empresa_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        
    </div>

    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

        <div class="form-group">
            {!! Form::label('norma_id', 'Norma') !!}
            {!! Form::select('norma_id', $normas, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una Norma']) !!}
        </div>

        @error('norma_id ')
            <span class="text-danger">{{ $message }}</span>
        @enderror

    </div>

    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

        <div class="form-group">
            {!! Form::label('verificacion_tipo_id', 'Tipo Verificación') !!}
            {!! Form::select('verificacion_tipo_id', $verificacion_tipos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un Tipo de Verificación']) !!}
        </div>

        @error('verificacion_tipo_id')
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

    <br>

    {!! Form::submit('Crear Tipo Verificación', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
