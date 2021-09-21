@extends('adminlte::page')

@section('title', 'Lista Propuestas')

@section('content_header')
    <h1>Propuestas</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    {{-- @livewire('grafica-solicitud-propuesta-index') --}}
    @livewire('propuesta-index')
   

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
    <script>
        console.log('');
    </script>
@stop
