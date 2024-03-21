@extends('layouts.panel')

@section('title', 'Editar Partido')

@section('content')
<main>
    <div class="container mt-3">
        <h1 class="mt-4">Editar Partido</h1>

        <form action="{{ route('matche-update', $match->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Campo de usuario -->
            <div class="mb-3">
                <label for="user_id" class="form-label">Usuario</label>
                <select class="form-select" id="user_id" name="user_id">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $match->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Otros campos que deseas editar -->

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</main>
@endsection
