@extends('adminlte::page')

@section('title', 'Editar Verificadores')

@section('content_header')
    <h1>Editar Verificadores</h1>
@stop

@section('content')


    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    {{-- {{ Form::model(aray('route' => 'verificadores.update', $verificador,'files' => true, 'method' => 'put')) }} --}}
    {!! Form::model($verificadore, ['route' => ['verificadores.update', $verificadore], 'method' => 'put', 'files' => true]) !!}

    <div class="card h-100">
        <div class="card-body">
            <div class="row gutters">
    
    
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('serial_certificacion', 'Certificado Serial') !!}
                        {!! Form::number('serial_certificacion', null, ['class' => 'form-control', 'placeholder' => 'Inserte Número Certificación']) !!}
                    </div>
                </div>
    
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('created_at', 'Fecha de creación') !!}
                        {!! Form::date('created_at', $verificadore->created_at, ['class' => 'form-control', 'disabled']) !!}
                    </div>
                </div>
    
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('updated_at', 'Fecha de Actualización') !!}
                        {!! Form::date('updated_at', $verificadore->updated_at, ['class' => 'form-control', 'disabled']) !!}
                    </div>
                </div>
    
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('nombre', 'Nombre(ds)') !!}
                        {!! Form::text('nombre', $verificadore->nombre, ['class' => 'form-control', 'placeholder' => 'Inserte Nombre']) !!}
                    </div>
    
                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('apellido_paterno', 'Apellido Paterno') !!}
                        {!! Form::text('apellido_paterno', null, ['class' => 'form-control', 'placeholder' => 'Inserte Apellido']) !!}
                    </div>
    
                    @error('apellido_paterno')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('apellido_materno', 'Apellido Materno') !!}
                        {!! Form::text('apellido_materno', null, ['class' => 'form-control', 'placeholder' => 'Inserte Apellido']) !!}
                    </div>
    
                    @error('apellido_materno')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
    
                <br>
                    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
    
            </div>
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
