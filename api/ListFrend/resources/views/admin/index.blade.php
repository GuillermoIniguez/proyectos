@extends('layouts.panel')

@section('title', 'Panel Admin')

@section('content')
<main >
    <div class="container-fluid px-4">
        <h1 class="mt-4" style="color: #212529">Bienvenido 
        @auth
            {{ auth()->user()->name }}
        @endauth
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">{{auth()->user()->level->name }}</li>
        </ol>
        <div class="row">
            @if(auth()->user()->level_id != 1)
            <div class="col-md-4">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Matches</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route('matches')}}">Ver Matches</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-md-4">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Intereses</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route('interests')}}">Ver intereses</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            @if(auth()->user()->level_id != 1)
            <div class="col-md-4">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Intereses Usuario</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route('userinterests')}}">Ver userInterest</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-md-4">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Usuarios</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route('users')}}">Ver Usuarios</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Texto</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="">Ver </a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
</main>
@endsection
