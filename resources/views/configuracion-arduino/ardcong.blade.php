<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración Arduino</title>
    <!-- Menu -->
    @Include('Plantillas.navinicio')
    <!-- Estilos -->
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body>

<!-- Fondo Video -->
<video autoplay muted loop id="video-background">
    <source src="{{ asset('videos/video3.mp4') }}" type="video/mp4">
    Tu navegador no admite videos HTML5.
</video>

<!-- Formulario Configuración cultivo -->
<div class="containers mt-5">
    <h1 class="text-center">Configuración Arduino</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('configuracion-arduino.guardar') }}" method="post">
        @csrf

        <!-- Tipo de Arduino -->
        <div class="form-group">
            <label for="Tipo_Arduino">Tipo de Arduino:</label>
            <select class="form-control" name="Tipo_Arduino" required>
                @foreach(['esp32', 'esp8266'] as $tipo)
                    <option value="{{ $tipo }}" {{ ($configuracion && $configuracion->Tipo_Arduino === $tipo) ? 'selected' : '' }}>{{ strtoupper($tipo) }}</option>
                @endforeach
            </select>
        </div>

        <!-- Configuración de Luces -->
        <div class="form-group">
            <label for="Configuracion_Luces">Configuración de Luces:</label>
            <select class="form-control" name="Configuracion_Luces[modo]" required>
                <option value="automaticas" {{ $configuracion && is_array($configuracion->Configuracion_Luces) && $configuracion->Configuracion_Luces['modo'] == 'automaticas' ? 'selected' : '' }}>Luces Automáticas</option>
                <option value="manuales" {{ $configuracion && is_array($configuracion->Configuracion_Luces) && $configuracion->Configuracion_Luces['modo'] == 'manuales' ? 'selected' : '' }}>Luces Manuales</option>
                <option value="parpadeantes" {{ $configuracion && is_array($configuracion->Configuracion_Luces) && $configuracion->Configuracion_Luces['modo'] == 'parpadeantes' ? 'selected' : '' }}>Luces Parpadeantes</option>
                <option value="personalizado" {{ $configuracion && is_array($configuracion->Configuracion_Luces) && $configuracion->Configuracion_Luces['modo'] == 'personalizado' ? 'selected' : '' }}>Modo Personalizado</option>
            </select>
        </div>

        <!-- Intervalo de Lectura de Sensores -->
        <div class="form-group">
            <label for="Intervalo_Lectura_Sensores">Intervalo de Lectura de Sensores:</label>
            <select class="form-control" name="Intervalo_Lectura_Sensores" required>
                <option value="10" {{ $configuracion && $configuracion->Intervalo_Lectura_Sensores == 30 ? 'selected' : '' }}>Cada 10 segundos</option>
                <option value="30" {{ $configuracion && $configuracion->Intervalo_Lectura_Sensores == 30 ? 'selected' : '' }}>Cada 30 minutos</option>
                <option value="60" {{ $configuracion && $configuracion->Intervalo_Lectura_Sensores == 60 ? 'selected' : '' }}>Cada 1 hora</option>
                <option value="300" {{ $configuracion && $configuracion->Intervalo_Lectura_Sensores == 300 ? 'selected' : '' }}>Cada 5 horas</option>
            </select>
        </div>

        <!-- Intensidad de Riego -->
        <div class="form-group">
            <label for="Intervalo_Riego">Intensidad de Riego:</label>
            <input type="range" class="form-control-range" name="Intervalo_Riego" min="1" max="10" value="{{ $configuracion ? $configuracion->Intervalo_Riego : '' }}" required>
            <small class="form-texts text-muted" style="color: black !important;">Nivel seleccionado: {{ $configuracion ? $configuracion->Intervalo_Riego : 'No seleccionado' }}</small>
        </div>

        <!-- Configuración de Alarma -->
        <div class="form-group">
            <label for="Configuracion_Alarma">Configuración de Alarma:</label>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="activar_alarma" name="Configuracion_Alarma[activar]" {{ $configuracion && isset($configuracion->Configuracion_Alarma['activar']) && $configuracion->Configuracion_Alarma['activar'] ? 'checked' : '' }}>
                <label class="form-check-label" for="activar_alarma">Activar alarma</label>
            </div>

            <div class="form-group mt-3">
                <label for="Configuracion_Alarma_tipo_sonido">Tipo de sonido:</label>
                <select class="form-control" name="Configuracion_Alarma[tipo_sonido]">
                    <option value="alarma1" {{ $configuracion && isset($configuracion->Configuracion_Alarma['tipo_sonido']) && $configuracion->Configuracion_Alarma['tipo_sonido'] == 'alarma1' ? 'selected' : '' }}>Alarma 1</option>
                    <option value="alarma2" {{ $configuracion && isset($configuracion->Configuracion_Alarma['tipo_sonido']) && $configuracion->Configuracion_Alarma['tipo_sonido'] == 'alarma2' ? 'selected' : '' }}>Alarma 2</option>
                    <option value="personalizado" {{ $configuracion && isset($configuracion->Configuracion_Alarma['tipo_sonido']) && $configuracion->Configuracion_Alarma['tipo_sonido'] == 'personalizado' ? 'selected' : '' }}>Personalizado</option>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="Configuracion_Alarma_volumen">Volumen de la alarma:</label>
                <input type="range" class="form-control-range" name="Configuracion_Alarma[volumen]" min="1" max="10" value="{{ $configuracion && isset($configuracion->Configuracion_Alarma['volumen']) ? $configuracion->Configuracion_Alarma['volumen'] : '5' }}" required>
                <small class="form-texts text-muted" style="color: black !important;">Nivel de volumen: {{ $configuracion && isset($configuracion->Configuracion_Alarma['volumen']) ? $configuracion->Configuracion_Alarma['volumen'] : '5' }}</small>
            </div>
        </div>

        <!-- Botones -->
        <div class="text-center">
            <button type="submit" class="btn btn-dark">Guardar</button>
            <a href="http://localhost/Domoftware/public/cultivo" class="btn btn-dark">Ir a cultivos</a>
        </div>
    </form>

    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</div>

<!-- Plantillas -->
@include('plantillas.Terminos_condiciones')
@Include('Plantillas.fooster')
@Include('Plantillas.Animacion')

</body>
</html>
