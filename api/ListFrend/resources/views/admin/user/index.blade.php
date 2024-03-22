@extends('layouts.panel')

@section('title', 'Usuarios-Admin')

@section('content')
<main>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 mb-3">Usuarios</h1>
            </div>
            <div class="col-md-6 text-end">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(auth()->user()->level_id != 1)
                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal"><i class="fas fa-plus"></i> Añadir Usuario</button>
                @endif
            </div>
        </div>
        
        <div class="mb-4">
            <p>Mostrando <strong>{{ $users->count() }}</strong> resultados de un total de <strong>{{ $users->total() }}</strong></p>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo Electrónico</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                @if(auth()->user()->level_id != 1)
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary" role="button"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection

<!-- Modal para añadir usuario -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Añadir Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario para agregar usuario -->
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
