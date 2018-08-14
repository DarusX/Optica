@extends('layouts.app') @section('content')
<section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid">
        <div class="row bg-white has-shadow">
            <!-- Item -->
            <div class="col-md-4">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-blue">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="title">
                        <span>Nombre <br>
                            <strong>{{$patient->full_name}}</strong>
                        </span>
                        <div class="progress">
                            <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-blue"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-blue">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="title">
                        <span>Sexo<br>
                            <strong>{{$patient->gender}}</strong></span>
                        <div class="progress">
                            <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-blue"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-blue">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="title">
                        <span>Edad<br>
                            <strong>{{$patient->age}}</strong>
                        </span>
                        <div class="progress">
                            <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-blue"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-white has-shadow">
            @if($patient->cell_phone)
            <div class="col-md-4">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-blue">
                        <i class="fas fa-mobile"></i>
                    </div>
                    <div class="title">
                        <span>Teléfono celular<br>
                            <strong>{{$patient->cell_phone}}</strong>
                        </span>
                        <div class="progress">
                            <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-blue"></div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($patient->phone)
            <div class="col-md-4">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-blue">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="title">
                        <span>Teléfono<br>
                            <strong>{{$patient->phone}}</strong>
                        </span>
                        <div class="progress">
                            <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-blue"></div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="row bg-white has-shadow">
            <div class="col-xl-12 col-sm-12">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-blue">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <div class="title">
                        <span>Dirección<br>
                            <strong>{{$patient->address}}</strong>
                        </span>
                        <div class="progress">
                            <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-blue"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($patient->work)
        <div class="row bg-white has-shadow">
            <div class="col-xl-12 col-sm-12">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-blue">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="title">
                        <span>Lugar de trabajo<br>
                            <strong>{{$patient->work}}</strong>
                        </span>
                        <div class="progress">
                            <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-blue"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row">
            <!-- Statistics -->
            <div class="statistics col-lg-12 col-12">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="statistic d-flex align-items-center bg-white has-shadow">
                            <div class="icon bg-red">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="text">
                                <strong>{{$patient->exams->count()}}</strong>
                                <br>
                                <small>Examenes</small>
                                <br>
                                @if($patient->exams->count())
                                <a href="{{route('patients.exams', $patient)}}" class="btn btn-xs btn-danger"><i class="fa fa-history" aria-hidden="true"></i> Historial</a>
                                @endif
                                <a href="{{route('exams.create', $patient)}}" class="btn btn-xs btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
                            </div>
                        </div>
                    </div>
                    @if($patient->sales->count())
                    <div class="col-sm-4">
                        <div class="statistic d-flex align-items-center bg-white has-shadow">
                            <div class="icon bg-green">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <div class="text">
                                <strong>{{$patient->sales->count()}}</strong>
                                <br>
                                <small>Ventas</small><br>
                                <a href="{{route('patients.sales', $patient)}}" class="btn btn-xs btn-success"><i class="fa fa-history" aria-hidden="true"></i> Historial</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($patient->sales->sum('remaining'))
                    <div class="col-sm-4">
                        <div class="statistic d-flex align-items-center bg-white has-shadow">
                            <div class="icon bg-orange">
                                <i class="fas fa-bell"></i>
                            </div>
                            <div class="text">
                                <strong>$ {{number_format($patient->sales->sum('remaining'), 2)}}</strong>
                                <br>
                                <small>Resta</small><br>
                                <a href="{{route('patients.sales', $patient)}}" class="btn btn-xs btn-warning"><i class="fa fa-history" aria-hidden="true"></i> Historial</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="row">
        @if($patient->exams->count() > 1)
        <div class="col-sm-12">
            <div class="embed-responsive embed-responsive-16by9">
                <canvas id="myChart" class="embed-responsive-item"></canvas>
            </div>
        </div>
        @endif
    </div>
</div>
<h1></h1>
@endsection
@section('js')
<script>
    var labels = []
</script>
@foreach($patient->exams as $exam)
<script>
    labels.push("{{$exam->date}}")
</script>
@endforeach
<script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Derecho (Esfera)',
                    data: JSON.parse("{{json_encode(array_pluck($patient->exams, 'od_sphere'))}}"),
                    fill: false,
                    borderColor: [
                        "#f27173",
                    ],
                }, {
                    label: 'Derecho (Cilindro)',
                    data: JSON.parse("{{json_encode(array_pluck($patient->exams, 'od_cylinder'))}}"),
                    fill: false,
                    borderColor: [
                        "#f27173",
                    ],
                }, {
                    label: 'Derecho (Eje)',
                    data: JSON.parse("{{json_encode(array_pluck($patient->exams, 'od_axis'))}}"),
                    fill: false,
                    borderColor: [
                        "#f27173",
                    ],
                }, {
                    label: 'Izquierdo (Esfera)',
                    data: JSON.parse("{{json_encode(array_pluck($patient->exams, 'os_sphere'))}}"),
                    fill: false,
                    borderColor: [
                        "#36A2EB",
                    ],
                }, {
                    label: 'Izquierdo (Cilindro)',
                    data: JSON.parse("{{json_encode(array_pluck($patient->exams, 'os_cylinder'))}}"),
                    fill: false,
                    borderColor: [
                        "#36A2EB",
                    ],
                }, {
                    label: 'Izquierdo (Eje)',
                    data: JSON.parse("{{json_encode(array_pluck($patient->exams, 'os_axis'))}}"),
                    fill: false,
                    borderColor: [
                        "#36A2EB",
                    ],
                },]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        </script>
@endsection