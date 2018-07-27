@extends('layouts.app') @section('content')
<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">{{$exam->patient->full_name}}</h2>
    </div>
</header>
<div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('patients.show', $exam->patient)}}">{{$exam->patient->full_name}}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('patients.exams', $exam->patient)}}">Exámenes</a>
        </li>
        <li class="breadcrumb-item active">Venta</li>
    </ul>
</div>
<section class="dashboard-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">{{$exam->created_at->diffForHumans()}}</h3>
                        <div class="badge badge-rounded bg-gray">{{$exam->creator->name}}</div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Esfera</th>
                                    <th>Cilindro</th>
                                    <th>Eje</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        OD - OI
                                        <br>
                                        <small>Oculus dexter</small>
                                    </th>
                                    <td>{{$exam->od_sphere}}</td>
                                    <td>{{$exam->od_cylinder}}</td>
                                    <td>{{$exam->od_axis}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        OS - OD
                                        <br>
                                        <small>Oculus sinister</small>
                                    </th>
                                    <td>{{$exam->os_sphere}}</td>
                                    <td>{{$exam->os_cylinder}}</td>
                                    <td>{{$exam->os_axis}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        OU - OA
                                        <br>
                                        <small>Oculus uterque</small>
                                    </th>
                                    <td>{{$exam->ou_sphere}}</td>
                                    <td>{{$exam->ou_cylinder}}</td>
                                    <td>{{$exam->ou_axis}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <form action="{{route('sales.store')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="exam_id" value="{{$exam->id}}">
                            <div class="form-group">
                                <label class="form-control-label">Material</label>
                                <select class="mr-3 form-control {{ $errors->has('material_id') ? 'is-invalid' : '' }}" name="material_id">
                                    @foreach($materials as $material)
                                    <option value="{{$material->id}}">{{$material->material}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('material_id'))
                                <div class="invalid-feedback">{{ $errors->first('material_id') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Armazón</label>
                                <input type="text" class="form-control" name="frame"> @if ($errors->has('frame'))
                                <div class="invalid-feedback">{{ $errors->first('frame') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Total</label>
                                <input type="text" class="form-control" name="total"> @if ($errors->has('total'))
                                <div class="invalid-feedback">{{ $errors->first('total') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Nota</label>
                                <input type="text" class="form-control" name="notes"> @if ($errors->has('notes'))
                                <div class="invalid-feedback">{{ $errors->first('notes') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection