@extends('adminlte::page')

@section('title', 'Mostrar Evidencias')

@section('content_header')
    <h1>Mostrar Evidencia</h1>
@stop

@section('content')

    {!! Form::model($evidencia, ['route' => ['evidencias.index', $evidencia], 'method' => 'get', 'files' => true]) !!}

    <div class="card h-100">
        <div class="card-body">
            <div class="row gutters">

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('numero', 'Número Evidencia') !!}
                        {!! Form::number('numero', null, ['class' => 'form-control', 'placeholder' => 'Inserte Número Evidencia','disabled']) !!}
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
                        {!! Form::select('acta_id', $actas, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Acta de Verificación','disabled']) !!}
                    </div>
                
                    @error('acta_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                
                </div>


                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="form-group">
                        {!! Form::label('evidencia_tipo_id', 'Tipo Evidencia') !!}
                        {!! Form::select('evidencia_tipo_id', $evidencia_tipos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Acta de Verificación','disabled']) !!}
                    </div>
                
                    @error('acta_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="form-group">
                        {!! Form::label('path', 'Path') !!}
                        {!! Form::file('path', ['class' => 'form-control','disabled']) !!}
                    </div>
                
                    @error('path')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                
                </div>
            </div>
            <a class="btn btn-secondary btn-lg" href="{{ $url }}" role="button">Mostrar Documento</a>
            {!! Form::submit('Regresar', ['class' => 'btn btn-primary']) !!}

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
        console.log('{!! $url !!}');
    </script>
@stop
