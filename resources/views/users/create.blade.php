<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crear Usuario</title>
@include('plantillas.navinicio')

    <br>
    <br>
    <br>
    <link rel="stylesheet" href="{{ asset('css/privada_admin.css') }}">

    
    <div class="container">

        <h1>Crear Usuario     <a href="{{ route('privada_admin') }}" class="btn btn-primary mb-2 float-right mt-2">Regresar</a>
</h1>


        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="id_cargo">Cargo:</label>
                <select class="form-control" id="id_cargo" name="id_cargo">
                    <option value="1" {{ old('id_cargo') == 1 ? 'selected' : '' }}>Administrador</option>
                    <option value="2" {{ old('id_cargo') == 2 ? 'selected' : '' }}>Usuario</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>

  <br>
  <br>
  <br>
  @include('plantillas.fooster')
  @include('plantillas.Animacion')

