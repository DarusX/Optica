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
                            <strong><i class="fas fa-glasses"></i></strong>
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
                    @auth
                    <li class="nav-item d-flex align-items-center">
                        <a id="search" href="#">
                            <i class="icon-search"></i>
                        </a>
                    </li>
                    <!-- Notifications-->
                    <li class="nav-item dropdown">
                        <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" class="nav-link">
                            <i class="fas fa-glasses"></i>
                            <span class="badge bg-green badge-corner">{{App\Sale::whereNotIn('status', ['Entregado'])->count()}}</span>
                        </a>
                        <ul aria-labelledby="notifications" class="dropdown-menu">
                            <li>
                                <a rel="nofollow" href="{{route('sales.index', ['status' => 'Preparando'])}}" class="dropdown-item">
                                    <div class="notification">
                                        <div class="notification-content">
                                            <i class="fas fa-spinner fa-spin bg-orange"></i>{{App\Sale::where('status', 'Preparando')->count()}} Preparando</div>
                                        <div class="notification-time">
                                            <small>{{Carbon\Carbon::now()->format('h:i a')}}</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a rel="nofollow" href="{{route('sales.index', ['status' => 'Listo'])}}" class="dropdown-item">
                                    <div class="notification">
                                        <div class="notification-content">
                                            <i class="fas fa-check bg-green"></i>{{App\Sale::where('status', 'Listo')->count()}} Listo</div>
                                        <div class="notification-time">
                                            <small>{{Carbon\Carbon::now()->format('h:i a')}}</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Messages-->
                    <li class="nav-item dropdown">
                        <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" class="nav-link">
                            <i class="fas fa-user-clock"></i>
                            <span class="badge bg-red badge-corner">{{App\Patient::whereHas('sales', function($query){ $query->where('paid', 0); })->count()}}</span>
                        </a>
                        <ul aria-labelledby="notifications" class="dropdown-menu">
                            @foreach(App\Patient::whereHas('sales', function($query){ $query->where('paid', 0); })->get() as $patient)
                            <li>
                                <a rel="nofollow" href="{{route('patients.sales', $patient)}}" class="dropdown-item d-flex">
                                    <div class="msg-profile">
                                        @if($patient->gender == 'Hombre')
                                        <i class="fas fa-male bg-red"></i>
                                        @else
                                        <i class="fas fa-female bg-red"></i>
                                        @endif
                                    </div>
                                    <div class="msg-body">
                                        <h3 class="h5">{{$patient->full_name}}</h3>
                                        <span>{{number_format($patient->sales->sum('remaining'), 2)}}</span>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endauth
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