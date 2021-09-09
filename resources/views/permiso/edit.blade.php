@extends('adminlte::page')

@section('title', 'Editar Permiso')

@section('content_header')
    <h1>Editar Permiso</h1>
@stop

@section('content')

{!! Form::model($permiso,['route' => ['permisos.update', $permiso], 'method' => 'put']) !!}


<div class="form-group">
    {!! Form::label('name', 'Nombre Permiso') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Inserte Nombre de Permiso']) !!}
</div>

@error('name')
<span class="text-danger">{{ $message }}</span>
@enderror

<div class="form-group">
{!! Form::label('description', 'Descripción Permiso') !!}
{!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Inserte Descripción de Permiso']) !!}
</div>

@error('description')
<span class="text-danger">{{ $message }}</span>
@enderror

<div class="form-group">
{!! Form::label('guard_name', 'Nombre Guardia') !!}
{!! Form::text('guard_name', 'web', ['class' => 'form-control']) !!}
</div>

@error('description')
<span class="text-danger">{{ $message }}</span>
@enderror

<br>

{!! Form::submit('Editar Permiso', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop