<div class="col-md-6">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h3 class="h4">{{$exam->created_at->format('d M Y')}}</h3>
            <div class="badge badge-rounded bg-gray">{{$exam->creator->name}}</div>
            @if(count($exam->sales))
            <div class="badge badge-rounded bg-blue">Con venta</div>
            @endif
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
                            Izquierdo
                        </th>
                        <td>{{$exam->od_sphere}}</td>
                        <td>{{$exam->od_cylinder}}</td>
                        <td>{{$exam->od_axis}}</td>
                    </tr>
                    <tr>
                        <th scope="row">
                            Derecho
                        </th>
                        <td>{{$exam->os_sphere}}</td>
                        <td>{{$exam->os_cylinder}}</td>
                        <td>{{$exam->os_axis}}</td>
                        
                    </tr>
                    <tr>
                        <th scope="row">
                            Ambos
                        </th>
                        <td>{{$exam->ou_sphere}}</td>
                        <td>{{$exam->ou_cylinder}}</td>
                        <td>{{$exam->ou_axis}}</td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td><strong>Adición: </strong>{{$exam->addition}}</td>
                        <td><strong>Alt: </strong>{{$exam->alt}}</td>
                        <td><strong>Distancia pupilar: </strong>{{$exam->pupilary_distance}}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{route('sales.create', $exam)}}" class="btn bg-warning" style="color: #000">
                <i class="fas fa-glasses" aria-hidden="true"></i> Seleccionar armazón
            </a>
        </div>
    </div>
</div>