@extends('layouts.app') 
@section('content')
<section>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Registro de Paciente</h3>
            </div>
            <div class="card-body">
                <form action="{{route('patients.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="form-control-label">Nombre</label>
                        <input type="text" class="mr-3 form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name">
                        @if ($errors->has('name'))
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Apellidos</label>
                        <input type="text" class="mr-3 form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" name="lastname">
                        @if ($errors->has('lastname'))
                        <div class="invalid-feedback">{{ $errors->first('lastname') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Dirección</label>
                        <input type="text" class="mr-3 form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address">
                        @if ($errors->has('address'))
                        <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Teléfono</label>
                        <input type="text" class="mr-3 form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone">
                        @if ($errors->has('phone'))
                        <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Teléfono celular</label>
                        <input type="text" class="mr-3 form-control {{ $errors->has('cell_phone') ? 'is-invalid' : '' }}" name="cell_phone">
                        @if ($errors->has('phone'))
                        <div class="invalid-feedback">{{ $errors->first('cell_phone') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Lugar de trabajo</label>
                        <input type="text" class="mr-3 form-control {{ $errors->has('work') ? 'is-invalid' : '' }}" name="work">
                        @if ($errors->has('work'))
                        <div class="invalid-feedback">{{ $errors->first('work') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection