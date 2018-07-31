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
            <a href="{{route('sales.payment', $sale)}}" data-id="{{$sale->id}}" data-max="{{number_format($sale->remaining, 2)}}" class="btn btn-warning payment">
                <i class="fas fa-coins"></i> Abono
            </a>
            @else
            <button class="btn btn-default">Pagado</button>
            @endif
            <a href="{{route('sales.update', $sale)}}" data-status="{{$sale->status}}" class="btn btn-primary status">
                <i class="fas fa-tasks"></i> Status
            </a>
            <a href="{{route('sales.payments', $sale)}}" data-status="{{$sale->status}}" class="btn btn-primary payments">
                <i class="fas fa-undo"></i> Pagos
            </a>
        </div>
    </div>
</div>
@component('payment.modal')
@endcomponent