<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-orange-200">

@include("articulos.menu")

<div class="container mx-auto">

    <x-title title="LISTADO DE ARTICULO"/>
</div>
<div class="container mx-auto">

    @include("articulos.tabla")

</div>
</body>
</html>
