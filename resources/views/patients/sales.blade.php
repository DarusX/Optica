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
            @component('sales.sale', ['sale' => $sale, ''])
            @endcomponent
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