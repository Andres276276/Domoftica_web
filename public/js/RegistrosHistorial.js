    var checkmarkVisible = false;

    function seleccionarTodo() {
    var registros = document.querySelectorAll('.registro-checkbox');

    if (!checkmarkVisible) {
        // Mostrar el checkmark en todos los registros y seleccionarlos
        registros.forEach(function(registro) {
            registro.checked = true;
        });
        checkmarkVisible = true;
    } else {
        // Deseleccionar todos los registros y ocultar el checkmark
        registros.forEach(function(registro) {
            registro.checked = false;
        });
        checkmarkVisible = false;
    }
}



function borrarSeleccionados() {
    var registrosSeleccionados = document.querySelectorAll('.registro-checkbox:checked');
    var idsSeleccionados = Array.from(registrosSeleccionados).map(function(registro) {
        return registro.getAttribute('data-id');
    });

    if (idsSeleccionados.length === 0) {
        alert('No se han seleccionado registros para eliminar.');
    } else {
        if (confirm('¿Estás seguro de que deseas eliminar los registros seleccionados?')) {
            // Realiza una solicitud AJAX para eliminar los registros
            fetch("{{ route('eliminar-registros') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ idsSeleccionados: idsSeleccionados }), // Envía los IDs como un objeto JSON
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Eliminación exitosa, puedes recargar la página o actualizar la tabla de datos
                    alert('Registros seleccionados eliminados con éxito.');
                    location.reload(); // Recargar la página
                } else {
                    alert('Error al eliminar registros seleccionados.');
                }
            })
            .catch(error => {
                console.error('Error al eliminar registros seleccionados:', error);
            });
        }
    }
}





    var graficaVisible = false;
    var myChart = null;

    function alternarGrafica() {
        graficaVisible = !graficaVisible;

        var graficaContainer = document.getElementById('graficaContainer');

        if (graficaVisible) {
            graficaContainer.style.display = 'block';
            if (myChart === null) {
                mostrarGrafica();
            }
        } else {
            graficaContainer.style.display = 'none';
        }
    }

    function volver() {
        window.location.href = "{{ route('privada') }}";
    }

    function eliminarDato(id) {
        if (confirm("¿Estás seguro de que quieres eliminar este dato?")) {
            window.location.href = "{{ url('eliminar-dato') }}/" + id;
        }
    }

    function mostrarGrafica() {
        if (myChart !== null) {
            myChart.destroy();
        }
    
        // Supongamos que tienes un array llamado humedad_suelo con los datos de humedad del suelo
    
        // Convertir datos de humedad_suelo a porcentajes y asegurar que estén en el rango del 1 al 100%
        var estadosSuelo = humedad_suelo.map(function(valor) {
            var porcentaje = ((valor - 2100) / (4095 - 2100)) * 100;
    
            // Asegurar que el porcentaje esté en el rango del 1 al 100
            porcentaje = Math.max(1, Math.min(100, porcentaje));
    
            return porcentaje;
        });
    
        var ctx = document.getElementById('myChart').getContext('2d');
        myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Humedad',
                        data: humedad,
                        fill: false,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Temperatura',
                        data: temperatura,
                        fill: false,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Humedad del Suelo',
                        data: estadosSuelo,
                        fill: false,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Flujo de Agua',
                        data: flujo_agua,
                        fill: false,
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'white',  
                            callback: function(value) {
                                if (value === 0) return 'Húmedo';
                                if (value === 100) return 'Seco';
                                return value;
                            }
                        }
                    },
                    x: {
                        color: 'white',  // Cambia el color de los números en el eje x
                        ticks: {
                            color: 'white'  // Cambia el color de los números en el eje x
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: 'white'  // Cambia el color del texto de la leyenda
                        }
                    }
                }
            }
        });
    }
    