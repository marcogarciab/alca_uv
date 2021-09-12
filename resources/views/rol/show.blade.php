@extends('adminlte::page')

@section('title', 'Mostrar Permiso')

@section('content_header')
    <h1>Mostrar Rol</h1>
@stop

@section('content')

    {!! Form::model($role, ['route' => ['roles.index', $role], 'method' => 'get']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nombre Permiso') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Inserte Nombre de Permiso', 'disabled']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('guard_name', 'Nombre Guardia') !!}
        {!! Form::text('guard_name', 'web', ['class' => 'form-control', 'disabled']) !!}
    </div>

    @foreach ($permissions as $permission)
    <div class="form-check form-check-inline">
            <label>
                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1 ','disabled']) !!}
                {{ $permission->description }}
            </label>
        </div>
    @endforeach

    <br>
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
