@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1>Editar Roles Usaurio</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-success">
    <strong>{{ session('info') }}</strong>
</div>
@endif

{!! Form::model($role,['route' => ['roles.update', $role], 'method' => 'put']) !!}


<div class="form-group">
    {!! Form::label('role', 'Nombre Rol') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Inserte Nombre de Rol']) !!}
</div>

@error('name')
    <span class="text-danger">{{ $message }}</span>
@enderror

<div class="form-group">
    {!! Form::label('guard_name', 'guard_name') !!}
    {!! Form::text('guard_name', null, ['class' => 'form-control', 'placeholder' => 'Inserte Email']) !!}
</div>

@foreach ($permissions as $permission)
<div class="form-check form-check-inline">
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1 ',]) !!}
            {{ $permission->description }}
        </label>
    </div>
@endforeach

@error('descripcion')
    <span class="text-danger">{{ $message }}</span>
@enderror

<br>

{!! Form::submit('Actualizar Rol', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop