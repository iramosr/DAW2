@props(['alquileres'])
<div>
    <table class="w-full bg-white shadow-lg">
        <thead>
        <tr class="border-b-2 border-orange-500 py-4 uppercase">
            <th class="py-2 text-left">Pelicula</th>
            <th class="py-2 text-left">Socio</th>
            <th class="py-2 w-32">Fecha de alquiler</th>
            <th class="py-2 w-32">Fecha de devolucion</th>
            <th class="py-2 w-32">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($alquileres as $alquiler)
            <tr class="even:bg-gray-100 odd:bg-white">
                <td class="py-1 px-2 text-left">{{$alquiler->pelicula->titulo}}</td>
                <td class="py-1 px-2 text-left">{{$alquiler->socio->nombre}}</td>
                <td class="py-1 px-2 text-center">
                    {{ date('d/m/Y',strtotime($alquiler->fecha_alquiler))}}
                </td>
                <td class="py-1 px-2 text-center">
                    @if(!empty($alquiler->fecha_devolucion))
                        {{ date('d/m/Y',strtotime($alquiler->fecha_devolucion))}}
                    @else
                        <span class="text-red-500">Pendiente</span>
                    @endif
                </td>
                <td class="py-1 px-2 text-center">
                    <a href="{{route('alquileres.show', $alquiler->id)}}">
                        <x-buttons.button-table action="show"/>
                    </a>
                    <a href="{{route('alquileres.edit', $alquiler->id)}}">
                        <x-buttons.button-table action="update"/>
                    </a>
                    <x-share.confirm-delete :id="$alquiler->id" :url="route('alquileres.destroy',$alquiler->id)"/>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $alquileres->links() }}
</div>
