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
<x-title title="NUEVO ARTICULO"/>

    <form action="{{route('articulos.store')}}" method="post">
        @csrf
        <div class="container mx-auto flex items-center justify-center">
            <div class="w-full md:w-1/2 bg-indigo-200 shadow-lg p-2 m-2 rounded-lg">
                {{-- 1ª fila --}}
                <div class="mb-4">
                    <div class="grid grid-flow-row sm:grid-flow-col gap-3">
                        {{-- Referencia --}}
                        <div class="sm:col-span-4 justify-center">
                            <label class="block text-gray-700 text-sm font-bold" for="ref">
                                Referencia<sup>*</sup>
                            </label>
                            <input type="text" placeholder="Referencia" name="ref" required
                                   class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none
                                   @error('ref') border-red-500 @enderror">
                        </div>
                        {{-- Proveedor --}}
                        <div class="sm:col-span-4 justify-center">
                            <label class="block text-gray-700 text-sm font-bold" for="ref">
                                Proveedor<sup>*</sup>
                            </label>
                             <select name="proveedor_id" required
                                     class="w-full py-2 px-3 border rounded text-gray-700 leading-tight focus:outline-none"
                             >
                                 <option value=""></option>
                                 @foreach($proveedores as $proveedor)
                                     <option value="{{$proveedor->id}}">
                                         {{$proveedor->razon_social}} - [{{$proveedor->nif}}]
                                     </option>
                                @endforeach
                             </select>
                        </div>
                        {{-- Precio --}}
                        <div class="sm:col-span-4 justify-center">
                            <label class="block text-gray-700 text-sm font-bold" for="precio">
                                Precio
                            </label>
                            <input type="number" step="0.01" placeholder="Precio" name="precio"
                                   class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none">
                        </div>
                    </div>
                </div>

                {{-- 2ª fila --}}
                <div class="mb-4">
                    {{-- Descripción --}}
                    <label class="block text-gray-700 text-sm font-bold" for="descripcion">
                        Descripción<sup>*</sup>
                    </label>
                    <input type="text" placeholder="Descripción"
                           id="descripcion" name="descripcion" required
                           class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none">
                </div>

                {{-- 3ª fila --}}
                <div class="mb-4">
                    {{-- Observaciones --}}
                    <label class="block text-gray-700 text-sm font-bold"
                           for="observaciones">Observaciones</label>
                    <textarea id="observaciones" name="observaciones"
                              class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                              rows="5" placeholder="Observaciones sobre el artículo"></textarea>
                </div>

                {{-- 4ª fila --}}
                <div class="flex items-center justify-between">
                    <div class="bg-yellow-200 w-full px-4 py-1 font-semibold text-red-500 mr-2 rounded">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <span class="text-red-500">{{$error}}</span>
                            @endforeach
                        @else
                            <span class="text-blue-500">Introduce el artículo</span>
                        @endif
                    </div>
                    {{-- Botón --}}
                    {{--<x-boton-save/>--}}
                    <x-boton-save name="GUARDAR"/>
{{--                 <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded"
                        type="submit">Aceptar
                    </button> --}}
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
