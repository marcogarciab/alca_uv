@extends('adminlte::page')

@section('title', 'Lista Órdenes Servicios')

@section('content_header')
    <h1>Órdenes Servicios</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    {{-- @livewire('grafica-solicitud-propuesta-index') --}}
    @livewire('orden-index')
   

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
    <script>
        console.log('');
    </script>
@stop
