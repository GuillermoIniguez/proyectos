@extends('layouts.panel')

@section('title', 'Matches-Admin')

@section('content')
<main>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 mb-3">Matches</h1>
            </div>
            <div class="col-md-6 text-end">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addMatchModal"><i class="fas fa-plus"></i> Añadir Matches</button>
            </div>
        </div>
        
        <div class="mb-4">
            <p>Mostrando <strong>{{ $matches->count() }}</strong> resultados de un total de <strong>{{ $matches->total() }}</strong></p>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($matches as $match)
                        <tr>
                            <td>{{ $loop->index + $matches->firstItem() }}</td>
                            <td>#{{ $match->id }}</td>
                            <td>
                                @if($match->user)
                                    {{ $match->user->name . ' ' . $match->user->surname }}
                                @else
                                    Usuario no encontrado
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('matche-edit', $match->id) }}" class="btn btn-sm btn-primary" role="button"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('matche-destroy', $match->id) }}" method="POST">
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
        <div class="d-flex justify-content-center">
            {{ $matches->links('pagination::bootstrap-4') }}
        </div>
    </div>
</main>

<!-- Modal para agregar matches -->
<div class="modal fade" id="addMatchModal" tabindex="-1" aria-labelledby="addMatchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMatchModalLabel">Añadir Match</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('matche-store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Usuario</label>
                        <select class="form-select" id="user_id" name="user_id" required>
                            @foreach($user as $user)
                                <option value="{{ $user->id }}">{{ $user->name . ' ' . $user->surname }}</option>
                            @endforeach
                        </select>
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
