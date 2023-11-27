@props(['id','name','label','item','type'=>'text','readonly'=>false])

<div class="w-full">
    @isset($label)
        <label for="{{$id}}" class="text-xs block font-bold text-blue-900 mr-2 p-1">{{$label}}</label>
    @endisset

    <input id="{{$id}}" type="{{$type}}"
           @isset($name) name="{{$name}}" @endisset
           @if($readonly) readonly @endif
        {{ $attributes->merge(['class' => 'w-full px-2 py-1 border
        border-emerald-300 focus:border-teal-500 focus:ring
        focus:ring-orange-200 rounded']) }}>

ERRORES
</div>