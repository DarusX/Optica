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
                                    Derecho
                                </th>
                                <td>
                                    <div class="form-group">
                                        <input type="number" step="0.01" class="form-control" name="od_sphere">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" step="0.01" class="form-control" name="od_cylinder">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" step="0.01" class="form-control" name="od_axis">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Izquierda
                                </th>
                                <td>
                                    <div class="form-group">
                                        <input type="number" step="0.01" class="form-control" name="os_sphere">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" step="0.01" class="form-control" name="os_cylinder">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" step="0.01" class="form-control" name="os_axis">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Ambos
                                </th>
                                <td>
                                    <div class="form-group">
                                        <input type="number" step="0.01" class="form-control" name="ou_sphere">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" step="0.01" class="form-control" name="ou_cylinder">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" step="0.01" class="form-control" name="ou_axis">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div class="form-group">
                                        <label for=""><strong>Adición</strong></label>
                                        <input type="number" step="0.01" name="addition" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for=""><strong>Alt</strong></label>
                                        <input type="number" step="0.01" name="alt" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for=""><strong>Distancia pupilar</strong></label>
                                        <input type="number" step="0.01" name="pupilary_distance" class="form-control">
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