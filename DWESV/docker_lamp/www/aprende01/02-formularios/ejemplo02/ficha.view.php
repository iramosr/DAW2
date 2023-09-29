<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ficha</title>
</head>
<body>
    <p>Nombre: <?= $nombre ?> </p>
    <p>Fecha nacimiento: <?= $fechaNacimiento ?> </p>
    <p>Sexo: <?= $sexo ?> </p>
    <p>Aficiones</p>
    <ul>
        <?php foreach ($aficiones as $aficion){ ?>
        <li> <?=$aficion ?> </li>
        <?php } ?>
    </ul>
    <p><img src=<?=$localPathImagen ?> ></p>
</body>
</html>