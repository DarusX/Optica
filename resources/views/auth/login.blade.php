@extends('layouts.app') 
@section('content')
<section>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Login</h3>
            </div>
            <div class="card-body">
                <form action="{{route('login')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="form-control-label">Usuario</label>
                        <input type="text" class="mr-3 form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" name="username">
                        @if ($errors->has('username'))
                        <div class="invalid-feedback">{{ $errors->first('username') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Contraseña</label>
                        <input type="password" class="mr-3 form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password">
                        @if ($errors->has('password'))
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
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