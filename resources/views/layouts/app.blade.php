@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

<!-- Page Content -->
<main class="container my-5">
    {{ $slot }}
</main>

@stack('modals')

@livewireScripts

@stack('scripts')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop