<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bucles05B</title>
</head>
<body>

<table>
    <thead>
    <tr>
        <th colspan="5">Tabla del multiplicar del 3</th>
    </tr>
    <tr>
        <th>Nº</th>
        <th>Op</th>
        <th>Valor</th>
        <th></th>
        <th>Resultado</th>
    </tr>
    </thead>
    <tbody>
        <?php for ($i=0; $i<=10; $i++){ ?>
            <tr>
                <td> 3 </td>
                <td> x </td>
                <td> <?= $i?> </td>
                <td> = </td>
                <td> <?= 3*$i ?> </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>