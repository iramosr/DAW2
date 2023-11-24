@props(['cliente', 'readonly' => false])

<div class="w-full border p-2 bg-white shadow-lg rounded grid grid-cols-12 gap-2">
    <!-- Primera fila: Nif -->
    <div class="col-span-12 md:col-span-3">
        <x-inputs.input-text-label id="nif" name="nif" label="Nif"
                                   :item="$cliente->nif" :readonly="{{$readonly}}"/>

    </div>
    <div class="col-span-none md:col-span-9"></div>

</div>
