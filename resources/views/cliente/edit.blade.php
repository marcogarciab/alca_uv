@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content_header')
    <h1>Editar Cliente</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif


    {!! Form::model($cliente, ['route' => ['clientes.update', $cliente], 'method' => 'put']) !!}
    <div class="card h-100">
        <div class="card-body">
            <div class="row gutters">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('numero', 'Número Cliente') !!}
                        {!! Form::number('numero', null, ['class' => 'form-control', 'placeholder' => 'Número de Cliente', 'disabled']) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('created_at', 'Fecha de creación Cliente') !!}
                        {!! Form::date('created_at', $cliente->created_at, ['class' => 'form-control', 'disabled']) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('updated_at', 'Fecha de Actualización Cliente') !!}
                        {!! Form::date('updated_at', $cliente->updated_at, ['class' => 'form-control', 'disabled']) !!}
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('nombre', 'Nombre(s)') !!}
                        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Inserte Nombre de Cliente']) !!}
                    </div>

                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('apellido_paterno', 'Apellido Paterno') !!}
                        {!! Form::text('apellido_paterno', null, ['class' => 'form-control', 'placeholder' => 'Inserte Apellido Paterno de Cliente']) !!}
                    </div>

                    @error('apellido_paterno')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('apellido_materno', 'Apellido Materno') !!}
                        {!! Form::text('apellido_materno', null, ['class' => 'form-control', 'placeholder' => 'Inserte Apellido Materno de Cliente']) !!}
                    </div>

                    @error('apellido_materno')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('telefono', 'Teléfono Cliente') !!}
                        {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Inserte Teléfono de Cliente']) !!}
                    </div>

                    @error('telefono')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento Cliente') !!}
                        {!! Form::date('fecha_nacimiento', $cliente->fecha_nacimiento, ['class' => 'form-control', 'placeholder' => 'Inserte Fecha Nacimiento de Cliente']) !!}
                    </div>

                    @error('fecha_nacimiento')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- @if ($users != null)
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                {!! Form::label('user_id ', 'Usuario') !!}
                {!! Form::select('user_id', $users, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un Usuario']) !!}
            </div>

            @error('user_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            
        </div>

        @else
            <div class="form-group">
                <input type="hidden" name="user_id" value="{{ $user->id }}">
            </div>
        @endif --}}


                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {!! Form::label('observaciones', 'Observaciones del Cliente') !!}
                        {!! Form::textArea('observaciones', null, ['rows' => '3', 'class' => 'form-control', 'placeholder' => 'Inserte Observaciones de Cliente']) !!}
                    </div>

                    @error('observaciones')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            {!! Form::submit('Editar Cliente', ['class' => 'btn btn-primary']) !!}

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
        console.log('{{ $cliente->created_at }}');
    </script>
@stop
