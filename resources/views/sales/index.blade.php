@extends('layouts.app') @section('content')
<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Ventas</h2>
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
            @foreach($sales as $sale)
            @component('components.sale', ['sale' => $sale])
            @endcomponent
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
@endsection