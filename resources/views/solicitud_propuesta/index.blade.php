@extends('adminlte::page')

@section('title', 'Lista Solicitudes Propuestas')

@section('content_header')
    <h1>Solicitudes Propuestas</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    @can('grafica_solicitud_propuestas')
    @livewire('grafica-solicitud-propuesta-index')
    
    @endcan
    @livewire('solicitud-propuesta-index')
  
   

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
    <script>
        console.log('');
    </script>
@stop
