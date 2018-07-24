@extends('layouts.app') 
@section('content')
<section>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Examen - {{$patient->full_name}}</h3>
            </div>
            <div class="card-body">
                <form action="{{route('exams.store')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="patient_id" value="{{$patient->id}}">
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
                                    OD <br>
                                    <small>Oculus dexter</small>
                                </th>
                                <td>
                                    <div class="form-group">
                                        <input type="number" step="0.01" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" step="0.01" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" step="0.01" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    OS <br>
                                    <small>Oculus sinister</small>
                                </th>
                                <td>
                                    <div class="form-group">
                                        <input type="number" step="0.01" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" step="0.01" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" step="0.01" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    OU <br>
                                    <small>Oculus uterque</small>
                                </th>
                                <td>
                                    <div class="form-group">
                                        <input type="number" step="0.01" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" step="0.01" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" step="0.01" class="form-control">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection