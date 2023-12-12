@props(['directores'])

<div x-data="{ showFiltro: false }" class="text-sm">
    <button @click="showFiltro = !showFiltro"
        class="text-sm border border-teal-400 p-1 rounded bg-teal-600 hover:bg-teal-100">
        Filtro
    </button>
    <form id="mainForm"
          action="{{route('directores.filtro')}}"
          method="post">
        @csrf
        <div id="filtro"
             x-show="showFiltro"
             class="grid grid-cols-4 gap-2 bg-teal-100 border border-teal-400">

            <x-inputs.input-text-filter name="filtroNombre" label="Nombre"/>
            <x-inputs.input-text-filter name="filtroApellidos" label="Apellidos"/>
            <div class="flex items-end">
                <button class="text-sm border border-teal-400 p-1 rounded bg-teal-600 hover:bg-teal-100">
                    Filtrar
                </button>
            </div>
        </div>
    </form>
</div>
