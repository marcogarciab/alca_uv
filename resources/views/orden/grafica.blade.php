@extends('adminlte::page')

@section('title', 'Muestra Gráfica Solicitudes Propuestas')

@section('content_header')
    <h1>Grafica Solicitudes Propuestas</h1>
@stop

@section('content')

@livewire('grafica-solicitud-propuesta-index')

    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <canvas id="canvas" height="280" width="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script>
        //var year = <?php echo $year; ?>;
        var user = <?php echo $user; ?>;
        var barChartData = {
            //labels: year,
            datasets: [{
                label: 'Número solicitides',
                backgroundColor: "blue",
                data: user
            }]
        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: '#c1c1c1',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Yearly User Joined'
                    }
                }
            });
        };
    </script>
    <script>
        console.log('');
    </script>
@stop
