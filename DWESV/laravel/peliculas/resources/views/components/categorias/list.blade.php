@props(['categorias'])
<div>
    <table class="w-full bg-white shadow-lg">
        <thead>
        <tr class="border-b-2 border-orange-500 py-4 uppercase">
            <th class="py-2">Nombre</th>
            <th class="py-2 w-32">Alta</th>
            <th class="py-2 w-32">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categorias as $categoria)
            <tr class="even:bg-gray-100 odd:bg-white">
                <td class="py-1 px-2 text-center">{{$categoria->nombre}}</td>
                <td class="py-1 px-2 text-center">
                    {{ date('d/m/Y',strtotime($categoria->created_at))}}
                </td>
                <td class="py-1 px-2 text-center">
                    <a href="{{route('categorias.show', $categoria->id)}}">
                        <x-buttons.button-table action="show"/>
                    </a>
                    <a href="{{route('categorias.edit', $categoria->id)}}">
                        <x-buttons.button-table action="update"/>
                    </a>
                    <x-share.confirm-delete :id="$categoria->id" :url="route('categorias.destroy',$categoria->id)"/>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $categorias->links() }}
</div>
