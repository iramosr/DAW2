// Borrar alerta a los 5 segundos
document.addEventListener('DOMContentLoaded', borrarAlerta);
function borrarAlerta() {
    let divalerta = document.getElementById('alerta');
    setTimeout(function () {
        divalerta.style.display = 'none';
    }, 5000);
}
