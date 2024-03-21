@extends('layouts.panel')

@section('title', 'Matches-Admin')

@section('content')
<main>
    <div class="container mt-3">
        <h1 class="mt-4">
            <a href="{{ route('admin') }}" style="color: #212529; text-decoration: none; margin-right: 10px;"><i class="fas fa-arrow-left"></i></a>
            Matches
        </h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active" style="display: flex; align-items: center;">
                <div>
                    Mostrando <b>{{ $matches->count() }}</b> resultados
                    de un total de <b>{{ $matches->total() }}</b>
                </div>
            </li>
        </ol>
        
        <div class="mb-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCategoryModal"><i class="fas fa-plus"></i> Añadir Matches</button>
        </div>

        <table class="table table-hover" style="border: 2px solid #212529; color: #212529;">
            <thead>
                <tr>
                    <th>Registro</th>
                    <th>Id</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
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
                        <div class="btn-group">
                            <a href="{{ route('matche-edit', $match->id) }}" class="btn btn-primary" role="button"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('matche-destroy', $match->id) }}" method="POST" style="display: inline;">
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
                    <td colspan="5" class="ulpgcds-pager">
                        {{-- Enlaces de paginación --}}
                        {{ $matches->links('pagination::bootstrap-5') }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div> 
</main>

<!-- Modal para agregar categoría -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Añadir Match</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
    <!-- Formulario para agregar partido -->
    <form action="{{ route('matche-store') }}" method="POST">
        @csrf
        <!-- Campo para seleccionar el usuario -->
        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <select class="form-select" id="user_id" name="user_id" required>
                @foreach($user as $user)
                    <option value="{{ $user->id }}">{{ $user->name . ' ' . $user->surname }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

        </div>
    </div>
</div>

@endsection