@extends('adminlte::page')

@section('title', 'PandaBK')

@section('content_header')
    <h1></h1>
    <canvas id="bar-chart" width="600" height="350"></canvas>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="jquery-3.3.1.min.js"></script>
    <script>
   $.ajax({
    type: 'GET',
    url: '/counter/report',
    success: function (data) {
        new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {
            labels: data[1].model,
            datasets: [
                {
                label: "Population (millions)",
                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
                data: data[0].counter
                }
            ]
        },
        options: {
        legend: { display: false },
            title: {
                display: true,
                text: 'Vicentinos do Brasil'
            }
        }
    });
    }
});
    </script>
@stop
@section('content')
@stop