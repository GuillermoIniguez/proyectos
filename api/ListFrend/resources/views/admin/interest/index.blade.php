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
                @if(auth()->user()->level_id != 1)
                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addInterestModal"><i class="fas fa-plus"></i> Añadir Interés</button>
                @endif
            </div>
        </div>
        
        <div class="mb-4">
            <p>Mostrando <strong>{{ $interests->count() }}</strong> resultados de un total de <strong>{{ $interests->total() }}</strong></p>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Creado</th>
                        <th scope="col">Actualizado</th>
                        @if(auth()->user()->level_id != 1)
                            <th scope="col">Acciones</th>
                        @endif
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
                            @if(auth()->user()->level_id != 1)
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('interests.edit', $interest->id) }}" class="btn btn-sm btn-primary" role="button"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('interests.destroy', $interest->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $interests->links('pagination::bootstrap-4') }}
        </div>
    </div>
</main>

<!-- Modal para añadir interés -->
@if(auth()->user()->level_id != 1)
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
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

@endsection
