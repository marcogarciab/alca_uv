@extends('adminlte::page')

@section('title', 'Enviar Solicitud Propuesta')

@section('content_header')
    <h1>Crear Solicitud Propuesta</h1>
@stop

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{ Form::open(['route' => 'verificadores.store', 'files' => true]) }}

    <div class="card h-100">
        <div class="card-body">
            <div class="row gutters">


                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('serial_certificacion', 'Certificado Serial') !!}
                        {!! Form::number('serial_certificacion', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('created_at', 'Fecha de creación') !!}
                        {!! Form::date('created_at', null, ['class' => 'form-control','disabled']) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('updated_at', 'Fecha de Actualización') !!}
                        {!! Form::date('updated_at', null, ['class' => 'form-control','disabled']) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('nombre', 'Nombre(ds)') !!}
                        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                    </div>

                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('apellido_paterno', 'Apellido Paterno') !!}
                        {!! Form::text('apellido_paterno', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                    </div>

                    @error('apellido_paterno')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('apellido_materno', 'Apellido Materno') !!}
                        {!! Form::text('apellido_materno', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                    </div>

                    @error('apellido_materno')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <br>

    {!! Form::submit('Crear Tipo Verificación', ['class' => 'btn btn-primary']) !!}

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
