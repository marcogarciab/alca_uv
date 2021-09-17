@extends('adminlte::page')

@section('title', 'Editar Tipo Verificación')

@section('content_header')
    <h1>Editar Tipo Verificación</h1>
@stop

@section('content')

{!! Form::model($verificacion_tipo,['route' => ['verificacion_tipos.update', $verificacion_tipo], 'method' => 'put']) !!}
<div class="form-group">
    {!! Form::label('nombre', 'Nombre Tipo Verificación') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Inserte Nombre de Tipo Verificación']) !!}
</div>

@error('nombre')
    <span class="text-danger">{{ $message }}</span>
@enderror

<br>

{!! Form::submit('Actualizar Tipo Verificación', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop