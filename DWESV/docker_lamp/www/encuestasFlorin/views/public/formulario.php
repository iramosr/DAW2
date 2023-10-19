
<?php

require_once '../layouts/header.php';
require_once '../layouts/main-menu.php';

?>



<form action="../encuestas/add.php" method="post" enctype="multipart/form-data">
    <labe>
        Nombre:
        <input type="text" id="nombre" name="nombre"></input>
    </labe>
    <br>
    <labe>
        Apellido:
        <input type="text" id="apellido" name="apellido"></input>
    </labe>
    <br>
    <labe>
        Email:
        <input type="text" id="email" name="email"></input>
    </labe>
    <br>
    <labe>
        Fecha de nacimiento:
        <input type="date" id="fecha" name="fecha_nacimiento"></input>
    </labe>
    <br>
    <br>

    Sexo:
    <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"  name="sexo" value="H">
        <label class="form-check-label" for="flexRadioDefault1">
            Hombre
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"  name="sexo" value="M">
        <label class="form-check-label" for="flexRadioDefault1">
            Mujer
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"  name="sexo" value="O">
        <label class="form-check-label" for="flexRadioDefault1">
            Otro
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"  name="sexo" value="X">
        <label class="form-check-label" for="flexRadioDefault1">
            Prefiero no decirlo
        </label>
    </div>

    <br>

    Aficiones:
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="aficiones[]" value="INF">
        <label class="form-check-label" for="defaultCheck1">
            Informatica
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="aficiones[]" value="DEP">
        <label class="form-check-label" for="defaultCheck1">
            Deporte
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="aficiones[]" value="LEC">
        <label class="form-check-label" for="defaultCheck1">
            Lectura
        </label>
    </div>

    <br>

    <label>
        Nivel de estudios:
        <select name="estudios" >
            <option value="NIVEL1">ESO</option>
            <option value="NIVEL2">Bachillerato</option>
            <option value="NIVEL3">Grado Superior</option>
        </select>
    </label>
    <br>

    <br>
    <label>
        Observaciones:

        <textarea name="observaciones" id="observaciones"></textarea>
    </label>
    <br>

    <div class="form-group">
        <label for="exampleFormControlFile1">Añadir un fichero</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imagen">
    </div>
    <br>

    <input type="submit" value="ENVIAR" ></input>
</form>
<?php

require_once '../layouts/footer.php';
?>