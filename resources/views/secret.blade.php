<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Menu -->
    @include('plantillas.navinicio')
    <!-- Estilos -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">


    <!-- Fondo video -->
    <video autoplay muted loop id="video-background">
        <source src="{{ asset('videos/video4.mp4') }}" type="video/mp4">
        Tu navegador no admite videos HTML5.
    </video>


    <!-- Titulo y logo -->
    <h1>Bienvenido {{ Auth::user()->name }}</h1>

    <!-- Hora y fecha -->
      <div id="hora-actual"></div>
      <div id="fecha"></div>

      <br>

    <!-- Logo -->
        <div class="container text-center"> 
            <img src="{{ asset('images/Icono2.png') }}" alt="Tu Logo" class="logo pulse-animation">
       </div>
     <br>
   <br>



    <!-- Funciones js -->
    <script src="{{ asset('js/Home_priv.js') }}"></script>



    <!-- Plantillas -->
    @include('plantillas.Efecto_sombra')
    @include('plantillas.Terminos_condiciones')
    @include('plantillas.fooster')
    @include('plantillas.Animacion')
