@extends('layouts.main')

@section('title', 'Landing Page')

@section('menu')
<!-- Barra de Navegación -->
<nav id="menu" class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('image/GT.png') }}" class="images" alt="..." height="36">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                        Trabajos
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#Text">text</a></li>
                        <li><a class="dropdown-item" href="#Text">text</a></li>
                        <li><a class="dropdown-item" href="#Text">text</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contacto">Contacto</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
                    data-bs-toggle="dropdown" aria-expanded="false">
                        Account
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                        <li><a class="dropdown-item" href="{{route('register')}}">Registro</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
@endsection

@section('content')
<!-- Encabezado con Jumbotron -->
<header class="jumbotron text-center" style="background-color: #212529; color: #fff; padding: 100px 0;">
    <h1 class="display-4">ListFrend</h1>
    <p class="lead">Haz relaciones sólidas con tus mismos intereses</p>
</header>

<!-- Carrusel de Imágenes -->
<div id="carouselExample1" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('image/amigos7.jpg') }}" class="d-block w-100" alt="Imagen 1">
            <div class="carousel-caption d-none d-md-block">
                <h5>Musica</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('image/amigos8.jpg') }}" class="d-block w-100" alt="Imagen 2">
            <div class="carousel-caption d-none d-md-block">
                <h5>Lectura</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('image/amigos9.jpg') }}" class="d-block w-100" alt="Imagen 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Deporte</h5>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample1" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample1" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Sección de ListFrend -->
<section id="listfrend" class="container-fluid section-container" style="background-color: #fff; color: #212529; padding: 100px 0;">
    <div class="container text-center">
        <h2 class="text-center">About ListFrend</h2>
        <p class="text-center">Somos una plataforma que se dedica a conectar personas con intereses similares para que puedan establecer relaciones significativas y duraderas.</p>
    </div>
</section>

<!-- Sección de Nombres de Intereses -->
<section id="nombres" class="container-fluid section-container" style="background-color: #fff; color: #212529; padding: 100px 0;">
    <div class="container text-center">
        <h2 class="text-center">Intereses</h2>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="text-center">
                    @foreach ($interests as $interest)
                    <p>{{ $interest->name }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Categorías de Intereses -->
<section id="categorias" class="container-fluid section-container" style="background-color: #f8f9fa; color: #212529; padding: 100px 0;">
    <div class="container text-center">
        <h2 class="text-center mb-5">Categorías</h2>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="text-center">
                    @foreach ($interests as $interest)
                    <p>{{ $interest->category }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Contacto -->
<section id="contacto" class="container-fluid section-container" style="background-color: #f8f9fa; color: #212529; padding: 100px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Información de Contacto</h2>
                <p><strong>Teléfono:</strong> (687) 109-5799</p>
                <p><strong>Correo:</strong> listfrendsupport@gmail.com</p>
            </div>
            <div class="col-md-6">
                <h2>Contacto</h2>
                <form class="row g-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" id="email" placeholder="Correo">
                    </div>
                    <div class="col-md-12">
                        <input type="tel" class="form-control" id="celular" placeholder="Celular">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Pie de Página -->
<footer class="text-center p-4 text-white" style="background-color: #212529;">
    <p>© [2024] Derechos de autor. Desarrollado por 
        <a href="https://www.instagram.com/guille_iniguez/" style="color: #27d7f7;">[Guillermo Iñiguez]</a>. Todos los derechos reservados.</p>
</footer>
@endsection

