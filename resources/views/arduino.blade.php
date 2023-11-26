@include('plantillas.navinicio')
<!DOCTYPE html>
<html>
<head>
    <title>Registros</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="{{ asset('css/arduino.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<style>
    .imgnav{
  margin-top: -70px;
  z-index: 1; 

}
      .titulo{
        color: white;
        text-align: center;
        letter-spacing: 5px; 
        z-index: 2; 
        font-size: 30px;

      }

      </style>

    <h2 class="titulo display-5 font-weight-light">Sensores Historial</h2>
    <img src="{{ asset('images/nav6.png') }}" class="imgnav">

    <div class="black-container">
        <div class="container mt-5">
            <div class="text-center mb-3">
               <!--  <h1>Sensores Historial</h1> -->
                
    <div class="container mt-4">
        <form id="dateFilterForm">
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" id="startDate" placeholder="Fecha de inicio (dd/mm/aaaa)">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="endDate" placeholder="Fecha de fin (dd/mm/aaaa)">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Filtrar</button>
        </form>
        <div id="searchResults" class="mt-4">
        </div>
    </div>


            </div>

            <div class="d-flex justify-content-between mb-3">
                <button class="btn btn-success" onclick="alternarGrafica()">
                    <i class="fas fa-eye"></i> Gráfica
                </button>
                <div>
                    <button class="btn btn-danger" onclick="borrarSeleccionados()">
                        <i class="fas fa-trash"></i> 
                    </button>
                    <button class="btn btn-primary" onclick="seleccionarTodo()">
                        <i class="fas fa-check-square"></i> Todo
                    </button>
                </div>
            </div>

            <div class="Graficas">
            <div id="graficaContainer" style="display: none;">
                <canvas id="myChart"></canvas>
            </div>
            </div>

            
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <span id="checkmark" style="display: none;">&#10004;</span>
                </div>
            </div>

            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
<th><i class="fas fa-tint text-primary"></i> Humedad</th>
<th><i class="fas fa-thermometer-half text-danger"></i> Temperatura</th>
<th><i class="fas fa-tint text-info"></i> Humedad Suelo</th>
<th><i class="fas fa-tint text-success"></i> Flujo de Agua</th>
<th><i class="far fa-clock text-secondary"></i> Fecha y Hora</th>
<th><i class="fas fa-cogs text-warning"></i> Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($datos as $dato)
                        <tr>
                            <td>{{ $dato->humedad }} %</td>
                            <td>{{ $dato->temperatura }} °C</td>

<td>
    @php
        $humedadSuelo = $dato->humedad_suelo;
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
                            <td>{{ $dato->flujo_agua }} Mil</td>
                            <td>{{ $dato->fecha_hora }}</td>
                            <td>
                                <input type="checkbox" class="registro-checkbox" data-id="{{ $dato->id }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination">
    <ul class="pagination" id="pagination">
        @if ($paginaActual > 11)
            <li class="page-item">
                <a class="page-link" href="{{ route('arduino', ['pagina' => 1]) }}">1</a>
            </li>
            <li class="page-item disabled">
                <span class="page-link">...</span>
            </li>
        @endif
        @for ($i = max(1, $paginaActual - 11); $i <= min($totalPaginas, $paginaActual + 11); $i++)
            <li class="page-item @if ($i == $paginaActual) active @endif">
                <a class="page-link" href="{{ route('arduino', ['pagina' => $i]) }}">{{ $i }}</a>
            </li>
        @endfor
        @if ($paginaActual < $totalPaginas - 10)
            <li class="page-item disabled">
                <span class="page-link">...</span>
            </li>
            <li class="page-item">
                <a class="page-link" href="{{ route('arduino', ['pagina' => $paginaActual + 1]) }}">Siguiente</a>
            </li>
        @endif
    </ul>
</div>




<!-- Ver paginas de registros por paginas -->
<script>
    $(document).ready(function() {
    var maxVisiblePages = 20;

    $('#pagination li.page-item').each(function(index) {
        if (index >= maxVisiblePages) {
            $(this).hide();
        }
    });

    // $('#pagination li.page-item:last-child').after('<li class="page-item" id="show-more-pages"><a class="page-link" href="#">Mostrar Más</a></li>');

    $('#show-more-pages').on('click', function(e) {
        e.preventDefault();
        $('#pagination li.page-item:hidden').slice(0, 10).show();
    });
});

</script>

            
        </div>
    </div>

    <script>
        var labels = {!! $datos->pluck('fecha_hora') !!};
        var humedad = {!! $datos->pluck('humedad') !!};
        var temperatura = {!! $datos->pluck('temperatura') !!};
        var humedad_suelo = {!! $datos->pluck('humedad_suelo') !!};
        var flujo_agua = {!! $datos->pluck('flujo_agua') !!};
    </script>



    <script src="{{ asset('js/RegistrosHistorial.js') }}"></script>

    @include('plantillas.Terminos_condiciones')
    @include('plantillas.fooster')
    @include('plantillas.Animacion')

    
</body>
</html>
