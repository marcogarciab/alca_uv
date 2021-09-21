@extends('adminlte::page')

@section('title', 'Lista Verificadores')

@section('content_header')
    <h1>Verificadores</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
   
    @livewire('verificador-index')
   

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
    <script>
        console.log('');
    </script>
@stop
