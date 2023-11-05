//Muestra la descripción del viaje seleccionado
window.addEventListener("load", function botonesDescripcion() {

    // obtener todos los botones de ver descripcion
    const botonesVerDescripcion = document.querySelectorAll(".btndescripcion");

    // añadir un evento click a cada uno de los botones
    botonesVerDescripcion.forEach(function (boton) {

        boton.addEventListener("click", function () {

            // obtener la fila de la descripcion
            const trDescripcion = this.closest("tr").nextElementSibling;

            // mostrar la descripcion si esta oculta y cambiar el icono a uno hueco,
            // si no, ocultarla y cambiar el icono   a uno relleno
            if (trDescripcion.style.display === "none" || trDescripcion.style.display === "") {
                let icono = boton.querySelectorAll(".fa-comment-dots")[0];
                icono.classList.remove("fa-solid");
                icono.classList.add("fa-regular");
                trDescripcion.style.display = "table-row";
            } else {
                let icono = boton.querySelectorAll(".fa-comment-dots")[0];
                icono.classList.remove("fa-regular");
                icono.classList.add("fa-solid");
                trDescripcion.style.display = "none";
            }
        });
    });
});