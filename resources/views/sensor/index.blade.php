<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STREAMING ESTADISTICAS</title>

    @include('plantillas.navinicio')

    <!-- HOJA DE ESTILOS -->
    <link href="{{ asset('css/estadisticas.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!-- TITULO + IMG ONDULADA SUPERIOR -->
    <h2 class="titulo display-5 font-weight-light">Control de Sensores</h2>
    <img src="{{ asset('images/nav6.png') }}" class="imgnav">

    <!-- CONTAINERS DATOS -->
    <div class="row bg-black-translucent">
        <div class="container">

            <!-- BOTONES REFERENTES RELE (BOMBA AGUA) -->
            <div class="row bg-black-translucent_boton">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- BOTON DE MANUAL DEL RELE (FUNCIONANDO) -->
                            <div class="centered-container">
                                <h4>Riego Manual</h4>
                                <form method="POST" action="{{ route('toggle_relay') }}">
                                    @csrf
                                    <button type="submit" class="btn {{ Auth::user()->relay_state == 1 ? 'btn-danger' : 'btn-success' }}">On/off</button>
                                    <p>{{ Auth::user()->relay_state == 1 ? 'Apagado' : 'Encendido' }}</p>
                                </form>
                            </div>
                        </div>

                        <!-- BOTON DE AUTOMATICO DEL RELE (No Disponible) -->
                        <div class="col-md-3">
                            <div class="Riego-agua">
                                <div class="centered-container">
                                    <h4>Riego Automático</h4>
                                    <button id="toggleButton" class="off">false</button>
                                    <p id="estado"></p>
                                </div>
                            </div>
                        </div>

                        <div class="titulo2 display-6 font-weight-light">
                            <h2 style="margin: 0 auto;  top: 50%;">Control Riego </h2> <br>
                            <img src="{{ asset('png/Agua.png') }}" class="imgnavs">
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <!-- TABLA -->
            <div class="row bg-black-translucent_datos">
                <table class="table table-bordered table-striped table-custom">
                    <thead class="thead-dark">
                        <!-- TITULO DE LAS COLUMNAS Y ICONO DE AYUDA CON INFO -->
                        <tr>
                            <th>
                                <div class="section-info">
                                    <i class="fa fa-question-circle question-icon"></i>
                                    <i class="fa fa-cloud"></i> Humedad
                                    <div class="tooltiptext">Mide la humedad del aire circundante, crucial para el control de calidad del aire y el cuidado de las plantas.</div>
                                </div>
                            </th>
                            <th>
                                <div class="section-info">
                                    <i class="fa fa-question-circle question-icon"></i>
                                    <i class="fa fa-thermometer-half"></i> Temperatura
                                    <div class="tooltiptext">Monitoriza la temperatura local, esencial en aplicaciones de clima, pronóstico y procesos industriales.</div>
                                </div>
                            </th>
                            <th>
                                <div class="section-info">
                                    <i class="fa fa-question-circle question-icon"></i>
                                    <i class="fa fa-leaf"></i> Estado del Suelo
                                    <div class="tooltiptext">Evalúa la humedad y la composición del suelo, útil para agricultura, jardinería y conservación del suelo.</div>
                                </div>
                            </th>
                            <th>
                                <div class="section-info">
                                    <i class="fa fa-question-circle question-icon"></i>
                                    <i class="fa fa-tint"></i> Flujo de Agua
                                    <div class="tooltiptext">Calcula la cantidad de agua que fluye en un sistema, importante en el control del consumo de agua y sistemas de riego.</div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- NIVELES DE HUMEDAD AMBIENTE Y ESTADO SUELO -->
                        @if ($ultimoSensor)
                            <!-- NIVELES DE HUMEDAD AMBIENTE -->
                            <tr>
                                <td id="humedad">
                                    @if ($ultimoSensor->humedad >= 0 && $ultimoSensor->humedad <= 33)
                                        Nivel muy húmedo ({{ $ultimoSensor->humedad }}%)
                                    @elseif ($ultimoSensor->humedad > 33 && $ultimoSensor->humedad <= 66)
                                        Nivel normal ({{ $ultimoSensor->humedad }}%)
                                    @elseif ($ultimoSensor->humedad > 66 && $ultimoSensor->humedad <= 100)
                                        Nivel seco ({{ $ultimoSensor->humedad }}%)
                                    @else
                                        Valor no válido
                                    @endif
                                </td>
                                <!-- MUESTRA LA TEMPERATURA -->
                                <td id="temperatura">{{ $ultimoSensor->temperatura }} °C</td>
                                <!-- NIVELES DE ESTADO DEL SUELO -->
                                <td id="estadoSuelo" class="humedad-celda">
                                    <!-- CONVERSIÓN DE RANGO ESTADO SUELO 1 a 100% -->
                                    @php
                                        $humedadSuelo = $ultimoSensor->humedad_suelo;
                                        $porcentaje = (($humedadSuelo - 2100) / (4095 - 2100)) * 100; 
                                    @endphp
                                    @if ($porcentaje >= 0 && $porcentaje <= 25)
                                        <span class="estado-muy-humedo">Muy húmedo ({{ round($porcentaje, 2) }}%)</span>
                                    @elseif ($porcentaje > 25 && $porcentaje <= 50)
                                        <span class="estado-humedo">Húmedo ({{ round($porcentaje, 2) }}%)</span>
                                    @elseif ($porcentaje > 50 && $porcentaje <= 75)
                                        <span class="estado-seco">Seco ({{ round($porcentaje, 2) }}%)</span>
                                    @elseif ($porcentaje > 75 && $porcentaje <= 100)
                                        <span class="estado-muy-seco">Muy seco ({{ round($porcentaje, 2) }}%)</span>
                                    @else
                                        Valor no válido
                                    @endif
                                </td>
                                <!-- MUESTRA EL FLUJO DE AGUA -->
                                <td id="flujoAgua">{{ $ultimoSensor->flujo_agua }} Mililitros</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="4">No se encontraron registros.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <!-- GRAFICAS DE LAS ESTADISTICAS -->
                @if ($datos && count($datos) > 1)
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="humedadChart" style="width: 300px; height: 200px;"></canvas>
                        </div>
                        <div class="col-md-6">
                            <canvas id="temperaturaChart" style="width: 300px; height: 200px;"></canvas>
                        </div>
                        <div class="col-md-6">
                            <canvas id="humedadSueloChart" style="width: 300px; height: 200px;"></canvas>
                        </div>
                        <div class="col-md-6">
                            <canvas id="flujoAguaChart" style="width: 300px; height: 200px;"></canvas>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <br>
    <br>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // ... (tu código actual) ...
        var apiUrl = "https://web-domoftware-production.up.railway.app/api/sensor/ultimalec";

        // Realiza la solicitud AJAX
        $.ajax({
            url: apiUrl,
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                // Verifica si la respuesta contiene datos válidos
                if (response && response.success && response.data) {
                    // Actualiza los valores en la página con los datos de la API
                    updateValues(response.data);
                } else {
                    console.error("Error en la respuesta de la API");
                }
            },
            error: function(error) {
                console.error("Error al obtener datos de la API", error);
            }
        });

        // Función para actualizar los valores en la página
        function updateValues(data) {
            $('#humedad').text(data.humedad);
            $('#temperatura').text(data.temperatura);

            // Actualiza el estado del suelo
            var humedadSuelo = data.humedad_suelo;
            var porcentajeSuelo = ((humedadSuelo - 2100) / (4095 - 2100)) * 100;
            if (porcentajeSuelo >= 0 && porcentajeSuelo <= 25) {
                $('#estadoSuelo').html('<span class="estado-muy-humedo">Muy húmedo (' + porcentajeSuelo.toFixed(2) + '%)</span>');
            } else if (porcentajeSuelo > 25 && porcentajeSuelo <= 50) {
                $('#estadoSuelo').html('<span class="estado-humedo">Húmedo (' + porcentajeSuelo.toFixed(2) + '%)</span>');
            } else if (porcentajeSuelo > 50 && porcentajeSuelo <= 75) {
                $('#estadoSuelo').html('<span class="estado-seco">Seco (' + porcentajeSuelo.toFixed(2) + '%)</span>');
            } else if (porcentajeSuelo > 75 && porcentajeSuelo <= 100) {
                $('#estadoSuelo').html('<span class="estado-muy-seco">Muy seco (' + porcentajeSuelo.toFixed(2) + '%)</span>');
            } else {
                $('#estadoSuelo').html('Valor no válido');
            }

            $('#flujoAgua').text(data.flujo_agua + ' Mililitros');
        }
    </script>

    @include('plantillas.Terminos_condiciones')
    @include('plantillas.fooster')
    @include('plantillas.Animacion')
</body>
</html>
