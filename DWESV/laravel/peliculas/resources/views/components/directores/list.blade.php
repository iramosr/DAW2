@props(['directores'])
<div>
    <table class="w-full bg-white shadow-lg">
        <thead>
        <tr class="border-b-2 border-orange-500 py-4 uppercase">
            <th class="py-2">Nombre</th>
            <th class="py-2 text-left">Apellidos</th>
            <th class="py-2 w-32">Fecha de nacimiento</th>
            <th class="py-2 w-32">Alta</th>
            <th class="py-2 w-32">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($directores as $director)
            <tr class="even:bg-gray-100 odd:bg-white">
                <td class="py-1 px-2 text-center">{{$director->nombre}}</td>
                <td class="py-1 px-2">
                    {{$director->apellidos}}
                </td>
                <td class="py-1 px-2 text-center">
                    {{ date('d/m/Y',strtotime($director->fecha_nacimiento))}}
                </td>
                <td class="py-1 px-2 text-center">
                    {{ date('d/m/Y',strtotime($director->created_at))}}
                </td>
                <td class="py-1 px-2 text-center">
                    <a href="{{route('directores.show', $director->id)}}">
                        <x-buttons.button-table action="show"/>
                    </a>
                    <a href="{{route('directores.edit', $director->id)}}">
                        <x-buttons.button-table action="update"/>
                    </a>
                    <x-share.confirm-delete :id="$director->id" :url="route('directores.destroy',$director->id)"/>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $directores->links() }}
</div>
