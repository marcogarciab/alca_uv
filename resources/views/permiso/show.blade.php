@extends('adminlte::page')

@section('title', 'Mostrar Permiso')

@section('content_header')
    <h1>Mostrar Permiso</h1>
@stop

@section('content')

    {!! Form::model($permiso, ['route' => ['permisos.index', $permiso], 'method' => 'get']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nombre Permiso') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Inserte Nombre de Permiso', 'disabled']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Descripción Permiso') !!}
        {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Inserte Descripción de Permiso', 'disabled']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('guard_name', 'Nombre Guardia') !!}
        {!! Form::text('guard_name', 'web', ['class' => 'form-control', 'disabled']) !!}
    </div>

    <br>

    {!! Form::submit('Regresar', ['class' => 'btn btn-primary']) !!}

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
