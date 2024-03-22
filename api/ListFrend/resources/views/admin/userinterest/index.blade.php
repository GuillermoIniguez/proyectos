@extends('layouts.panel')

@section('title', 'Intereses - Administrador')

@section('content')
<main>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 mb-3">Intereses</h1>
            </div>
            <div class="col-md-6 text-end">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addInterestModal"><i class="fas fa-plus"></i> Añadir Interés</button>
            </div>
        </div>
        
        <div class="mb-4">
            <p>Mostrando <strong>{{ $userinterests->count() }}</strong> resultados de un total de <strong>{{ $userinterests->total() }}</strong></p>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Interest ID</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userinterests as $userinterest)
                        <tr>
                            <td>{{ $userinterest->id }}</td>
                            <td>{{ $userinterest->user ? $userinterest->user->name : 'Usuario no encontrado' }}</td>
                            <td>{{ $userinterest->interest ? $userinterest->interest->name : 'Interes no encontrado' }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('userinterests.edit', $userinterest->id) }}" class="btn btn-sm btn-primary" role="button"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('userinterests.destroy', $userinterest->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Modal para añadir interés -->
<div class="modal fade" id="addInterestModal" tabindex="-1" aria-labelledby="addInterestModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInterestModalLabel">Añadir Interés</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario para agregar interés -->
                <form action="{{ route('userinterests.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User ID</label>
                        <input type="number" class="form-control" id="user_id" name="user_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="interest_id" class="form-label">Interest ID</label>
                        <input type="number" class="form-control" id="interest_id" name="interest_id" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
