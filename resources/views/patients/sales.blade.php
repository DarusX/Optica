@extends('layouts.app') 
@section('content')
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
        <li class="breadcrumb-item active">Ventas</li>
    </ul>
</div>
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row">
            @foreach($patient->exams as $exam) 
            @foreach($exam->sales as $sale)
            @component('components.sale', ['sale' => $sale, ''])
            @endcomponent
            @endforeach 
            @endforeach
        </div>
    </div>
</section>
@component('components.modals.payment')
@endcomponent
@component('components.modals.status')
@endcomponent
@component('components.modals.payments')
@endcomponent
@component('components.modals.exam')
@endcomponent
@endsection