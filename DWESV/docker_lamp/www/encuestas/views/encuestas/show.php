<h1>SHOW</h1>

<body>
    <form action="save.php" method="post" enctype="multipart/form-data">
        <label>
            Nombre:
            <input type="text" id="nombre" name="nombre" value="<?=$usuario->nombre?>">
        </label>
        <?= messageErrorItem('nombre', $errors)?>
        <br>
        <label>
            Apellidos:
            <input type="text" id="apellidos" name="apellidos" value="<?=$usuario->apellidos?>">
        </label>
        <?= messageErrorItem('apellidos', $errors)?>
        <br>
        <label>
            Email:
            <input type="email" id="email" name="email" value="<?=$usuario->email?>">
        </label>
        <?= messageErrorItem('email', $errors)?>
        <br>
        <label>
            Fecha nacimiento:
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?=$usuario->fechaNacimiento?>">
        </label>
        <br>
        <label>
            Sexo:
            <input type="radio" name="sexo" value="H">Hombre
            <input type="radio" name="sexo" value="M">Mujer
            <input type="radio" name="sexo" value="O">Otro
            <input type="radio" name="sexo" value="X">Prefiero no decirlo
        </label>
        <br>
        <label>
            Aficiones:
            <input type="checkbox" name="aficiones[]" value="INF">Informatica
            <input type="checkbox" name="aficiones[]" value="LEC">Lectura
            <input type="checkbox" name="aficiones[]" value="DEP">Deporte
        </label>
        <br>
        <label>
            Nivel de estudios:
            <select name="estudios">
                <option value="">Sin especificar</option>
                <option value="sec">Secundaria</option>
                <option value="bach">Bachillerato</option>
                <option value="tgm">Técnico Grado Medio</option>
                <option value="tgs">Técnico Grado Superior</option>
                <option value="grad">Graduado</option>
            </select>
        </label>
        <br>
        <label>
            Observaciones:
            <textarea id="observaciones" name="observaciones"><?=$usuario->observaciones?></textarea>
        </label>
        <br>
        <label>
            Imagen:
            <input type="file" id="imagen" name="imagen">
        </label>
        <br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>