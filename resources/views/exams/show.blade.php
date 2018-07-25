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
                        <h3 class="h4">{{$exam->created_at->diffForHumans()}}</h3>
                        <div class="badge badge-rounded bg-gray">{{$exam->creator->name}}</div>
                    </div>
                    <div class="card-body">
                        <a href="{{route('sales.create', $exam)}}" class="btn btn-md btn-success"><i class="fa fa-paint-brush" aria-hidden="true"></i> Configurar Venta</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection