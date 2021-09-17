@extends('adminlte::page')

@section('title', 'Crear Tipo Verificación')

@section('content_header')
    <h1>Crear Tipo Verificación</h1>
@stop

@section('content')

    {!! Form::open(['route' => 'verificacion_tipos.store']) !!}

    <div class="form-group">
        {!! Form::label('nombre', 'Nombre Tipo Verificación') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Inserte Nombre de Tipo Verificación']) !!}
    </div>

    @error('nombre')
        <span class="text-danger">{{ $message }}</span>
    @enderror

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
