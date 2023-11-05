//Al seleccionar un viaje, muestra las contrataciones de ese viaje
document.getElementById('viajeId').addEventListener('change', cambiarTabla);
function cambiarTabla() {
    let tabla = document.getElementById('tablaContrataciones');

    //lee el id del viaje seleccionado
    let codigoViaje = document.getElementById('option').getAttribute('codigo');
    console.log("CODIGO: " + codigoViaje);

    // queda en la tabla solo las contrataciones con ese viaje
    let filas = tabla.querySelectorAll('tbody > tr');
    filas.forEach(function (fila) {
        let viaje = fila.querySelectorAll('td')[0].textContent.trim();
        console.log("VIAJE: " + viaje);
        if (codigoViaje === viaje) {
            fila.style.display = 'table-row';
        } else {
            fila.style.display = 'none';
        }
    }
    );
}