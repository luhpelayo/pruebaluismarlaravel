@extends('admin.template')

@section('content')
    <div class="box box-primary">
        {{--<div class="col-sm-12 col-md-12 col-xs-12">--}}
            <h1>Total de Alumnos </h1>
            <canvas id="grafico"  height="80px"></canvas>
            <canvas id="graficoLineas"  height="80px"></canvas>
        {{--</div>--}}

    </div>
@endsection
@section('js')

    <script>
        //seleccionamos el tipo de grafico, en este caso es un grafico estilo pie, en esta parte podemos cambiar el tipo de grafico por el que deseamos
        ///le pasamos la data
        //esta es la data, podemos pasarle variables directamente desde el backend usando blade de la siguiente forma { { $dato1 } },
        //seleccionamos el color de fondo para cada dato que le enviamos
        //añadimos las etiquetas correspondientes a la data
        var primer_grafico = document.getElementById('grafico').getContext('2d');//seleccionamos el canvas



        //le pasamos como opcion adicional que sea responsivo
        var mi_primer_grafico ={
            type:"doughnut",
            data:{
                datasets:[{
                    data:[50,30],
                    backgroundColor: [
                        "#04B404","#FFBF00",
                    ],
                }],
                labels: [
                    "Activos",  "Inactivos",
                ]
            },
            options:{
                responsive: true,
                title: {
                    display: true,
                    text: 'Total Alumnos'
                }
            },
        };
        // var myLineChart = new Chart(ctx, {
        //     type: 'line',
        //     data: data,
        //     options: options
        // });
        window.pie = new Chart(primer_grafico,mi_primer_grafico);//le pasamos el grafico y la data para representarlo
    </script>

    <script>

        var chartOptions = {
            legend: {
                display: true,
                position: 'top',
                labels: {
                    boxWidth: 80,
                    fontColor: 'black'
                }
            }
        };


        var speedCanvas = document.getElementById("graficoLineas");
        var speedData = {
            labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016","2017","2018","2019"],
            datasets: [{
                label: "Ingreso Alumnos por año",
                data: [75, 80, 120, 150, 90, 110, 150, 180, 200, 209],
                lineTension: 0,
                fill: false,
                borderColor: 'orange',
                backgroundColor: 'transparent',
                borderDash: [5, 5],
                pointBorderColor: 'orange',
                pointBackgroundColor: 'rgba(255,150,0,0.5)',
                pointRadius: 5,
                pointHoverRadius: 10,
                pointHitRadius: 30,
                pointBorderWidth: 2,
                pointStyle: 'rectRounded'
            }]
        };
        // var primer_grafico = document.getElementById('grafico').getContext('2d');//seleccionamos el canvas
        window.line= new Chart(speedCanvas, {
            type: 'line',
            data: speedData,
            options: chartOptions
        });
        // window.line = new Chart(speedCanvas,speedData);//le pasamos el grafico y la data para representarlo
    </script>

@endsection
