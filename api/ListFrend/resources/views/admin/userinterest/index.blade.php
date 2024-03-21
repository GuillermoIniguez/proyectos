@extends('layouts.panel')

@section('title', 'Intereses - Administrador')

@section('content')
<main>
    <div class="container mt-3">
        <h1 class="mt-4">
            <a href="{{ route('admin') }}" style="color: #212529; text-decoration: none; margin-right: 10px;"><i class="fas fa-arrow-left"></i></a>
            Intereses
        </h1>

        <!-- Alerta de éxito -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Número de resultados mostrados -->
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active" style="display: flex; align-items: center;">
                <div>
                    Mostrando <b>{{ $userinterests->count() }}</b> resultados
                    de un total de <b>{{ $userinterests->total() }}</b>
                </div>
            </li>
        </ol>

        <!-- Botón para añadir interés -->
        <div class="mb-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addInterestModal"><i class="fas fa-plus"></i> Añadir Interés</button>
        </div>

        <!-- Tabla de intereses -->
        <table class="table table-hover" style="border: 2px solid #212529; color: #212529;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Interest ID</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userinterests as $userinterests)
                <tr>
                    <td>{{ $userinterests->id }}</td>
                    <td>{{ $userinterests->user_id }}</td>
                    <td>{{ $userinterests->interest_id }}</td>
                    <td>
                        <div class="btn-group">
                            <!-- Botón para editar -->
                            <a href="{{ route('userinterests.edit', $userinterests->id) }}" class="btn btn-primary" role="button"><i class="fas fa-edit"></i></a>
                            <!-- Formulario para eliminar -->
                            <form action="{{ route('userinterests.destroy', $userinterests->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>                            
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
              
            </tfoot>
        </table>
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
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
