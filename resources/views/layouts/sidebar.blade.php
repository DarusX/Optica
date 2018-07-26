<nav class="side-navbar">
    @auth
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar">
            <img src="{{asset('theme/img/user.png')}}" alt="..." class="img-fluid rounded-circle">
        </div>
        <div class="title">
            <h1 class="h4">{{Auth::user()->name}}</h1>
            <p>{{Auth::user()->username}}</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus-->
    <span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active">
            <a href="index.html">
                <i class="icon-home"></i>Home </a>
        </li>
        <li>
            <a href="#patients-menu" aria-expanded="false" data-toggle="collapse">
                <i class="icon-interface-windows"></i>Pacientes</a>
            <ul id="patients-menu" class="collapse list-unstyled ">
                <li>
                    <a href="{{route('patients.index')}}">Todos</a>
                </li>
                <li>
                    <a href="{{route('patients.create')}}">Registrar</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#sales-menu" aria-expanded="false" data-toggle="collapse">
                <i class="icon-interface-windows"></i>Ventas</a>
            <ul id="sales-menu" class="collapse list-unstyled ">
                <li>
                    <a href="{{route('sales.index', ['query' => 'Buscar'])}}">Todas</a>
                </li>
                <li>
                    <a href="{{route('sales.index', ['query' => 'pendientes'])}}">Pendientes</a>
                </li>
                <li>
                    <a href="{{route('sales.index', ['query' => 'listas'])}}">Listas</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="login.html">
                <i class="icon-interface-windows"></i>Login page </a>
        </li>
    </ul>
    <span class="heading">Extras</span>
    <ul class="list-unstyled">
        <li>
            <a href="#">
                <i class="icon-flask"></i>Demo </a>
        </li>
        <li>
            <a href="#">
                <i class="icon-screen"></i>Demo </a>
        </li>
        <li>
            <a href="#">
                <i class="icon-mail"></i>Demo </a>
        </li>
        <li>
            <a href="#">
                <i class="icon-picture"></i>Demo </a>
        </li>
    </ul>
    @endauth
</nav>