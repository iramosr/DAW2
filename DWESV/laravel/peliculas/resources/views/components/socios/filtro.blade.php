@props(['socios'])

<div x-data="{ showFiltro: false }" class="text-sm">
    <button @click="showFiltro = !showFiltro"
            class="text-sm border border-fuchsia-500 p-1 rounded bg-fuchsia-200 hover:bg-fuchsia-900 hover:text-fuchsia-200">
        Filtro
    </button>
    <form id="mainForm"
          action="{{route('socios.filtro')}}"
          method="post">
        @csrf
        <div id="filtro"
             x-show="showFiltro"
             class="grid grid-cols-4 gap-2 bg-white border border-gray-400">

            <x-inputs.input-text-filter name="filtroNombre" label="Nombre"/>
            <x-inputs.input-text-filter name="filtroApellido1" label="Apellido 1"/>
            <x-inputs.input-text-filter name="filtroApellido2" label="Apellido 2"/>
            <div class="flex items-end">
                <button class="text-sm border border-fuchsia-500 p-1 rounded bg-fuchsia-200 hover:bg-fuchsia-900 hover:text-fuchsia-200">
                    Filtrar
                </button>
            </div>
        </div>
    </form>
</div>
