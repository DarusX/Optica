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
        <li class="breadcrumb-item active">Ventas</li>
    </ul>
</div>
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Ventas</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Armazón</th>
                                    <th>Material</th>
                                    <th>Total</th>
                                    <th>Pagado</th>
                                    <th>Restante</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patient->exams as $exam) @foreach($exam->sales as $sale)
                                <tr>
                                    <td>{{$sale->id}}</td>
                                    <td>{{$sale->created_at->diffForHumans()}}</td>
                                    <td>{{$sale->frame}}</td>
                                    <td>{{$sale->material->material}}</td>
                                    <td>{{number_format($sale->total, 2)}}</td>
                                    <td>{{number_format($sale->payments->sum('payment'), 2)}}</td>
                                    <td>{{number_format($sale->remaining, 2)}}</td>
                                    <td>{{$sale->full_status}}</td>
                                    <td>
                                        @if($sale->payments->sum('payment') < $sale->total)
                                        <a href="{{route('sales.payment', $sale)}}" data-id="{{$sale->id}}" class="btn btn-xs btn-success payment">
                                            <i class="fa fa-usd" aria-hidden="true"></i>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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