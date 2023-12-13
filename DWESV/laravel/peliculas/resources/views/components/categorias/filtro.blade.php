@props(['categorias'])

<div x-data="{ showFiltro: false }" class="text-sm">
    <button @click="showFiltro = !showFiltro"
            class="text-sm border border-fuchsia-500 p-1 rounded bg-fuchsia-200 hover:bg-fuchsia-900 hover:text-fuchsia-200">
        Filtro
    </button>
    <form id="mainForm"
          action="{{route('categorias.filtro')}}"
          method="post">
        @csrf
        <div id="filtro"
             x-show="showFiltro"
             class="grid grid-cols-4 gap-2 bg-white border border-gray-400">

            <x-inputs.input-text-filter name="filtroNombre" label="Nombre"/>
            <div class="flex items-end">
                <button class="text-sm border border-fuchsia-500 p-1 rounded bg-fuchsia-200 hover:bg-fuchsia-900 hover:text-fuchsia-200">
                    Filtrar
                </button>
            </div>
        </div>
    </form>
</div>
