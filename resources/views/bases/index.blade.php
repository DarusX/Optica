@extends('layouts.app') 
@section('content')
<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Inventario</h2>
    </div>
</header>
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Bases</h3>
                </div>
                <div class="card-body">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-base">Registrar</button>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Base</th>
                                <th>Adición</th>
                                <th>Cantidad</th>
                                <th>Alta</th>
                                <th>Baja</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bases as $base)
                            <tr>
                                <td>{{$base->base}}</td>
                                <td>{{signedNumber($base->addition)}}</td>
                                <td>{{$base->quantity}}</td>
                                <td>
                                    <form action="{{route('bases.update', $base)}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                        <input type="hidden" name="type" value="plus">
                                        <div class="input-group input-group-sm">
                                            <input type="number" class="form-control" name="quantity" min="0" placeholder="Mín. 0">
                                            <span class="input-group-btn">
                                                <button class="btn btn-success" type="submit"><i class="fas fa-arrow-alt-circle-up"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('bases.update', $base)}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                        <input type="hidden" name="type" value="minus">
                                        <div class="input-group input-group-sm">
                                            <input type="number" class="form-control" name="quantity" max="{{$base->quantity}}" placeholder="Máx. {{$base->quantity}}">
                                            <span class="input-group-btn">
                                                <button class="btn btn-danger" type="submit"><i class="fas fa-arrow-alt-circle-down"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Total:</th>
                                <th>{{$bases->sum('quantity')}}</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" tabindex="-1" role="dialog" id="modal-base">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar Base</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
           <form action="{{route('bases.store')}}" method="post">
               {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label>Base</label>
                        <input type="text" class="form-control" name="base">
                    </div>
                    <div class="form-group">
                        <label>Adicción</label>
                        <input type="number" step="0.01" class="form-control" name="addition">
                    </div>
                    <div class="form-group">
                        <label>Cantidad</label>
                        <input type="number" step="0.01"class="form-control" name="quantity">
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