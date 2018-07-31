@extends('layouts.app') @section('content')
<section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid">
        <div class="row bg-white has-shadow">
            <!-- Item -->
            <div class="col-xl-3 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-violet">
                        <i class="icon-user"></i>
                    </div>
                    <div class="title">
                        <span>Nombre <br>
                            <strong>{{$patient->full_name}}</strong></span>
                        <div class="progress">
                            <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-violet">
                        <i class="icon-user"></i>
                    </div>
                    <div class="title">
                        <span>Sexo<br>
                            <strong>{{$patient->gender}}</strong></span>
                        <div class="progress">
                            <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-violet">
                        <i class="icon-user"></i>
                    </div>
                    <div class="title">
                        <span>Edad<br>
                            <strong>{{$patient->age}}</strong></span>
                        <div class="progress">
                            <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-violet">
                        <i class="icon-user"></i>
                    </div>
                    <div class="title">
                        <span>Teléfono celular<br>
                            <strong>{{$patient->cell_phone}}</strong></span>
                        <div class="progress">
                            <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-violet">
                        <i class="icon-user"></i>
                    </div>
                    <div class="title">
                        <span>Teléfono<br>
                            <strong>{{$patient->phone}}</strong></span>
                        <div class="progress">
                            <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-violet">
                        <i class="icon-user"></i>
                    </div>
                    <div class="title">
                        <span>Lugar de trabajo<br>
                            <strong>{{$patient->work}}</strong></span>
                        <div class="progress">
                            <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-sm-12">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-violet">
                        <i class="icon-user"></i>
                    </div>
                    <div class="title">
                        <span>Dirección<br>
                            <strong>{{$patient->address}}</strong></span>
                        <div class="progress">
                            <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row">
            <!-- Statistics -->
            <div class="statistics col-lg-3 col-12">
                <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-red">
                        <i class="fa fa-tasks"></i>
                    </div>
                    <div class="text">
                        <strong>{{$patient->exams->count()}}</strong>
                        <br>
                        <small>Examenes</small>
                        <br>
                        <a href="{{route('patients.exams', $patient)}}" class="btn btn-xs btn-danger"><i class="fa fa-history" aria-hidden="true"></i> Historial</a>
                        <a href="{{route('exams.create', $patient)}}" class="btn btn-xs btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
                    </div>
                </div>
                <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-green">
                        <i class="fa fa-calendar-o"></i>
                    </div>
                    <div class="text">
                        <strong>{{$patient->sales->count()}}</strong>
                        <br>
                        <small>Ventas</small><br>
                        <a href="{{route('patients.sales', $patient)}}" class="btn btn-xs btn-success"><i class="fa fa-history" aria-hidden="true"></i> Historial</a>
                        <a href="{{route('exams.create', $patient)}}" class="btn btn-xs btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
                    </div>
                </div>
                <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-orange">
                        <i class="fa fa-paper-plane-o"></i>
                    </div>
                    <div class="text">
                        <strong>147</strong>
                        <br>
                        <small>Forwards</small>
                    </div>
                </div>
            </div>
            <!-- Line Chart            -->
            <div class="chart col-lg-6 col-12">
                <div class="line-chart bg-white d-flex align-items-center justify-content-center has-shadow">
                    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                        </div>
                    </div>
                    <canvas id="lineCahrt" width="505" height="251" class="chartjs-render-monitor" style="display: block; width: 505px; height: 251px;"></canvas>
                </div>
            </div>
            <div class="chart col-lg-3 col-12">
                <!-- Bar Chart   -->
                <div class="bar-chart has-shadow bg-white">
                    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                        </div>
                    </div>
                    <div class="title">
                        <strong class="text-violet">95%</strong>
                        <br>
                        <small>Current Server Uptime</small>
                    </div>
                    <canvas id="barChartHome" width="238" height="118" class="chartjs-render-monitor" style="display: block; width: 238px; height: 118px;"></canvas>
                </div>
                <!-- Numbers-->
                <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-green">
                        <i class="fa fa-line-chart"></i>
                    </div>
                    <div class="text">
                        <strong>99.9%</strong>
                        <br>
                        <small>Success Rate</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection