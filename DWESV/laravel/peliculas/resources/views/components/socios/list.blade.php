@props(['socios'])
<div>
    <table class="w-full bg-white shadow-lg">
        <thead>
        <tr class="border-b-2 border-orange-500 py-4 uppercase">
            <th class="py-2">Nombre</th>
            <th class="py-2 text-left">Apellidos</th>
            <th class="py-2 text-left">Email</th>
            <th class="py-2 w-32">Fecha de nacimiento</th>
            <th class="py-2 w-32">Alta</th>
            <th class="py-2 w-32">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($socios as $socio)
            <tr class="even:bg-gray-100 odd:bg-white">
                <td class="py-1 px-2 text-center">{{$socio->nombre}}</td>
                <td class="py-1 px-2">
                    {{$socio->apellido1}} {{$socio->apellido2}}
                </td>
                <td class="py-1 px-2">
                    {{$socio->email}}
                </td>
                <td class="py-1 px-2 text-center">
                    {{ date('d/m/Y',strtotime($socio->fecha_nacimiento))}}
                </td>
                <td class="py-1 px-2 text-center">
                    {{ date('d/m/Y',strtotime($socio->created_at))}}
                </td>
                <td class="py-1 px-2 text-center">
                    <a href="{{route('socios.show', $socio->id)}}">
                        <x-buttons.button-table action="show"/>
                    </a>
                    <a href="{{route('socios.edit', $socio->id)}}">
                        <x-buttons.button-table action="update"/>
                    </a>
                    <x-share.confirm-delete :id="$socio->id" :url="route('socios.destroy',$socio->id)"/>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $socios->links() }}
</div>
