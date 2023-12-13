@props(['id', 'name', 'label', 'options', 'selected' => null, 'campo' => 'name', 'disabled'=>false])

<div class="w-full">
    @isset($label)
        <label for="{{$id}}" class="text-xs block font-bold text-blue-900 mr-2 p-1">{{$label}}</label>
    @endisset

    <select id="{{$id}}"
            @isset($name) name="{{$name}}" @endisset
            @if($disabled) disabled @endif
        {{ $attributes->merge(['class' => 'w-full px-2 py-1 border border-emerald-300 focus:border-teal-500 focus:ring focus:ring-orange-200 rounded']) }}
    >
        @foreach($options as $option)
            <option value="{{ $option['id'] }}"
                    @if($option['id'] == $selected) selected @endif>{{ $option[$campo] }}</option>
        @endforeach
    </select>

    @error("$name")
    <div class="block px-2 italic text-xs text-red-500 font-s text-left">
        {!! $message !!}
    </div>
    @enderror
</div>
