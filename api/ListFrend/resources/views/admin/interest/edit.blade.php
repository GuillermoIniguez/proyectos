@extends('layouts.panel')

@section('title', 'Editar Interés')

@section('content')
<main>
    <div class="container mt-3">
        <h1 class="mt-4">Editar Interés</h1>

        <form action="{{ route('interests.update', $interest->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Campo de nombre -->
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $interest->name }}" required>
            </div>

            <!-- Campo de categoría -->
            <div class="mb-3">
                <label for="category" class="form-label">Categoría</label>
                <input type="text" class="form-control" id="category" name="category" value="{{ $interest->category }}" required>
            </div>

            <!-- Otros campos que deseas editar -->

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</main>
@endsection
