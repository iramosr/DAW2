<table class="w-full bg-white shadow-lg">
    <thead>
    <tr class="border-b-2 border-orange-500 uppercase">
        <th></th>
        <th class="py-1">Referencia</th>
        <th class="py-1">Descripción</th>
        <th class="py-1">Precio</th>
    </tr>
    </thead>
    <tbody>
    @foreach($articulos as $key=>$articulo)
        <tr class="even:bg-gray-100 odd:bg-white">
            <td class="py-1 px-2">{{ (request()->page-1)*10 + $key + 1 }}</td>
            <td class="py-1 px-2">{{ $articulo->ref }}</td>
            <td class="py-1 px-2">{{ $articulo->descripcion }}</td>
            <td class="py-1 px-2 text-right w-20">{{ $articulo->precio }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
{{$articulos->links()}}
