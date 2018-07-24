@extends('layouts.app') 
@section('content')
<section>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Pacientes</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patients as $patient)
                        <tr>
                            <td>{{$patient->full_name}}</td>
                            <td>{{$patient->phone}}</td>
                            <td>
                                <a href="{{route('patients.edit', $patient)}}" class="btn btn-xs btn-success"><i class="fa fa-font" aria-hidden="true"></i></a>
                                <a href="{{route('patients.edit', $patient)}}" class="btn btn-xs btn-success"><i class="fa fa-book" aria-hidden="true"></i></a>
                                <a href="{{route('patients.edit', $patient)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="{{route('patients.edit', $patient)}}" class="btn btn-xs btn-danger destroy"><i class="fa fa-times" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection