@extends('layouts.app') @section('content')
<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Ventas</h2>
    </div>
</header>
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form class="form-inline">
                            <div class="form-group">
                                <label class="sr-only">Desde</label>
                                <input type="text" class="mr-3 form-control datepicker" name="from" placeholder="Desde" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label class="sr-only">Hasta</label>
                                <input type="text" class="mr-3 form-control datepicker" name="to" placeholder="Hasta" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        <div class="row">
            @foreach($patients as $patient)
            @foreach($patient->sales as $sale)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">{{$sale->created_at->format('d M Y')}}</h3>
                        <div class="badge badge-rounded bg-red">{{$sale->status}}</div>
                    </div>
                    <div class="card-body">
                        <p><strong>Descripción: </strong>{{$sale->material->material}}, {{$sale->frame}}</p>
                        <p><strong>Total: </strong>{{number_format($sale->total, 2)}}</p>
                        <p><strong>Pagado: </strong>{{number_format($sale->payments->sum('payment'), 2)}}</p>
                        <p><strong>Restante: </strong>{{number_format($sale->remaining, 2)}}</p>
                        @if($sale->payments->sum('payment') < $sale->total)
                        <a href="{{route('sales.payment', $sale)}}" data-id="{{$sale->id}}" data-max="{{number_format($sale->remaining, 2)}}" class="btn btn-success payment">
                                <i class="fas fa-hand-holding-usd"></i> Abono
                        </a>
                        @else
                        <button class="btn btn-default">Pagado</button>
                        @endif
                        <a href="{{route('sales.update', $sale)}}" data-status="{{$sale->status}}" class="btn btn-warning status">
                            <i class="fas fa-tasks"></i> Status
                        </a>
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
<div class="modal fade" tabindex="-1" role="dialog" id="modal-status">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cambiar status</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" method="POST">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <input type="hidden" name="sale_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="Preparando">Preparando</option>
                            <option value="Listo">Listo</option>
                            <option value="Entregado">Entregado</option>
                        </select>
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