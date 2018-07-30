@extends('layouts.app') @section('content')
<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">{{$patient->full_name}}</h2>
    </div>
</header>
<div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('patients.show', $patient)}}">{{$patient->full_name}}</a>
        </li>
        <li class="breadcrumb-item active">Exámenes</li>
    </ul>
</div>
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row">
            @foreach($patient->exams as $exam)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">{{$exam->created_at->format('d M Y')}}</h3>
                        <div class="badge badge-rounded bg-gray">{{$exam->creator->name}}</div>
                        @if(count($exam->sales))
                        <div class="badge badge-rounded bg-blue">Con venta</div>
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Esfera</th>
                                    <th>Cilindro</th>
                                    <th>Eje</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        OD - OI<br>
                                        <small>Oculus dexter</small>
                                    </th>
                                    <td>{{$exam->od_sphere}}</td>
                                    <td>{{$exam->od_cylinder}}</td>
                                    <td>{{$exam->od_axis}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        OS - OD
                                        <br>
                                        <small>Oculus sinister</small>
                                    </th>
                                    <td>{{$exam->os_sphere}}</td>
                                    <td>{{$exam->os_cylinder}}</td>
                                    <td>{{$exam->os_axis}}</td>
                                   
                                </tr>
                                <tr>
                                    <th scope="row">
                                        OU - OA
                                        <br>
                                        <small>Oculus uterque</small>
                                    </th>
                                    <td>{{$exam->ou_sphere}}</td>
                                    <td>{{$exam->ou_cylinder}}</td>
                                    <td>{{$exam->ou_axis}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{route('sales.create', $exam)}}" class="btn btn-md btn-success">
                            <i class="fa fa-paint-brush" aria-hidden="true"></i> Configurar Venta</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection