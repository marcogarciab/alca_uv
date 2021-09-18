@extends('adminlte::page')

@section('title', 'Editar Solicitud Propuesta')

@section('content_header')
    <h1>Editar Solicitud Propuesta</h1>
@stop

@section('content')


@if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

{{-- {{ Form::model(aray('route' => 'solicitud_propuestas.update', $solicitud_propuesta,'files' => true, 'method' => 'put')) }} --}}
{!! Form::model($solicitud_propuesta,['route' => ['solicitud_propuestas.update', $solicitud_propuesta], 'method' => 'put', 'files' => true]) !!}    

<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        {!! Form::label('empresa_id ', 'Empresa') !!}
        {!! Form::select('empresa_id', $empresas, $solicitud_propuesta->empresa_id , ['class' => 'form-control', 'placeholder' => 'Seleccione una Empresa']) !!}
    </div>

    @error('empresa_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    
</div>

<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

    <div class="form-group">
        {!! Form::label('norma_id', 'Norma') !!}
        {!! Form::select('norma_id', $normas, $solicitud_propuesta->norma_id, ['class' => 'form-control', 'placeholder' => 'Seleccione una Norma']) !!}
    </div>

    @error('norma_id ')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>


<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

    <div class="form-group">
        {!! Form::label('verificacion_tipo_id', 'Tipo Verificación') !!}
        {!! Form::select('verificacion_tipo_id', $verificacion_tipos, $solicitud_propuesta->verificacion_tipo_id, ['class' => 'form-control', 'placeholder' => 'Seleccione un Tipo de Verificación']) !!}
    </div>

    @error('verificacion_tipo_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>


<a href="{{$url}}">Mostrar</a>


<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

    <div class="form-group">
        {!! Form::label('path', 'Path') !!}
        {!! Form::file('path', ['class' => 'form-control']) !!}
    </div>

    @error('path')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>




<br>


    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}


@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log();
    </script>
@stop
