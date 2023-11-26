function actualizarHora() {
    const ahora = new Date();
    let hora = ahora.getHours();
    let minutos = ahora.getMinutes();
    const segundos = ahora.getSeconds();
    let amPm = hora >= 12 ? 'PM' : 'AM';

    if (hora > 12) {
        hora -= 12;
    } else if (hora === 0) {
        hora = 12;
    }

    hora = hora < 10 ? `0${hora}` : hora;
    minutos = minutos < 10 ? `0${minutos}` : minutos;

    const horaActual = `${hora}:${minutos}:${segundos} ${amPm}`;
    const fecha = ahora.toLocaleDateString(); 

    document.getElementById('hora-actual').textContent = horaActual;
    document.getElementById('fecha').textContent = fecha;
}

actualizarHora();

setInterval(actualizarHora, 1000);





