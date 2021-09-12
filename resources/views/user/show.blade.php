@extends('adminlte::page')

@section('title', 'Mostrar Permiso')

@section('content_header')
    <h1>Mostrar Rol</h1>
@stop

@section('content')

    {!! Form::model($user, ['route' => ['users.index', $user], 'method' => 'get']) !!}


    <div class="form-group">
        {!! Form::label('name', 'Nombre Usuario') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Inserte Nombre de Permiso', 'disabled']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'disabled']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('created_at', 'Fecha de Registro') !!}
        {!! Form::date('created_at', $user->created_at, ['class' => 'form-control', 'disabled']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('updated_at', 'Última modificación') !!}
        {!! Form::date('updated_at', $user->updated_at, ['class' => 'form-control', 'disabled']) !!}
    </div>

    @foreach ($roles as $rol)
        <div class="form-check form-check-inline">
            <label>
                {!! Form::checkbox('roles[]', $rol->id, null, ['class' => 'mr-1 ', 'disabled']) !!}
                {{ $rol->name }}
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
