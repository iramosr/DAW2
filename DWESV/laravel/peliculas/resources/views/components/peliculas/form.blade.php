@props(['pelicula', 'directores', 'categorias', 'readonly' => false])

<div class="w-full border p-2 bg-white shadow-lg rounded grid grid-cols-12 gap-2">
    <!-- Primera fila: Titulo, Fecha de estreno -->
    <div class="col-span-12 md:col-span-6">
        <x-inputs.input-text-label id="titulo" name="titulo" label="Titulo" :item="$pelicula->titulo" readonly="{{$readonly}}"/>
    </div>
    <div class="col-span-12 md:col-span-6">
        <x-inputs.input-text-label id="fechaEstreno" name="fecha_estreno" label="Fecha de estreno" :item="$pelicula->fecha_estreno" type="date" readonly="{{$readonly}}"/>
    </div>
    <!-- Segunda fila: Director, Categoria -->
    <div class="col-span-12 md:col-span-6">
        <x-inputs.select-label
            id="director_id"
            name="director_id"
            label="Director"
            :options="$directores"
            :selected="$pelicula->director_id"
            campo="nombre"
            disabled="{{$readonly}}"
        />
    </div>
    <div class="col-span-12 md:col-span-6">
        <x-inputs.select-label
            id="categoria_id"
            name="categoria_id"
            label="Categoria"
            :options="$categorias"
            :selected="$pelicula->categoria_id"
            campo="nombre"
            disabled="{{$readonly}}"
            />
    </div>

    <!-- Tercera fila: Portada, sinopsis -->
    <div class="col-span-12 md:col-span-4">
        <x-inputs.input-image-label id="portada" name="portada" label="Portada" :item="$pelicula->portada" readonly="{{$readonly}}"/>
    </div>
    <div class="col-span-12 md:col-span-8">
        <x-inputs.input-textarea-label id="sinopsis" name="sinopsis" label="Sinopsis" :item="$pelicula->sinopsis" readonly="{{$readonly}}"/>
    </div>
</div>
