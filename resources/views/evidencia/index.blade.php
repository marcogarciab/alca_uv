@extends('adminlte::page')

@section('title', 'Lista Evidencias')

@section('content_header')
    <h1>Evidencias</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    {{-- @livewire('grafica-solicitud-propuesta-index') --}}
    @livewire('evidencia-index')
   

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
    <script>
        console.log('');
    </script>
@stop
