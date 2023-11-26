<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiénes Somos</title>
    <!-- Menu -->
    @include('plantillas.navinicio')
    <!-- Estilos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/quienessomos.css') }}">
   

    <!-- Titulo y imgs -->

      <h2 class="titulo display-5 font-weight-light">PENSAMOS, DISEÑAMOS Y CONSTRUIMOS</h2>
           <img src="{{ asset('images/nav6.png') }}" class="imgnav">
      <div class="bg-light">
        <div style="text-align: center;">
           <img src="{{ asset('equipo/Equipo.png') }}" alt="" class="Img-equ img-fluid floating-image" style="max-width: 700px;">
             <h2 class="display-4 font-weight-light"></h2><p style="max-width: 81%; margin: 0 auto; text-align: center;">En el núcleo de nuestra filosofía reside la trinidad de la innovación: pensar, diseñar y construir. Somos arquitectos de ideas, artesanos de soluciones y constructores de sueños. Abrazamos la pasión de los visionarios, explorando lo desconocido, desafiando lo convencional y transformando desafíos en oportunidades.Diseñamos con elegancia y funcionalidad, forjando soluciones hermosas y efectivas. Construimos con determinación, llevando nuestras visiones de la imaginación a la realidad. Cada paso de nuestro viaje nos impulsa a crear un futuro mejor. Somos la personificación de la creatividad y la innovación.</p>
        </div>
      </div>

    <br>
    <br>


<!-- Quienes somos descripcion -->

<div class="bg-white">
  <div class="container py-5">
   <div class="contenedords">
      <span class="icono-font-awesome2"><i class="fas fa-users fa-3x"></i></span>
        <img src="{{ asset('png/quienessomos2.png') }}" alt="Imagends" id="imagends" style="max-width: 500px;">
        <div class="texto-ocultods font-italic text-muted mb-4" id="textods">
          <h2 class="display-4 font-weight-light">Quiénes Somos</h2>
          Somos aprendices del SENA, estudiantes de Tecnología 
          en Programación de Software, apasionados por la agricultura 
          y la innovación tecnológica. Nuestro objetivo es 
          aplicar nuestras habilidades en programación para desarrollar 
          soluciones que mejoren la eficiencia y sostenibilidad en la agricultura. 
          Estamos comprometidos con el desarrollo de un sector agrícola 
          más inteligente y amigable con el medio ambiente.</p>
      </div>    
    </div>

      </div>
    </div>
  </div>
</div>



<!-- Nuestra mision Descripcion -->

<div class="bg-light">
  <div class="container py-5">
      <div class="contenedord">
      <span class="icono-font-awesome1"><i class="fas fa-bullseye fa-3x"></i></span>
        <img src="{{ asset('png/quienessomos.png') }}" alt="Imagend" id="imagend">
        <div class="texto-ocultod font-italic text-muted mb-4" id="textod">
        <p style="text-align: right;">
          <h2 class="display-4 font-weight-light">Nuestra Misión</h2>
          <p> Es liderar la industria
          con una aplicación móvil y web innovadora<br>
          para el control eficiente del riego en cultivos,<br>
          priorizando la sostenibilidad y la satisfacción del usuario.</p>
      </div>    
    </div>


      </div>
    </div>
  </div>
</div>


<!-- Nuestra vision descripcion -->

<div class="bg-white py-5">
  <div class="container py-5">
    <div class="contenedor">
    <span class="icono-font-awesome"><i class="fas fa-info-circle fa-4x"></i></span>
        <img src="{{ asset('png/quienessomosvision.png') }}" alt="Imagen"  id="imagen">
        <div class="texto-oculto font-italic text-muted mb-4" id="texto">
        <h2 class="display-4 font-weight-light">Nuestra vision</h2>
        <p style="text-align: left;">Es liderar la industria con una aplicación móvil y web innovadora <br>
         para el control eficiente del riego en cultivos,<br>
        priorizando la sostenibilidad y la satisfacción del usuario.</p>
      </div>    
    </div>

      </div>
    </div>
  </div>
</div>

  </div>
</div>

<!-- Descripcion del equipo y imgs -->

<div class="bg-light py-5">
  <div class="container py-5">
    <div class="row mb-4">
      <div class="col-lg-5">
        <h2 class="display-4 font-weight-light">Nuestro personal</h2>
        <p class="font-italic text-muted">Apasionado por lo que hacemos y con una amplia experiencia para brindarte soluciones excepcionales. Descubre cómo trabajamos juntos para ofrecerte lo mejor en cada proyecto. ¡Únete a nosotros!</p>
      </div>
    </div>

     <!-- Daniel Lopez -->

    <div class="row text-center">
      <div class="col-xl-3 col-sm-6 mb-5">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('equipo/daniel.jpeg') }}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h5 class="mb-0">Daniel Lopez</h5><span class="small text-uppercase text-muted">Programador</span>
          <ul class="social mb-0 list-inline mt-3">
                <li class="list-inline-item"><a href="https://www.facebook.com/DanieLopeU/" class="social-link"><i class="fab fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="https://www.twitter.com/" class="social-link"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="https://www.instagram.com/" class="social-link"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="https://www.linkedin.com/" class="social-link"><i class="fab fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>

     <!-- Santiago meneses -->
     
      <div class="col-xl-3 col-sm-6 mb-5">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('equipo/santiago.jpeg') }}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h5 class="mb-0">Santiago meneses</h5><span class="small text-uppercase text-muted">Documentador</span>
          <ul class="social mb-0 list-inline mt-3">
                <li class="list-inline-item"><a href="https://www.facebook.com/" class="social-link"><i class="fab fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="https://www.twitter.com/" class="social-link"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="https://www.instagram.com/" class="social-link"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="https://www.linkedin.com/" class="social-link"><i class="fab fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    
     <!-- Johan Enriquez -->
     
      <div class="col-xl-3 col-sm-6 mb-5">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('equipo/andres.jpeg') }}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h5 class="mb-0">Johan Enriquez</h5><span class="small text-uppercase text-muted">Programador</span>
          <ul class="social mb-0 list-inline mt-3">
                <li class="list-inline-item"><a href="https://www.facebook.com/" class="social-link"><i class="fab fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="https://www.twitter.com/" class="social-link"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="https://www.instagram.com/" class="social-link"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="https://www.linkedin.com/" class="social-link"><i class="fab fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>

     <!-- Yuliana Morales -->
     
      <div class="col-xl-3 col-sm-6 mb-5">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('equipo/yuliana.jpeg') }}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h5 class="mb-0">Yuliana Morales</h5><span class="small text-uppercase text-muted">Documentador</span>
          <ul class="social mb-0 list-inline mt-3">
                <li class="list-inline-item"><a href="https://www.facebook.com/" class="social-link"><i class="fab fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="https://www.twitter.com/" class="social-link"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="https://www.instagram.com/" class="social-link"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="https://www.linkedin.com/" class="social-link"><i class="fab fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- Funciones JS -->
     <script src="{{ asset('js/quienessomos.js') }}"></script>


     <!-- Plantillas -->
     @include('plantillas.Terminos_condiciones')
     @include('plantillas.fooster')
     @include('plantillas.Animacion')