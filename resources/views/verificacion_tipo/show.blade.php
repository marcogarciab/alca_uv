@extends('adminlte::page')

@section('title', 'Mostrar Tipos Verificación')

@section('content_header')
    <h1>Mostrar Tipos Verificación.</h1>
@stop

@section('content')

{!! Form::model($verificacion_tipo, ['route' => ['verificacion_tipos.index', $verificacion_tipo], 'method' => 'get']) !!}

    <div class="form-group">
        {!! Form::label('nombre', 'Nombre Tipos Verificación') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Inserte Nombre de Tipos Verificación','disabled']) !!}
    </div>

    @error('nombre')
        <span class="text-danger">{{ $message }}</span>
    @enderror

    <br>

    {!! Form::submit('Regresar', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop