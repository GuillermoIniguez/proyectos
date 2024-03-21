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
                    Mostrando <b>{{ $interests->count() }}</b> resultados
                    de un total de <b>{{ $interests->total() }}</b>
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
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($interests as $interest)
                <tr>
                    <td>{{ $interest->id }}</td>
                    <td>{{ $interest->name }}</td>
                    <td>{{ $interest->category }}</td>
                    <td>{{ $interest->created_at }}</td>
                    <td>{{ $interest->updated_at }}</td>
                    <td>
                        <div class="btn-group">
                            <!-- Botón para editar -->
                            <a href="{{ route('interests.edit', $interest->id) }}" class="btn btn-primary" role="button"><i class="fas fa-edit"></i></a>
                            <!-- Formulario para eliminar -->
                            <form action="{{ route('interests.destroy', $interest->id) }}" method="POST" style="display: inline;">
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
                <tr>
                    <td colspan="6" class="ulpgcds-pager">
                        {{-- Enlaces de paginación --}}
                        {{ $interests->links('pagination::bootstrap-5') }}
                    </td>
                </tr>
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
                <form action="{{ route('interests.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoría</label>
                        <input type="text" class="form-control" id="category" name="category" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
