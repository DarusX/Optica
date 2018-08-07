@extends('layouts.app') @section('content')
<section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid">
        <div class="row bg-white has-shadow">
            <!-- Item -->
            <div class="col-xl-6 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-blue">
                        <i class="icon-user"></i>
                    </div>
                    <div class="title">
                        <span>Nombre <br>
                            <strong>{{$patient->full_name}}</strong></span>
                        <div class="progress">
                            <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-blue"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-blue">
                        <i class="icon-user"></i>
                    </div>
                    <div class="title">
                        <span>Sexo<br>
                            <strong>{{$patient->gender}}</strong></span>
                        <div class="progress">
                            <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-blue"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-blue">
                        <i class="icon-user"></i>
                    </div>
                    <div class="title">
                        <span>Edad<br>
                            <strong>{{$patient->age}}</strong></span>
                        <div class="progress">
                            <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-blue"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-white has-shadow">
            <!-- Item -->
            <div class="col-xl-6 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-blue">
                        <i class="icon-user"></i>
                    </div>
                    <div class="title">
                        <span>Teléfono celular<br>
                            <strong>{{$patient->cell_phone}}</strong></span>
                        <div class="progress">
                            <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-blue"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-blue">
                        <i class="icon-user"></i>
                    </div>
                    <div class="title">
                        <span>Teléfono<br>
                            <strong>{{$patient->phone}}</strong></span>
                        <div class="progress">
                            <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-blue"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-12 col-sm-12">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-blue">
                        <i class="icon-user"></i>
                    </div>
                    <div class="title">
                        <span>Dirección<br>
                            <strong>{{$patient->address}}</strong></span>
                        <div class="progress">
                            <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-blue"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-sm-12">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-blue">
                        <i class="icon-user"></i>
                    </div>
                    <div class="title">
                        <span>Lugar de trabajo<br>
                            <strong>{{$patient->work}}</strong></span>
                        <div class="progress">
                            <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-blue"></div>
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
            <div class="statistics col-lg-12 col-12">
                <div class="row">
                    <div class="col-sm-4">
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
                    </div>
                    <div class="col-sm-4">
                        <div class="statistic d-flex align-items-center bg-white has-shadow">
                            <div class="icon bg-green">
                                <i class="fa fa-calendar-o"></i>
                            </div>
                            <div class="text">
                                <strong>{{$patient->sales->count()}}</strong>
                                <br>
                                <small>Ventas</small><br>
                                <a href="{{route('patients.sales', $patient)}}" class="btn btn-xs btn-success"><i class="fa fa-history" aria-hidden="true"></i> Historial</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="statistic d-flex align-items-center bg-white has-shadow">
                            <div class="icon bg-orange">
                                <i class="fa fa-paper-plane-o"></i>
                            </div>
                            <div class="text">
                                <strong>$ {{number_format($patient->sales->sum('remaining'), 2)}}</strong>
                                <br>
                                <small>Resta</small><br>
                                <a href="{{route('patients.sales', $patient)}}" class="btn btn-xs btn-warning"><i class="fa fa-history" aria-hidden="true"></i> Historial</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection