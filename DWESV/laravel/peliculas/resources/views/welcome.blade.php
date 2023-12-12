@extends("layouts.app-main")

@section("content")
    <x-share.page-header/>
    <x-share.page-title
        titleOption="PRÓXIMAS PELÍCULAS"
        subtitileOption="Estas son algunas películas que se estrenarán en el futuro."
    />

    <div class="px-8 mx-auto py-4">
        <div class="w-full mx-auto bg-white shadow-lg p-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                @foreach($peliculas as $pelicula)
                    <div class="bg-cyan-400">
                        <div class="relative">
                            <img src="{{$pelicula->portada}}">
                            <div class="absolute bottom-0 right-0 p-2 border
                            border-teal-400 bg-teal-700 text-white">
                                {{$pelicula->titulo}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$peliculas->links()}}
        </div>
    </div>
@endsection
