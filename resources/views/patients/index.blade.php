@extends('layouts.app') 
@section('content')
<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Pacientes</h2>
    </div>
</header>
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
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($patients as $patient)
                        <tr>
                            <td><a href="{{route('patients.show', $patient)}}">{{$patient->full_name}}</a></td>
                            <td>
                                <a href="{{route('patients.show', $patient)}}" class="btn btn-xs btn-success"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                <a href="{{route('patients.edit', $patient)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="{{route('patients.destroy', $patient)}}" class="btn btn-xs btn-danger destroy"><i class="fa fa-times" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @empty
                            <td>No se encontró ningun registro</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection