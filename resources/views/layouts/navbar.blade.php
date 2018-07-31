<header class="header">
    <nav class="navbar">
        <!-- Search Box-->
        <div class="search-box">
            <button class="dismiss">
                <i class="icon-close"></i>
            </button>
            <form action="{{route('patients.index')}}" method="GET" >
                <input type="search" placeholder="Paciente" class="form-control" name="query">
            </form>
        </div>
        <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
                <!-- Navbar Header-->
                <div class="navbar-header">
                    <!-- Navbar Brand -->
                    <a href="index.html" class="navbar-brand d-none d-sm-inline-block">
                        <div class="brand-text d-none d-lg-inline-block">
                            @auth
                            <span>{{Auth::user()->branch->branch}}</span>
                            @endauth
                        </div>
                        <div class="brand-text d-none d-sm-inline-block d-lg-none">
                            <strong>BD</strong>
                        </div>
                    </a>
                    <!-- Toggle Button-->
                    <a id="toggle-btn" href="#" class="menu-btn active">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </div>
                <!-- Navbar Menu -->
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    <!-- Search-->
                    <li class="nav-item d-flex align-items-center">
                        <a id="search" href="#">
                            <i class="icon-search"></i>
                        </a>
                    </li>
                    <!-- Notifications-->
                    <li class="nav-item dropdown">
                        <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" class="nav-link">
                            <i class="fa fa-bell-o"></i>
                            <span class="badge bg-red badge-corner">{{App\Sale::whereNotIn('status', ['Entregado'])->count()}}</span>
                        </a>
                        <ul aria-labelledby="notifications" class="dropdown-menu">
                            <li>
                                <a rel="nofollow" href="#" class="dropdown-item">
                                    <div class="notification">
                                        <div class="notification-content">
                                            <i class="fa fa-envelope bg-green"></i>{{App\Sale::where('status', 'Preparando')->count()}} Preparando</div>
                                        <div class="notification-time">
                                            <small>{{Carbon\Carbon::now()->format('h:i a')}}</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a rel="nofollow" href="#" class="dropdown-item">
                                    <div class="notification">
                                        <div class="notification-content">
                                            <i class="fa fa-envelope bg-green"></i>{{App\Sale::where('status', 'Listo')->count()}} Listo</div>
                                        <div class="notification-time">
                                            <small>{{Carbon\Carbon::now()->format('h:i a')}}</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Messages                        -->
                    <li class="nav-item dropdown">
                        <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" class="nav-link">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-orange badge-corner">{{App\Sale::where('paid', 0)->count()}}</span>
                        </a>
                        <ul aria-labelledby="notifications" class="dropdown-menu">
                            @foreach(App\Sale::where('paid', 0)->get() as $sale)
                            <li>
                                <a rel="nofollow" href="{{route('patients.sales', $sale->exam->patient)}}" class="dropdown-item d-flex">
                                    <div class="msg-profile">
                                        <img src="{{asset('theme/img/avatar-1.jpg')}}" alt="..." class="img-fluid rounded-circle">
                                    </div>
                                    <div class="msg-body">
                                        <h3 class="h5">{{$sale->exam->patient->full_name}}</h3>
                                        <span>{{number_format($sale->remaining, 2)}}</span>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <!-- Logout    -->
                    <li class="nav-item">
                        @auth
                        <a href="#" class="nav-link logout">
                            <span class="d-none d-sm-inline">Salir</span>
                            <i class="fa fa-sign-out"></i>
                        </a>
                        @else
                        <a href="{{route('login')}}" class="nav-link">
                            <span class="d-none d-sm-inline">Ingresar</span>
                            <i class="fa fa-sign-out"></i>
                        </a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>