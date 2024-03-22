<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
    integrity="sha512-BBG4F1PCJ6FkacWw4zEByZl/U2T7jtjz3EHRW/x0h+eEvRrQFc1vqV+HtvW2uhvMzg5rflsbjQbUa4wqFl8R4g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>


</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" >Panel Administrativo</a>
        <!-- Navbar Search-->
        <form action="{{ route('search') }}" method="GET" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" name="query" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('image/Perfil/' . auth()->user()->image) }}" alt="Configuracion" class="rounded-circle" style="width: 30px; height: 30px;">
                </a>
                @auth
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @if(auth()->user()->level_id == 3)
                            <li><a class="dropdown-item" href="{{ route('user') }}">Usuarios</a></li>
                        @endif
                        <li>  <a class="dropdown-item" href="{{ route('config') }}">Perfil</a>                                </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Cerrar Sesión
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                @endauth
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading"></div>
                        <a class="nav-link" href="{{ route('admin') }}">
                            <div class="sb-nav-link-icon" ><i class="fas fa-home-alt"></i></div>
                            Inicio
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-copy"></i></div>
                            Secciones
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                @if(auth()->user()->level_id != 1)
                                <a class="nav-link" href="{{ route('matches') }}">
                                    <i class="fas  fa-sm me-2"></i> Matches
                                </a>
                                @endif
                                <a class="nav-link" href="{{ route('interests') }}">
                                    <i class="fas fa-sm me-2"></i> Intereses
                                </a>
                                @if(auth()->user()->level_id == 2)
                                <a class="nav-link" href="{{ route('userinterests') }}">
                                    <i class="fas  fa-sm me-2"></i> Intereses Usuario
                                </a>
                                @endif
                                <a class="nav-link" href="{{ route('users') }}">
                                    <i class="fas  fa-sm me-2"></i> Usuarios
                                </a>
                            </nav>
                        </div>

                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-people-group"></i></div>
                            Personal
                        </a>
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-clipboard"></i></div>
                            Registros
                        </a>
                    </div>
                </div>

                <div class="sb-sidenav-footer">
                    <div class="small">{{auth()->user()->level->name }} Logueado</div>
                    @auth
                    {{ auth()->user()->name . ' ' . auth()->user()->surname }}
                    @endauth
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            @yield('content')
            <footer class="py-4 mt-auto" style="background-color: #f8f9fa">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2024</div>
                        <div>
                            <a href="#" style="color: #2A6376">Privacy Policy</a>
                            &middot;
                            <a href="#" style="color: #2A6376">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

</body>
</html>
{{ auth()->user()->name }} {{ auth()->user()->surname }} - {{ auth()->user()->level->name }}

