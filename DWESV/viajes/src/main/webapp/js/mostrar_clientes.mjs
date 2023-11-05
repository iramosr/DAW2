document.getElementById('btnMostrarClientes').addEventListener('click', function () {
    let tabla = document.getElementById('tablaClientes');
    if (tabla.style.display === 'none') {
        tabla.style.display = 'table'; // Muestra la tabla
    } else {
        tabla.style.display = 'none'; // Oculta la tabla
    }
});