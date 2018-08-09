@extends('layouts.app') @section('content')
<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Pagos</h2>
    </div>
</header>
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cantidad</th>
                                    <th>Paciente</th>
                                    <th>Recibió</th>
                                    <th>Fecha/Hora</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $payment)
                                <tr>
                                    <td>{{$payment->id}}</td>
                                    <td>{{number_format($payment->payment, 2)}}</td>
                                    <td>{{$payment->sale->exam->patient->full_name}}</td>
                                    <td>{{$payment->creator->name}}</td>
                                    <td>{{$payment->created_at}}</td>
                                    <td><a href="{{route('payments.destroy', $payment)}}" class="btn btn-xs btn-danger destroy"><i class="fas fa-times"></i></a></td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection