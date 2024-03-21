@extends('layouts.panel')

@section('title', 'Editar Interés')

@section('content')
<main>
    <div class="container mt-3">
        <h1 class="mt-4">Editar Interés</h1>

        <form action="{{ route('userinterests.update', $userInterest->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Campo de user_id -->
            <div class="mb-3">
                <label for="user_id" class="form-label">User ID</label>
                <input type="number" class="form-control" id="user_id" name="user_id" value="{{ $userInterest->user_id }}" required>
            </div>

            <!-- Campo de interest_id -->
            <div class="mb-3">
                <label for="interest_id" class="form-label">Interest ID</label>
                <input type="number" class="form-control" id="interest_id" name="interest_id" value="{{ $userInterest->interest_id }}" required>
            </div>

            <!-- Otros campos que deseas editar -->

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</main>
@endsection
