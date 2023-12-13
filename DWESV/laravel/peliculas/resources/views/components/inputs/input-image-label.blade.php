@props(['id','name','label','item','readonly'=>false])

<div class="w-full">
    @isset($label)
        <label for="{{$id}}" class="text-xs block font-bold text-blue-900 mr-2 p-1">{{$label}}</label>
    @endisset

    @if($readonly)
        @if(!empty($item))
            <img class="object-scale-down h-40 mx-auto" src="{{asset($item)}}">
        @else
            <img class="object-scale-down h-40 mx-auto" src="{{asset('images/imagen_no_disponible.png')}}">
        @endif
    @else
        <div class="text-center">
            <input @change="showPreview(event)"
                   id="{{$id}}" @isset($name) name="{{$name}}" @endisset type="file">
            <img id="preview" class="object-scale-down h-40 mx-auto"
                 @if (!empty($item))
                     src="{{asset($item)}}"
                @endif
            >
        </div>
    @endif
    @error("$name")
    <div class="block px-2 italic text-xs text-red-500 font-s text-left">
        {!! $message !!}
    </div>
    @enderror
</div>

@push('scripts')
    <script>
        function showImage() {
            return {
                showPreview(event) {
                    if (event.target.files.length > 0) {
                        var src = URL.createObjectURL(event.target.files[0]);
                        let preview = document.getElementById("preview");
                        preview.src = src;
                        preview.style.display = "block";
                    }
                }
            }
        }
    </script>
@endpush
