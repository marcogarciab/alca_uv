@extends('adminlte::page')

@section('title', 'Crear Rol')

@section('content_header')
    <h1>Crear Rol</h1>
@stop

@section('content')

    {!! Form::open(['route' => 'roles.store']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nombre Rol') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Inserte Nombre de Rol']) !!}
    </div>

    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror

    <div class="form-group">
        {!! Form::label('guard_name', 'Guard Name') !!}
        {!! Form::text('guard_name', 'web', ['class' => 'form-control', 'placeholder' => 'Inserte Guard Name']) !!}
    </div>

    @error('guard_name')
        <span class="text-danger">{{ $message }}</span>
    @enderror

    @foreach ($permissions as $permission)
        <div>
            <label>
                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                {{ $permission->name }}
            </label>
        </div>
    @endforeach

    <br>

    {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary']) !!}

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
