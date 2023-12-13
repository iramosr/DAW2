@props(['alquiler', 'peliculas', 'socios', 'readonly' => false])

<div class="w-full border p-2 bg-white shadow-lg rounded grid grid-cols-12 gap-2">
    <!-- Primera fila: Pelicula, Socio -->
    <div class="col-span-12 md:col-span-6">
        <x-inputs.select-label
            id="pelicula_id"
            name="pelicula_id"
            label="Pelicula"
            :options="$peliculas"
            :selected="$alquiler->pelicula_id"
            campo="titulo"
            disabled="{{$readonly}}"
        />
    </div>
    <div class="col-span-12 md:col-span-6">
        <x-inputs.select-label
            id="socio_id"
            name="socio_id"
            label="Socio"
            :options="$socios"
            :selected="$alquiler->socio_id"
            campo="nombre"
            disabled="{{$readonly}}"
        />
    </div>
    <!-- Segunda fila: Fecha alquiler, Fecha devolucion -->
    <div class="col-span-12 md:col-span-6">
        <x-inputs.input-text-label id="fechaAlquiler" name="fecha_alquiler" label="Fecha de alquiler" :item="$alquiler->fecha_alquiler" type="date" readonly="{{$readonly}}"/>
    </div>
    <div class="col-span-12 md:col-span-6">
        <x-inputs.input-text-label id="fechaDevolucion" name="fecha_devolucion" label="Fecha de devolución" :item="$alquiler->fecha_devolucion" type="date" readonly="{{$readonly}}"/>
    </div>
</div>
