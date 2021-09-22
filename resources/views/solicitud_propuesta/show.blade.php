@extends('adminlte::page')

@section('title', 'Mostrar Solicitudes Propuestas')

@section('content_header')
    <h1>Mostrar Solicitudes Propuestas.</h1>
@stop

@section('content')

    {!! Form::model($solicitud_propuesta, ['route' => ['solicitud_propuestas.index', $solicitud_propuesta], 'method' => 'get', 'files' => true]) !!}

    <div class="card h-100">
        <div class="card-body">
            <div class="row gutters">

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('empresa_id ', 'Empresa') !!}
                        {!! Form::select('empresa_id', $empresas, $solicitud_propuesta->empresa_id, ['class' => 'form-control', 'placeholder' => 'Seleccione una Empresa', 'disabled']) !!}
                    </div>

                    @error('empresa_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="form-group">
                        {!! Form::label('norma_id', 'Norma') !!}
                        {!! Form::select('norma_id', $normas, $solicitud_propuesta->norma_id, ['class' => 'form-control', 'placeholder' => 'Seleccione una Norma', 'disabled']) !!}
                    </div>

                    @error('norma_id ')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>


                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="form-group">
                        {!! Form::label('verificacion_tipo_id', 'Tipo Verificación') !!}
                        {!! Form::select('verificacion_tipo_id', $verificacion_tipos, $solicitud_propuesta->verificacion_tipo_id, ['class' => 'form-control', 'placeholder' => 'Seleccione un Tipo de Verificación', 'disabled']) !!}
                    </div>

                    @error('verificacion_tipo_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <a class="btn btn-secondary btn-lg" href="{{ $url }}" role="button">Mostrar Documento</a>

                <br>
                {!! Form::submit('Regresar', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('{!! $url !!}');
    </script>
@stop
