
      var button = document.getElementById("toggleButton");
      var estado = document.getElementById("estado");

      // Obtén el estado del botón del almacenamiento local
      var isOn = localStorage.getItem('isOn') === 'true';

      function updateButtonState() {
         if (isOn) {
            button.innerText = "On";
            button.classList.add("on");
            estado.innerText = "Encendida";
         } else {
            button.innerText = "Off";
            button.classList.remove("on");
            estado.innerText = "Apagada";
         }
      }

      // Actualiza el estado del botón al cargar la página
      updateButtonState();

      // Maneja el clic en el botón
      button.addEventListener('click', function () {
         isOn = !isOn;
         // Guarda el estado en el almacenamiento local
         localStorage.setItem('isOn', isOn);
         // Actualiza el estado del botón
         updateButtonState();
      });
  


//Funciones para vista Index o Sensores//
var fechas = datos.map(function(item) { return item.fecha_hora; });
 var humedad = datos.map(function(item) { return item.humedad; });
 var temperatura = datos.map(function(item) { return item.temperatura; });
 var humedadSuelo = datos.map(function(item) { return item.humedad_suelo; });
 var flujoAgua = datos.map(function(item) { return item.flujo_agua; });

 if (datos && datos.length > 0) {
     // gráfica de humedad
     var humedadChart = new Chart(document.getElementById('humedadChart').getContext('2d'), {
         type: 'line',
         data: {
             labels: fechas,
             datasets: [{
                 label: 'Humedad (%)',
                 data: humedad,
                 borderColor: 'rgba(75, 192, 192, 1)',
                 borderWidth: 3,
                 fill: false
             }]
         },
         options: {
             scales: {
                 y: {
                     beginAtZero: true,
                     max: 100
                 }
             },
             plugins: {
                 title: {
                     display: true,
                     text: 'Gráfica de Humedad'
                 }
             }
         }
     });

     // gráfica de temperatura
     var temperaturaChart = new Chart(document.getElementById('temperaturaChart').getContext('2d'), {
         type: 'line',
         data: {
             labels: fechas,
             datasets: [{
                 label: 'Temperatura (°C)',
                 data: temperatura,
                 borderColor: 'rgba(255, 99, 132, 1)',
                 borderWidth: 3,
                 fill: false
             }]
         },
         options: {
             scales: {
                 y: {
                    beginAtZero: true,
                    min: 10,
                    max: 50,               }
             },
             plugins: {
                 title: {
                     display: true,
                     text: 'Gráfica de Temperatura'
                 }
             }
         }
     });

     // gráfica de humedad del suelo
     var humedadSueloChart = new Chart(document.getElementById('humedadSueloChart').getContext('2d'), {
         type: 'line',
         data: {
             labels: fechas,
             datasets: [{
                 label: 'Humedad del Suelo (%)',
                 data: humedadSuelo,
                 borderColor: 'rgba(54, 162, 235, 1)',
                 borderWidth: 3,
                 fill: false
             }]
         },
         options: {
             scales: {
                 y: {
                     beginAtZero: true,
                 }
             },
             plugins: {
                 title: {
                     display: true,
                     text: 'Gráfica de Humedad del Suelo'
                 }
             }
         }
     });

     // gráfica de flujo de agua
     var flujoAguaChart = new Chart(document.getElementById('flujoAguaChart').getContext('2d'), {
         type: 'line',
         data: {
             labels: fechas,
             datasets: [{
                 label: 'Flujo de Agua (ml/min)',
                 data: flujoAgua,
                 borderColor: 'rgba(255, 206, 86, 1)',
                 borderWidth: 3,
                 fill: false
             }]
         },
         options: {
             scales: {
                 y: {
                     beginAtZero: true
                 }
             },
             plugins: {
                 title: {
                     display: true,
                     text: 'Gráfica de Flujo de Agua'
                 }
             }
         }
     });
 }




 