@extends('layouts.app') 
@section('content')
<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom"></h2>
    </div>
</header>
<div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('patients.show', $sale->exam->patient)}}">{{$sale->exam->patient->name}}</a>
        </li>
        <li class="breadcrumb-item active">Pagos</li>
    </ul>
</div>
<section class="dashboard-header">
    <div class="container-fluid">
    </div>
</section>
@endsection