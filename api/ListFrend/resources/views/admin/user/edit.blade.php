@extends('layouts.panel')

@section('title', 'Editar Usuario')

@section('content')
<main>
    <div class="container mt-3">
        <h1 class="mt-4">Editar Usuario</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Campo de nombre -->
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>

            <!-- Campo de correo electrónico -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>

            <!-- Campo de teléfono -->
            <div class="mb-3">
                <label for="phone" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
            </div>

            <!-- Otros campos que deseas editar -->

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</main>
@endsection
