<!-- resources/views/users/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Usuario</h1>

        @if (isset($user))
            <form action="{{ route('users.update', $user['id']) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" name="name" value="{{ $user['name'] }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" value="{{ $user['email'] }}" class="form-control" required>
                </div>

                <!-- Otros campos del formulario según tu estructura de datos -->

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                </div>
            </form>
        @else
            <p>No se encontraron datos de usuario en la API.</p>
        @endif
    </div>
@endsection
