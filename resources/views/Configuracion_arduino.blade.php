<title>Actualización de Arduino</title>
   <!-- Menu -->
   @include('plantillas.navinicio')

<html>
<head>

</head>
<body>
  <!-- Formulario de actualizacion -->
  <h1>Configuración de Arduino</h1>
  <form action="/update" method="POST" enctype="multipart/form-data">
    SSID WiFi: <input type="text" name="ssid"><br>
    Contraseña WiFi: <input type="password" name="password"><br>
    Nuevo código: <input type="file" name="code"><br>
    <input type="submit" value="Actualizar">
  </form>
</body>
</html>

    <!-- Plantillas -->
    @include('plantillas.Terminos_condiciones')
    @include('plantillas.fooster')
    @include('plantillas.Animacion')