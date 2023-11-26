
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- HOJA DE ESTILOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/Fooster/fooster.css') }}">
    
</head>
<body>



<!--RECTA ONDULAR SUPERIOR IMG EN EL FOOSTER-->
<img src="{{ asset('images/foster3.png') }}" alt="User" style="z-index: -1; width: 100vw;">

<footer class="extended-footer text-center text-lg-start text-white">
  <div class="container p-4 pb-0">
    <section class="">
      <div class="row">
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <h6 class="text-uppercase mb-4 font-weight-bold">
             Domoftware
          </h6>
          <p>
          Transformando el riego en agricultura y jardinería para un crecimiento óptimo con menos agua.
         </p>
        </div>

        <hr class="w-100 clearfix d-md-none" />

        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
          <h6 class="text-uppercase mb-4 font-weight-bold">Productos</h6>
          <p>
          <a class="text-white" href="https://play.google.com/store/apps/details?id=cc.arduino.create_editor&hl=es_CO&gl=US">Aplicación de Riego</a>
          </p>
          <p>
            <a class="text-white">Sensores</a>
          </p>
          <p>

          @if(Auth::check()) 
            <a class="text-white" href="{{ route('arduino') }}">Arduino</a>
        @else
           <a class="text-white" href="javascript:void(0);" onclick="openLoginModal();">Arduino</a>
        @endif
          </p>
         
        </div>

        <hr class="w-100 clearfix d-md-none" />

        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
          <h6 class="text-uppercase mb-4 font-weight-bold">
           Enlaces útiles
          </h6>
          <p>
            
          @if(Auth::check()) 
            <a class="text-white" href="{{ route('profile.show') }}">Tu Cuenta</a>
        @else
           <a class="text-white" href="javascript:void(0);" onclick="openLoginModal();">Tu Cuenta</a>
        @endif

          </p>
          <p>
            <a class="text-white" href="https://Domoftware.com/">Afiliados</a>
          </p>
          <p>
            <a class="text-white" href="https://Domoftware.com/">Ayuda</a>
          </p>
        </div>

        <hr class="w-100 clearfix d-md-none" />

        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
          <h6 class="text-uppercase mb-4 font-weight-bold">Contacto</h6>
          <p><i class="fas fa-home mr-3"></i> Popayan, COL</p>
          <p><i class="fas fa-envelope mr-3"></i> info@domoware.com</p>
          <p><i class="fas fa-phone mr-3"></i> +57 3215328266</p>
          <p><i class="fas fa-print mr-3"></i> +57 3186283576</p>
        </div>
      </div>
    </section>

    <hr class="my-3">

    <section class="p-3 pt-0">
      <div class="row d-flex align-items-center">
        <div class="col-md-7 col-lg-8 text-center text-md-start">
          <div class="p-3">
            © 2023 Copyright:
            <a class="text-white" href="http://localhost/Domoftware/public/home">Domoftware.com</a>
          </div>
        </div>

        <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
          <!-- Redes sociales -->
          <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/" role="button"
             class="text-white"
             role="button"
             ><i class="fab fa-facebook-f"></i
            ></a>

          <a class="btn btn-outline-light btn-floating m-1" href="https://www.Twitter.com" role="button"
             class="text-white"
             role="button"
             ><i class="fab fa-twitter"></i
            ></a>

          <a class="btn btn-outline-light btn-floating m-1" href="https://www.Google.com" role="button"
             class="text-white"
             role="button"
             ><i class="fab fa-google"></i
            ></a>

          <a class="btn btn-outline-light btn-floating m-1" href="https://www.Instagram.com" role="button"
             class="text-white"
             role="button"
             ><i class="fab fa-instagram"></i
            ></a>
        </div>
      </div>
    </section>
  </div>
</footer>




<script src="{{ asset('js/Fooster.js') }}"></script>


