<!DOCTYPE html>
<html lang="es">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <!-- Menu -->
    @include('plantillas.navinicio')
    <!-- Estilos -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/privada_admin.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

<br>
    <!-- Contenedor formulario de administrador -->

    <!-- Titulo y IMG -->
    <h2 class="titulo display-5 font-weight-light">Panel de Administrador</h2>
      <img src="{{ asset('images/nav6.png') }}" class="imgnav">

      <!-- Contenedor de usuarios -->
    <div class="container black-container">
      <!-- Prueba de errores -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

              <!-- Boton para crear usuarios -->

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearUsuarioModal">
                      <i class="fas fa-user-plus"></i>
                </button>

<br>
<br>
        <!-- Barra para buscar usuarios  -->
        <div class="input-group mb-3" style="z-index: 2;">
            <input type="text" id="search" class="form-control" placeholder="Buscar por nombre">
              <div class="input-group-append">
                <button class="btn btn-primary" id="searchBtn" type="button"><i class="fas fa-search"></i></button>
              </div>
        </div>


        <!-- Tabla de usuarios  -->
        <table class="table table-striped">

    <div class="container table-container mx-auto">
        <h1 class="my-4">Detalles de Usuarios</h1>

        @isset($users)
            @if (count($users) > 0)
                <!-- Tabla de usuarios -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><i class="fas fa-user text-primary"></i> Nombre</th>
                            <th><i class="fas fa-envelope text-info"></i> Email</th>
                            <th><i class="fas fa-briefcase text-success"></i> Cargo</th>
                            <th><i class="fas fa-cogs text-warning"></i> Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>
                                    @if ($user['id_cargo'] === 1)
                                        <i class="fas fa-user-shield text-danger"></i> Administrador
                                    @elseif ($user['id_cargo'] === 2)
                                        <i class="fas fa-user text-primary"></i> Usuario
                                    @endif
                                </td>
                                <!-- Botones de acciones -->
                                <td>
                                    <a href="#" class="btn btn-warning">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $user['id']) }}" method="POST" style="display: inline">
                                     @csrf
                                     @method('DELETE')
                                      <button type="submit" class="btn btn-danger">
                                          <i class="fas fa-trash"></i>
                                      </button>
                                   </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="alert alert-warning">No hay usuarios disponibles.</p>
            @endif
        @else
            <p class="alert alert-danger">Error al obtener los datos de la API.</p>
        @endisset
    </div>
        
        </table>
    </div>




<!-- Modal para crear usuarios -->
<div class="modal fade" id="crearUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

    <!-- JS -->
    <script src="{{ asset('js/Plantillanav.js') }}"></script>

<br>
<br>

    <!-- Plantillas -->
    @include('plantillas.Terminos_condiciones')
    @include('plantillas.fooster')
    @include('plantillas.Animacion')
</body>
</html>
