<nav class="side-navbar">
    @auth
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar">
            <img src="{{asset('theme/img/avatar.gif')}}" alt="..." class="img-fluid rounded-circle">
        </div>
        <div class="title">
            <h1 class="h4">{{Auth::user()->name}}</h1>
            <p>{{Auth::user()->username}}</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus-->
    <span class="heading">Principal</span>
    <ul class="list-unstyled">
        <li><a href="/home"><i class="icon-home"></i>Incio </a></li>
        <li>
            <a href="#patients-menu" aria-expanded="false" data-toggle="collapse"><i class="icon-interface-windows"></i>Pacientes</a>
            <ul id="patients-menu" class="collapse list-unstyled ">
                <li><a href="{{route('patients.index')}}">Todos</a></li>
                <li><a href="{{route('patients.create')}}">Registrar</a></li>
            </ul>
        </li>
        
    </ul>
    <span class="heading">Reportes</span>
    <ul class="list-unstyled">
        <li><a href="{{route('sales.index')}}"><i class="icon-interface-windows"></i>Ventas</a></li>
    </ul>
    @endauth
</nav>