@props(['peliculas'])
<div>
    <table class="w-full bg-white shadow-lg">
        <thead>
        <tr class="border-b-2 border-orange-500 py-4 uppercase">
            <th class="py-2 text-left">Titulo</th>
            <th class="py-2">Fecha de esteno</th>
            <th class="py-2 w-32">Director</th>
            <th class="py-2 w-32">Categoría</th>
            <th class="py-2 w-32">Alta</th>
            <th class="py-2 w-32">Portada</th>
            <th class="py-2 w-32">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($peliculas as $pelicula)
            <tr class="even:bg-gray-100 odd:bg-white">
                <td class="py-1 px-2 text-left">{{$pelicula->titulo}}</td>
                <td class="py-1 px-2 text-center">
                    {{ date('d/m/Y',strtotime($pelicula->fecha_estreno))}}
                </td>
                <td class="py-1 px-2">
                    {{$pelicula->director->nombre}}
                </td>
                <td class="py-1 px-2">
                    {{$pelicula->categoria->nombre}}
                </td>
                <td class="py-1 px-2 text-center">
                    {{ date('d/m/Y',strtotime($pelicula->created_at))}}
                </td>
                <td class="py-1 px-2 text-center align-middle">
                    @if(!empty($pelicula->portada))
                        <img
                            title="{{$pelicula->titulo}} {{$pelicula->fecha_estreno}}"
                            class="object-scale-down h-10 w-10 mx-auto"
                            src="{{asset($pelicula->portada)}}">
                    @else
                        <img
                            title="{{$pelicula->titulo}} {{$pelicula->fecha_estreno}}"
                            class="object-scale-down h-10 w-10 mx-auto"
                            src="{{asset('images/imagen_no_disponible.png')}}">
                    @endif
                </td>
                <td class="py-1 px-2 text-right">
                    @if($pelicula->sinopsis)
                        <x-buttons.button-row
                            icono="fa-comment"
                            :registro="$pelicula"
                            campo="id"/>
                    @endif
                    <a href="{{route('peliculas.show', $pelicula->id)}}">
                        <x-buttons.button-table action="show"/>
                    </a>
                    <a href="{{route('peliculas.edit', $pelicula->id)}}">
                        <x-buttons.button-table action="update"/>
                    </a>
                    <x-share.confirm-delete :id="$pelicula->id" :url="route('peliculas.destroy',$pelicula->id)"/>
                </td>
            </tr>
            <tr id="row_{{ $pelicula->id }}" class="hidden">
                <td colspan="7" class="p-2">
                    <p>{{ $pelicula->sinopsis }}</p>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $peliculas->links() }}
</div>
