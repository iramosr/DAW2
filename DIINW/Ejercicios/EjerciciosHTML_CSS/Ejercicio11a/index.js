$(window).resize(function () {
    // Obtener el tamaño de la pantalla del dispositivo
    var screenWidth = screen.width;
    var screenHeight = screen.height;

    // Obtener el tamaño de la ventana del navegador
    var windowWidth = window.innerWidth;
    var windowHeight = window.innerHeight;

    // Obtener el tamaño de la página web
    const pageWidth = document.documentElement.scrollWidth;
    const pageHeight = document.documentElement.scrollHeight;

    // Mostrar los tamaños obtenidos
    var x = document.getElementById("tamañopantalla");
    x.innerHTML = "Resolución pantalla: Ancho: " + screenWidth + ", Alto: " + screenHeight + ".";

    var y = document.getElementById("tamañoventana");
    y.innerHTML = "Resolución ventana del navegador: <strong>Ancho: " + windowWidth + "</strong>, Alto: " + windowHeight + ".";

    var z = document.getElementById("tamañopagina");
    z.innerHTML = "Resolución página web: Ancho:" + pageWidth + ", Alto: " + pageHeight + ".";


    // Cambiar la imagen segun el ancho de la ventanaç
    var foto = document.getElementById("foto");
    if (windowWidth > 1250) {
        foto.innerHTML = "<img id='foto' src='fotos/blanco.png' alt=''>";
    } else if (windowWidth > 900) {
        foto.innerHTML = "<img id='foto' src='fotos/verde.png' alt=''>";
    } else if (windowWidth > 500) {
        foto.innerHTML = "<img id='foto' src='fotos/amarillo.png' alt=''>";
    } else {
        foto.innerHTML = "<img id='foto' src='fotos/rojo.png' alt=''>";
    }


});