@extends('layouts.app') @section('content')
<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Ventas</h2>
    </div>
</header>
<section class="dashboard-header">
    <div class="container-fluid">
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
                        @foreach($sales as $sale)
                        <tr>
                            <td>{{$sale->id}}</td>
                            <td>{{$sale->created_at->format('Y-m-d')}}</td>
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
                        @endforeach 
                    </tbody>
                </table>
    </div>
</section>
@endsection