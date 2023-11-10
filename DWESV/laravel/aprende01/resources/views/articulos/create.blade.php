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
    <h1 class="text-center text-4xl font-semibold bg-white p-4 my-2 shadow-lg">
        NUEVO ARTÍCULO
    </h1>

    <form action="{{route('articulos.store')}}" method="post">
        <div class="container mx-auto flex items-center justify-center">
            <div class="w-full md:w-1/2 bg-indigo-200 shadow-lg p-2 m-2 rounded-lg">
                <div class="mb-4">
                    {{-- Referencia --}}
                    <div class="grid grid-flow-row sm:grid-flow-col gap-3">
                        <div class="sm:col-span-4 justify-center">
                            <label class="block text-gray-700 text-sm font-bold" for="ref">
                                Referencia<sup>*</sup>
                            </label>
                            <input type="text" placeholder="referencia" name="ref" required
                                   class="">

                        </div>
                        {{-- Precio --}}
                        <div class="">
                            <label class="block text-gray-700 text-sm font-bold" for="precio">
                                Precio<sup>*</sup>
                            </label>
                            <input type="number" step="0.01" placeholder="precio" name="precio"
                                   class="">
                        </div>
                    </div>
                </div>
                {{--Descripción --}}
                <div class="mb-4">
                    <div class="">
                        <label class="block text-gray-700 text-sm font-bold" for="descripcion">
                            Descripción
                        </label>
                        <input type="text" placeholder="descripcion"
                               id="descripcion" name="descripcion" required
                               class="">
                    </div>
                    <div class="">

                    </div>
                </div>
                {{--Observaciones--}}
                <div class="mb-4">
                    <div class="">
                        <label class="block text-gray-700 text-sm font-bold"
                               for="observaciones">Observaciones</label>
                        <textarea id="observaciones" name="observaciones"
                                  class=""
                                  rows="5" placeholder="observaciones sobre el artículo" required></textarea>
                    </div>
                </div>
                {{--Botón--}}
                <div class="flex items-center justify-between">
                    <div class="bg-yellow-200 w-full px-4 py-1 font-semibold text-red-500 mr-2 rounded">
                        Introduce el artículo
                    </div>
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded"
                        type="submit">Aceptar
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="container mx-auto">
    @include("articulos.tabla")
</div>
</body>
</html>
