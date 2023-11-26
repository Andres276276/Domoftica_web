//PARTICULAS DE GOTAS//

function createDrop() {
  const drop = document.createElement("div");
  drop.className = "drop";
  document.getElementById("drop-container").appendChild(drop);

  const randomX = Math.random() * 100;
  drop.style.left = `${randomX}vw`;

  const animationDuration = Math.random() * 5 + 5; // Duración aleatoria entre 5 y 10 segundos
  drop.style.animation = `fall ${animationDuration}s linear`;

  drop.addEventListener("animationend", () => {
      // Cuando termina la animación, elimina la gota
      document.getElementById("drop-container").removeChild(drop);
  });
}

// Crea gotas continuamente
setInterval(createDrop, 1000);

// Gotas iniciales
for (let i = 0; i < 10; i++) {
  createDrop();
}

  // FUNCION PARA BUSCAR USUARIOS EN LA SECCION PRIVADA_ADMIN
  $("#searchBtn").click(function () {
    var value = $("#search").val().toLowerCase();
    $("table tr").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});






 // ABRIR SIDEBAR
 function openSidebar() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("mySidebar").style.left = "0"; 
}

// CERRAR SIDEBAR
function closeSidebar() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("mySidebar").style.left = '-250px'; 
  document.querySelector('.open-btn').style.display = 'block';
}

// inicio de sesión y el registro

  $(document).ready(function () {
    $("#login-button").click(function () {
        var username = $("#username").val();
        var password = $("#password").val();
    });

    // registro
    $("#register-button").click(function () {
        var newUsername = $("#new-username").val();
        var newPassword = $("#new-password").val();
    });
});


//PROCESAMIENTO DE LA FOTO DE PERFIL (No disponible)

function previewProfilePhoto() {
    var input = document.getElementById('profilePhoto');
    var preview = document.getElementById('profilePhotoPreview');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// FUNCION PARA REDIGIR A LA VISTA SENSORES
function redirigirAVista1() {
console.log('Redirigiendo a sensores');
window.location.href = 'cultivo'; 
}





 // FUNCION PARA MOSTRAR Y OCULTAR EL BOTON PARA DESPLAZAR A INICIO O ARRIBA
 window.onscroll = function () {
    scrollFunction();
  };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("scrollToTopBtn").style.display = "block";
    } else {
      document.getElementById("scrollToTopBtn").style.display = "none";
    }
  }

  // Cuando se hace clic en el botón, desplazarse al principio de la página
  document.getElementById("scrollToTopBtn").addEventListener("click", function () {
    document.body.scrollTop = 0; // Para Safari
    document.documentElement.scrollTop = 0; // Para Chrome, Firefox, IE y Opera
  });



  


//Animacion del iniciar seccion en//
$(document).ready(function () {
  var $text = $(".animation-text");
  
  function restartAnimation() {
    $text.removeClass("typing");
    void $text[0].offsetWidth; // Reiniciar la animación
    $text.addClass("typing");
  }

  setInterval(restartAnimation, 3000); // Reiniciar cada 3 segundos
});




$(document).ready(function () {
  $('#login-tab').on('click', function () {
      $('#register').removeClass('active');
      $('#login').addClass('active');
  });

  $('#register-tab').on('click', function () {
      $('#login').removeClass('active');
      $('#register').addClass('active');
  });

  $('#login-button').on('click', function () {
      $('#loginModal').modal('hide');
  });

  $('#register-button').on('click', function () {
      $('#loginModal').modal('hide');
  });
});
