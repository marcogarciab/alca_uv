@extends('adminlte::page')

@section('title', 'Crear Norma')

@section('content_header')
    <h1>Crear Norma</h1>
@stop

@section('content')

    {!! Form::open(['route' => 'normas.store']) !!}

    <div class="form-group">
        {!! Form::label('nombre', 'Nombre Norma') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Inserte Nombre de Norma']) !!}
    </div>

    @error('nombre')
        <span class="text-danger">{{ $message }}</span>
    @enderror

    <div class="form-group">
        {!! Form::label('descripcion', 'Descripción Norma') !!}
        {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Inserte Descripción de Norma']) !!}
    </div>

    @error('descripcion')
        <span class="text-danger">{{ $message }}</span>
    @enderror

    <br>

    {!! Form::submit('Crear Norma', ['class' => 'btn btn-primary']) !!}

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
