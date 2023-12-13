@props(['id','name','label','item','readonly'=>false])

<div class="w-full">
    @isset($label)
        <label for="{{$id}}" class="text-xs block font-bold text-rose-900 mr-2 p-1">{{$label}}</label>
    @endisset

    <textarea id="{{$id}}"
           @isset($name) name="{{$name}}" @endisset
           @if($readonly) readonly @endif
        {{ $attributes->merge(['class' => 'w-full px-2 py-1 border
        border-fuchsia-300 focus:border-fuchsia-500 focus:ring
        focus:ring-rose-200 rounded'])}}>{{old("$name",$item)}}</textarea>

    @error("$name")
    <div class="block px-2 italic text-xs text-red-500 font-s text-left">
        {!! $message !!}
    </div>
    @enderror

</div>
