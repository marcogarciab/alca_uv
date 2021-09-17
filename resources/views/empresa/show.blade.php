@extends('adminlte::page')

@section('title', 'Mostrar Empresa')

@section('content_header')
    <h1>Mostrar Empresa</h1>
@stop

@section('content')

    {!! Form::model($empresa, ['route' => ['permisos.index', $empresa], 'method' => 'get']) !!}

    <div class="row gutters">

        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                {!! Form::label('razon_social', 'Razón Social') !!}
                {!! Form::text('razon_social', null, ['class' => 'form-control', 'placeholder' => 'Inserte Razón social','disabled']) !!}
            </div>

            @error('razon_social')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                {!! Form::label('nombre_comercial', 'Nombre Comercial') !!}
                {!! Form::text('nombre_comercial', null, ['class' => 'form-control', 'placeholder' => 'Inserte Nombre Comercial','disabled']) !!}
            </div>

            @error('nombre_comercial')
                <span class="text-danger">{{ $message }}</span>
            @enderror

        </div>

        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                {!! Form::label('rfc', 'RFC') !!}
                {!! Form::text('rfc', null, ['class' => 'form-control', 'placeholder' => 'Inserte Nombre RFC','disabled']) !!}
            </div>

            @error('rfc')
                <span class="text-danger">{{ $message }}</span>
            @enderror

        </div>

        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                {!! Form::label('curp', 'CURP') !!}
                {!! Form::text('curp', null, ['class' => 'form-control', 'placeholder' => 'Inserte CURP','disabled']) !!}
            </div>

            @error('curp')
                <span class="text-danger">{{ $message }}</span>
            @enderror

        </div>


        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                {!! Form::label('calle', 'Calle') !!}
                {!! Form::text('calle', null, ['class' => 'form-control', 'placeholder' => 'Inserte Calle','disabled']) !!}
            </div>

            @error('curp')
                <span class="text-danger">{{ $message }}</span>
            @enderror

        </div>

        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                {!! Form::label('num_int', 'Número Interior') !!}
                {!! Form::number('num_int', null, ['class' => 'form-control', 'placeholder' => 'Inserte Número Interior','disabled']) !!}
            </div>

            @error('num_int')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                {!! Form::label('num_ext', 'Número Extarior') !!}
                {!! Form::number('num_ext', null, ['class' => 'form-control', 'placeholder' => 'Inserte Número Exterior','disabled']) !!}
            </div>

            @error('num_ext')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                {!! Form::label('codigo_postal', 'Código Postal') !!}
                {!! Form::number('codigo_postal', null, ['class' => 'form-control', 'placeholder' => 'Inserte Código Postal','disabled']) !!}
            </div>

            @error('codigo_postal')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                {!! Form::label('colonia', 'Colonia') !!}
                {!! Form::text('colonia', null, ['class' => 'form-control', 'placeholder' => 'Inserte Colonia','disabled']) !!}
            </div>

            @error('colonia')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                {!! Form::label('estado', 'Estado') !!}
                {!! Form::text('estado', null, ['class' => 'form-control', 'placeholder' => 'Inserte Estado','disabled']) !!}
            </div>

            @error('estado')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                {!! Form::label('ciudad_municipio', 'Ciudad o Municipio') !!}
                {!! Form::text('ciudad_municipio', null, ['class' => 'form-control', 'placeholder' => 'Inserte Ciudad o Municipio','disabled']) !!}
            </div>

            @error('ciudad_municipio')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                {!! Form::label('entre_calles', 'Entre Calles') !!}
                {!! Form::text('entre_calles', null, ['class' => 'form-control', 'placeholder' => 'Inserte Entre Que Calles','disabled']) !!}
            </div>

            @error('entre_calles')
                <span class="text-danger">{{ $message }}</span>
            @enderror

        </div>


        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

            <div class="form-group">
                {!! Form::label('referencias', 'Referencias Domicilio') !!}
                {!! Form::text('referencias', null, ['class' => 'form-control', 'placeholder' => 'Inserte Referencias Domicilio','disabled']) !!}
            </div>

            @error('referencias')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            
        </div>


        {{-- @if ($clientes != null)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    {!! Form::label('cliente_id ', 'Cliente') !!}
                    {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un Cliente']) !!}
                </div>

                @error('cliente_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

        @else
            <div class="form-group">
                <input type="hidden" name="cliente_id" value="{{ $empresa->id }}">
            </div>
        @endif --}}


        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

            <div class="form-group">
                {!! Form::label('nombre_representante', 'Nombre(s) Representante') !!}
                {!! Form::text('nombre_representante', null, ['class' => 'form-control', 'placeholder' => '','disabled']) !!}
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

            <div class="form-group">
                {!! Form::label('apellidos_representante', 'Apellido(s) Representante') !!}
                {!! Form::text('apellidos_representante', null, ['class' => 'form-control', 'placeholder' => '','disabled']) !!}
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

            <div class="form-group">
                {!! Form::label('telefono', 'Teléfono Representante') !!}
                {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => '','disabled']) !!}
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

            <div class="form-group">
                {!! Form::label('email', 'Email Representante') !!}
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => '','disabled']) !!}
            </div>
        </div>



        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                {!! Form::label('created_at', 'Fecha de creación Empresa') !!}
                {!! Form::date('created_at', null, ['class' => 'form-control', 'disabled']) !!}
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                {!! Form::label('updated_at', 'Fecha de Actualización Empresa') !!}
                {!! Form::date('updated_at', null, ['class' => 'form-control', 'disabled']) !!}
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                {!! Form::label('observaciones', 'Observaciones del Cliente') !!}
                {!! Form::textArea('observaciones', null, ['rows' => '3', 'class' => 'form-control', 'placeholder' => 'Inserte Observaciones de Cliente','disabled']) !!}
            </div>

            @error('observaciones')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


    </div>

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
