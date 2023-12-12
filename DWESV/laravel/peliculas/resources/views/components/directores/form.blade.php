@props(['director', 'readonly' => false])

<div class="w-full border p-2 bg-white shadow-lg rounded grid grid-cols-12 gap-2">
    <!-- Primera fila: Nombre, Apellidos -->
    <div class="col-span-12 md:col-span-6">
        <x-inputs.input-text-label id="nombre" name="nombre" label="Nombre" :item="$director->nombre" readonly="{{$readonly}}"/>
    </div>

    <div class="col-span-12 md:col-span-6">
        <x-inputs.input-text-label id="apellidos" name="apellidos" label="apellidos" :item="$director->apellidos" readonly="{{$readonly}}"/>
    </div>

    <!-- Tercera fila: Fecha nacimiento -->
    <div class="col-span-12 md:col-span-12">
        <x-inputs.input-text-label id="fechaNacimiento" name="fecha_nacimiento" label="Fecha nac." :item="$director->fecha_nacimiento" type="date" readonly="{{$readonly}}"/>
    </div>
</div>
