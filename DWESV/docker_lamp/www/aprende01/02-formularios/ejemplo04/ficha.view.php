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
<p>Nombre: <?=$usuario->nombre?> <?=messageErrorItem('nombre', $errors)?></p>
<p>Apellidos: <?=$usuario->apellidos?> <?=messageErrorItem('apellidos', $errors)?></p>
<p>Email: <?=$usuario->email?> <?=messageErrorItem('email', $errors)?></p>
<p>Fecha nacimiento: <?=$usuario->fechaNacimiento?> </p>
<p>Sexo: <?=$usuario->sexo?> </p>
<p>Aficiones</p>
<ul>
    <?php foreach ($usuario->aficiones as $aficion) { ?>
        <li> <?=$aficion?> </li>
    <?php } ?>
</ul>
<p>Estudios: <?=$usuario->estudios?></p>
<p>Observaciones: <?=$usuario->observaciones?></p>
<p><img src=<?=$usuario->imagen?>></p>
</body>
</html>