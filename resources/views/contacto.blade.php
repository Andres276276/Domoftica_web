<!DOCTYPE html>
<html lang="es">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos</title>
    <!-- Menu -->
    @include('plantillas.navinicio')
    <!-- Estilos -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">

</head>
    <body>
        

    <!-- Titulo y IMG -->
    <h2 class="titulo display-5 font-weight-light ">CONTACTANOS</h2>
    <img src="{{ asset('images/nav6.png') }}" class="imgnav">


    <!-- Formulario de contactanos -->
<div class="container contact-form-container">
    <div class="row">
        <div class="col-md-6">
            <div class="text-center">
                <div class="contact-form-image" style="margin-top: -20px;">
                    <img src="{{ asset('png/cohete.png') }}" alt="rocket_contact" style="width: 100px; height: 100px;" />
                </div>
                <form method="post">
                    <h3>Envíanos un mensaje</h3>
                    <div class="form-group">
                        <input type="text" name="txtName" class="form-control" placeholder="Tu nombre *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="txtEmail" class="form-control" placeholder="Tu email *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="txtPhone" class="form-control" placeholder="Tu número telefónico *" value="" />
                    </div>
                    <div class="form-group">
                        <textarea name="txtMsg" class="form-control" placeholder="Tu mensaje *" style="width: 100%; height: 150px;"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btnSubmit" class="btnContact" value="Enviar mensaje" />
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <br>
            <!-- Mapa google -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.194412545675!2d-76.60535142624508!3d2.4422072570939672!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e30030589955553%3A0xd69716d2be93c1df!2sSENA%20Centro%20De%20Comercio%20Y%20Servicios!5e0!3m2!1ses-419!2sco!4v1697755290355!5m2!1ses-419!2sco" width="530" height="530" style="border:0; border-radius: 15px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <!-- Horarios de atencion -->
                <h2 class="text-center">Horario de Atención</h2>
             <p class="text-center">Lunes a Sábado: 9:00 AM - 6:00 PM</p>       
    </div>
  </div>
</div>


<!-- 
<div class="valoracion">

<button>
    <i class="fas fa-star"></i>
</button>

<button>
    <i class="fas fa-star"></i>
</button>

<button>
    <i class="fas fa-star"></i>
</button>

<button>
    <i class="fas fa-star"></i>
</button>

<button>
    <i class="fas fa-star"></i>
</button>

</div>

    <style>
        :root {
            --color-inactivo: #5f5050;
            --color-hover: #ffa400;
        }
        .valoracion {
            display: flex;
            flex-direction: row-reverse;
        }
        .valoracion button {
            background-color: initial;
            border: 0;
            color: var(--color-inactivo);
            transition: 1s all;
        }
        .valoracion button:hover {
            cursor: pointer;
            color: var(--color-hover);
            transform: rotate(360deg);
        }
        button:nth-child(1):hover ~ button {
            color: var(--color-hover);
            transform: rotate(360deg);
        }
        button:nth-child(2):hover ~ button {
            color: var(--color-hover);
            transform: rotate(360deg);
        }
        button:nth-child(3):hover ~ button {
            color: var(--color-hover);
            transform: rotate(360deg);
        }
        button:nth-child(4):hover ~ button {
            color: var(--color-hover);
            transform: rotate(360deg);
        }
        button:nth-child(5):hover ~ button {
            color: var(--color-hover);
            transform: rotate(360deg);
        }
    </style>

     -->
    <!-- Plantillas -->
    @include('plantillas.Terminos_condiciones')
    @include('plantillas.fooster')
    @include('plantillas.Animacion')


