@props(['socio', 'readonly' => false])

<div class="w-full border p-2 bg-white shadow-lg rounded grid grid-cols-12 gap-2">
    <!-- Primera fila: Nombre, Apellido1, Apellido2 -->
    <div class="col-span-12 md:col-span-4">
        <x-inputs.input-text-label id="nombre" name="nombre" label="Nombre" :item="$socio->nombre" readonly="{{$readonly}}"/>
    </div>

    <div class="col-span-12 md:col-span-4">
        <x-inputs.input-text-label id="apellido1" name="apellido1" label="apellido1" :item="$socio->apellido1" readonly="{{$readonly}}"/>
    </div>

    <div class="col-span-12 md:col-span-4">
        <x-inputs.input-text-label id="apellido2" name="apellido2" label="apellido2" :item="$socio->apellido2" readonly="{{$readonly}}"/>
    </div>

    <!-- Tercera fila: Fecha nacimiento, email -->
    <div class="col-span-12 md:col-span-4">
        <x-inputs.input-text-label id="fechaNacimiento" name="fecha_nacimiento" label="Fecha nac." :item="$socio->fecha_nacimiento" type="date" readonly="{{$readonly}}"/>
    </div>
    <div class="col-span-12 md:col-span-8">
        <x-inputs.input-text-label id="email" name="email" label="Email" :item="$socio->email" readonly="{{$readonly}}"/>
    </div>
</div>
