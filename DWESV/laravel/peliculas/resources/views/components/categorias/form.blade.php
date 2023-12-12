@props(['categoria', 'readonly' => false])

<div class="w-full border p-2 bg-white shadow-lg rounded grid grid-cols-12 gap-2">
    <!-- Primera fila: Nombre -->
    <div class="col-span-12 md:col-span-12">
        <x-inputs.input-text-label id="nombre" name="nombre" label="Nombre" :item="$categoria->nombre" readonly="{{$readonly}}"/>
    </div>
</div>
