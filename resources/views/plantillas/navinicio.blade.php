<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOMOFTWARE</title>

    @include('plantillas.Efecto_sombra')


    <!-- HOJAS DE ESTILOS -->
    <link rel="icon" href="{{ asset('images/icono2.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
</head>
<body>
    <!-- NAV MENU -->
    <div class="container-fluid bg-custom-navbar sticky-top" style="z-index: 99; width: 100vw;">
        <nav class="navbar navbar-expand-md navbar-dark bg-custom-navbar container">
            <!-- NAV SECCION LOGO y NOMBRE PROYECTO -->
            <a class="navbar-brand" href="{{ route('privada') }}">
                <img src="images/icono2.png" width="30" height="30" class="d-inline-block align-top" alt=""> 
                Domoftware
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- ITEMS NAV -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                <div id="search-form">
    <input type="text" id="search-input" placeholder="¿Qué estás buscando?">
    <button id="search-button" onclick="buscar()">Buscar</button>
</div>


                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('privada') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacto') }}">Contactos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('quienes_somos') }}">Quiénes Somos</a>
                    </li>



                    @if (auth()->check())
                    <!-- BOTON PARA ABRIR EL SIDEBAR (HERRAMIENTAS) -->
                    <button class="open-btn px-2" onclick="openSidebar()" style="outline: none;">
                        <img src="{{ asset('images/configuraciones.png') }}" alt="Menú" class="img-small">
                    </button>
                    <!-- BOTON PARA CERRAR SESION -->
                    <button class="btn btn-danger btn-xs ml-2 mr-2 float-right custom-button" onclick="window.location.href='{{ route('logout') }}'" style="cursor: pointer;">
                        <i class="fas fa-sign-out-alt"></i> Salir
                    </button>



                    @else
                    <!-- BOTON PARA ABRIR EL MODAL (INICIAR SECCION) -->
                    <button class="btn btn-customized ml-3 custom-hover-button" data-toggle="modal" data-target="#loginModal" style="outline: none;">
                        <i class="fas fa-user"></i> Hola, identifícate
                    </button>
                    @endif
                </ul>
            </div>
        </nav>
    </div>

    <!--PARTICULAS DE GOTAS-->
    <div id="drop-container"></div>

    @if (auth()->check())
    <!-- SIDEBAR (HERRAMIENTAS) -->
    <div id="mySidebar" class="sidebar">
        <!-- SIDEBAR SECCION PARA PERFIL -->
        <div class="containeruser">
         <a href="{{ route('perfil') }}"> <img src="images/iconouser.png" alt="Icono" class="icon-image"></a>            
              <h5>{{ Auth::user()->name }}</h5>
              <h5>{{ Auth::user()->email }}</h5>
        </div>
        <!-- SIDEBAR SUBFUNIONES -->
        <div class="containeropciones">
            <div class="sidebar-content">
                <!-- SIDERBAR FUNCIONES REFENTES ARDUINO -->
                <div style="font-size: 18px; margin-left: 10px;">Arduino</div>
                <a href="#" onclick="redirigirAVista1()" style="font-size: 14px;"><i class="fas fa-eye" style="color: #939494;"></i> Cultivos</a>
                <a href="{{ route('arduino') }}" onclick="redirigirAVista1()" style="font-size: 14px;"><i class="fas fa-book" style="color: #939494;"></i> Historial</a>
                <!-- SIDERBAR FUNCIONES REFENTES CONFIGURACIONES -->
                <div style="font-size: 18px; margin-left: 10px;">Configuraciones</div>
                @if(Auth::user()->id_cargo == 1)
                    <a href="{{ route('privada_admin') }}" style="font-size: 14px;"><i class="fas fa-user" style="color: #939494;"></i> Administrar</a>
                    <a href="http://localhost/Domoftware/public/arduinoconfig" style="font-size: 14px;"><i class="fab fa-free-code-camp" style="color: #939494;"></i> Confi Arduino</a>
                @endif
                <a href="{{ route('profile.show') }}" style="font-size: 14px;"><i class="fas fa-cog" style="color: #939494;"></i> Opciones Avanzadas</a>
            </div>
        </div>
        <!-- BOTON PARA CERRAR EL SIDEBAR (HERRAMIENTAS) -->
        <div class="button-container">
            <button class="siderbar-button" onclick="closeSidebar()">
                <i class="fas fa-arrow-left"></i>
            </button>
        </div>
    </div>
    @endif



    <!-- Barra de busqueda -->
<script>
    function buscar() {
        var query = document.getElementById('search-input').value;
        window.location.href = 'resultados.html?query=' + encodeURIComponent(query);
    }
</script>








    <!-- MODAL PARA LOGIN, INICIO SECCION Y REGISTRO -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <article class="fondo">
                        <img src="{{ asset('images/icono3.png') }}" alt="User">
                        <h5 class="modal-title custom-centered" id="loginModalLabel">
                            <span class="animation-text">Bienvenido</span>
                        </h5>

                        <!-- PRUEBA DE ERRORES, EN CASO CREDENCIALES INCORRECTAS -->
                        @error('error')
                            <div style="text-align: center; padding: 9px; background-color: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; ">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Iniciar Sesión</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Registro</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">

                            <!-- Formulario de Iniciar Sesión -->
                            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                <form method="POST" action="{{ route('iniciar-sesión') }}" enctype="multipart/form-data">
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="correo@example.com *" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password"><i class="fas fa-lock"></i> Contraseña:</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="example123 *" required minlength="8">
                                        <br>
                                        <a href="{{ route('password.request') }}" class="forgot-password-link">¿Olvidaste tu contraseña?</a>
                                    </div>
                                    <button type="submit" class="boton" id="login">Iniciar Sesión</button>
                                    <br>
                                    <br>
                                </form>
                            </div>

                            <!-- Formulario de Registro -->
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                            <form method="POST" action="{{ route('registro.usuario') }}" enctype="multipart/form-data">
                                    <br>
                                    @csrf
                                    <div class="form-group">
                                        <label for="new-username"><i class="fas fa-user"></i> Nombre de Usuario:</label>
                                        <input type="text" class="form-control" id="new-username" name="name" required placeholder="Usuario123 *" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="new-email"><i class="fas fa-envelope"></i> Email:</label>
                                        <input type="email" class="form-control" id="emailInput" name="email" placeholder="correo@example.com *" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="new-password"><i class="fas fa-lock"></i> Contraseña:</label>
                                        <input type="password" class="form-control" id="passwordInput" name="password" placeholder="example123 *" required minlength="8">
                                    </div>
                                    <button type="submit" class="boton" id="register-button">Registrarse</button>
                                    <br>
                                    <br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

 
    <!-- BOTON PARA DESPLAZAR A INICIO O ARRIBA -->
    <button id="scrollToTopBtn" class="btn btn- rounded-circle position-fixed" 
        style="z-index: 999; bottom: 10px; right: 20px; display: none; background-color: #1e5c54; cursor: pointer;">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="{{ asset('js/Plantillanav.js') }}"></script>

</body>
</html>
