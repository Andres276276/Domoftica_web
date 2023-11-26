
<link rel="stylesheet" href="{{ asset('css/Terminos_C/Terminos.css') }}">



<style>
    .whaftsaap {
        position: fixed;
        bottom: 35px; /* Ajusta la posición desde la parte inferior según sea necesario */
        right: 35px; /* Ajusta la posición desde la derecha según sea necesario */
        width: 70px;
        height: 70px;
        transition: transform 0.4s ease; 

        z-index: 99;


    }

    .whaftsaap:hover {
        transform: translateX(20px); /* Desplaza el elemento hacia la izquierda al poner el mouse encima */
    }

    .whaftsaap-tooltip {
        position: fixed;
        bottom: 45px; 
        right: 10px; 
        background-color: rgb(19, 49, 36);
        padding: 10px;
        display: none;
        transition: transform 0.3s ease; 
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        z-index: 98;
        color: white;
      }

    .whaftsaap:hover + .whaftsaap-tooltip {
        display: block;
        transform: translateX(-50px);
    }

    .cookies {
    top: 85%;
    width: 6%;
    left: 2.3%;
    height: auto;
    position: fixed;
    animation: floatAnimation 0.5s infinite alternate;
    z-index: 20;
}

@keyframes floatAnimation {
    from {
        transform: translateY(0); /* Posición inicial */
    }
    to {
        transform: translateY(-10px); /* Posición final */
    }
}

</style>


<a href="https://www.whatsapp.com/">
        <img src="{{ asset('png/WhatsApp_icon.png') }}" alt="" class="whaftsaap">
        <div class="whaftsaap-tooltip">+57 321 532 8266ㅤ</div>
    </a>

<a href="https://www.facebook.com">
     <img src="{{ asset('png/cookies.png') }}" alt="" class="cookies"> 
     </a>

<div id="termsBanner">
  <p>Términos y Condiciones - <span id="showTermsBtn" style="text-decoration: underline; cursor: pointer;">Ver</span>. <button id="acceptBtn">Continuar</button></p>
</div>

<!-- Modal para mostrar los términos y condiciones completos -->
<div id="termsModal" class="modal2">
  <div class="modal-content2">
    <span class="close" id="closeModal">&times;</span>
    <h2 class="text-center">Términos y Condiciones</h2>
    <p>

    <h3>1. Introducción</h3>
    <p>
    Estos Términos y Condiciones, rigen el acceso y uso de la aplicación móvil de riego inteligente, desarrollada por Domoftware. Al utilizar la Aplicación, usted acepta cumplir con estos Términos y todas las leyes y regulaciones aplicables.
    </p>

    <h3>2. Uso de la Aplicación</h3>
    <p>
      La Aplicación está diseñada para permitir a los usuarios monitorear y controlar dispositivos como lo son los Arduinos que gestionan el riego de cultivos. El uso de la Aplicación está sujeto a su cumplimiento de estos Términos.
    </p>
    <p>
      Usted acepta utilizar la Aplicación solo con fines legales y de acuerdo con todas las leyes y regulaciones locales, estatales, nacionales e internacionales aplicables.
    </p>
    <p>
      Usted es responsable de la configuración y el funcionamiento de sus dispositivos Arduinos y sensores así como de cualquier otra infraestructura necesaria para el funcionamiento de la Aplicación.
    </p>

    <h3>3. Datos y Privacidad</h3>
    <p>
      La Aplicación recopila datos, incluidos los niveles de humedad del suelo, programaciones de riego y notificaciones. Estos datos se utilizan para proporcionar información y funcionalidad a los usuarios. Nos comprometemos a proteger la privacidad de sus datos, tal como se describe en nuestra Política de Privacidad.
    </p>
    <p>
      Al utilizar la Aplicación, usted otorga el permiso para que se recopilen y utilicen sus datos de acuerdo con nuestra Política de Privacidad.
    </p>

    <h3>4. Disponibilidad de la Aplicación</h3>
    <p>
      Haremos todo lo posible para mantener la disponibilidad de la Aplicación las 24 horas del día, los 7 días de la semana. Sin embargo, no podemos garantizar que la Aplicación estará libre de interrupciones o errores técnicos. Nos reservamos el derecho de realizar actualizaciones o mantenimiento que puedan afectar la disponibilidad de la Aplicación.
    </p>

    <h3>5. Seguridad de la Cuenta</h3>
    <p>
      Usted es responsable de mantener la seguridad de su cuenta y contraseña. No comparta su información de inicio de sesión con terceros. Si sospecha un acceso no autorizado a su cuenta, notifíquenos de inmediato.
    </p>

    <h3>6. Propiedad Intelectual</h3>
    <p>
      Todos los derechos de propiedad intelectual relacionados con la Aplicación y su contenido pertenecen al Desarrollador. Usted no tiene derecho a reproducir, distribuir o modificar la Aplicación sin nuestro permiso.
    </p>

    <h3>7. Cambios en los Términos y la Aplicación</h3>
    <p>
      Nos reservamos el derecho de actualizar y modificar estos Términos en cualquier momento. Los cambios se harán efectivos al publicar los Términos revisados en la Aplicación. El uso continuado de la Aplicación después de la publicación de los cambios constituye su aceptación de los Términos modificados.
    </p>

    <h3>8. Terminación</h3>
    <p>
      Podemos dar por terminado su acceso a la Aplicación en cualquier momento si viola estos Términos o si su uso de la Aplicación es perjudicial para otros usuarios o para nosotros.
    </p>

    <h3>9. Contacto</h3>
    <p>
      Si tiene preguntas o comentarios sobre estos Términos, puede ponerse en contacto con nosotros a través de Domoftwareinfo@gmail.com.
    </p>
    </p>
  </div>
</div>








<!-- MOdal terminos -->
<script>
// Función para mostrar el banner emergente
function showTermsBanner() {
  document.getElementById("termsBanner").style.display = "block";
}

// Función para ocultar el banner emergente
function hideTermsBanner() {
  document.getElementById("termsBanner").style.display = "none";
}

// Mostrar el banner emergente al cargar la página (puedes desencadenarlo como desees)
window.onload = showTermsBanner;

// Mostrar el modal al hacer clic en el botón "Ver más"
document.getElementById("showTermsBtn").onclick = function() {
  document.getElementById("termsModal").style.display = "block";
}

document.getElementById("acceptBtn").onclick = function() {
  hideTermsBanner();
};

// Ocultar el modal al hacer clic en la "X" de cierre
document.getElementById("closeModal").onclick = function() {
  document.getElementById("termsModal").style.display = "none";
}
</script>