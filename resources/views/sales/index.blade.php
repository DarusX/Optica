@extends('layouts.app') @section('content')
<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom"></h2>
    </div>
</header>
<div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href=""></a>
        </li>
        <li class="breadcrumb-item active">Exámenes</li>
    </ul>
</div>
<section class="dashboard-header">
    <div class="container-fluid">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                <tr>
                    <td>{{$sale->id}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection