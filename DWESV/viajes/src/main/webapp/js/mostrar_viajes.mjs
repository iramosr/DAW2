//Muestra los viajes de un cliente o un empleado
document.getElementById('btnMostrarViajes').addEventListener('click', function () {
    let tabla = document.getElementById('tablaViajes');
    console.log(tabla);
    if (tabla.style.display === 'none') {
        tabla.style.display = 'table'; // Muestra la tabla
    } else {
        tabla.style.display = 'none'; // Oculta la tabla
    }
});