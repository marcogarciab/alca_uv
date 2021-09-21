@extends('adminlte::page')

@section('title', 'Editar Evidencias')

@section('content_header')
    <h1>Editar Evidencia</h1>
@stop

@section('content')


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    {!! Form::model($evidencia, ['route' => ['evidencias.update', $evidencia], 'method' => 'put', 'files' => true]) !!}

    <div class="card h-100">
        <div class="card-body">
            <div class="row gutters">

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('numero', 'Número Evidencia') !!}
                        {!! Form::number('numero', null, ['class' => 'form-control', 'placeholder' => 'Inserte Número Evidencia']) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('created_at', 'Fecha de creación') !!}
                        {!! Form::date('created_at', $evidencia->created_at, ['class' => 'form-control','disabled']) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('updated_at', 'Fecha de Actualización') !!}
                        {!! Form::date('updated_at', $evidencia->updated_at, ['class' => 'form-control','disabled']) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="form-group">
                        {!! Form::label('acta_id', 'Acta de Verificación') !!}
                        {!! Form::select('acta_id', $actas, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Acta de Verificación']) !!}
                    </div>
                
                    @error('acta_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                
                </div>


                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="form-group">
                        {!! Form::label('evidencia_tipo_id', 'Tipo Evidencia') !!}
                        {!! Form::select('evidencia_tipo_id', $evidencia_tipos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Acta de Verificación']) !!}
                    </div>
                
                    @error('acta_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="form-group">
                        {!! Form::label('path', 'Path') !!}
                        {!! Form::file('path', ['class' => 'form-control']) !!}
                    </div>
                
                    @error('path')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                
                </div>
            </div>
            <a class="btn btn-secondary btn-lg" href="{{ $url }}" role="button">Mostrar Documento</a>
            {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
    <br>

@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log();
    </script>
@stop
