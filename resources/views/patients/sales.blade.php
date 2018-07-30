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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">{{$sale->created_at->format('d M Y')}}</h3>
                        <div class="badge badge-rounded bg-blue">{{$sale->full_status}}</div>
                    </div>
                    <div class="card-body">
                        <p><strong>Descripción: </strong>{{$sale->material->material}}, {{$sale->frame}}</p>
                        <p><strong>Total: </strong>{{number_format($sale->total, 2)}}</p>
                        <p><strong>Total: </strong>{{number_format($sale->total, 2)}}</p>
                        <p><strong>Pagado: </strong>{{number_format($sale->payments->sum('payment'), 2)}}</p>
                        <p><strong>Restante: </strong>{{number_format($sale->remaining, 2)}}</p>
                        @if($sale->payments->sum('payment') < $sale->total)
                        <a href="{{route('sales.payment', $sale)}}" data-id="{{$sale->id}}" data-max="{{number_format($sale->remaining, 2)}}" class="btn btn-success payment">
                            <i class="fa fa-usd" aria-hidden="true"></i> Pago
                        </a>
                        @else
                        <button class="btn btn-default">Pagado</button>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach 
            @endforeach
        </div>
    </div>
</section>
<div class="modal fade" tabindex="-1" role="dialog" id="modal-payment">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar pago</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="sale_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Cantidad</label>
                        <input type="number" step="0.01" class="form-control" name="payment">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection