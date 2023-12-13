@extends("layouts.app-admin")

@section("content")
    <x-share.page-title
        action="store"
        titleOption="PELICULAS"
        subtitileOption="Edición de peliculas"
    />

    <form id="mainForm"
          action="{{route('peliculas.update', $pelicula->id)}}"
          method="post"
          enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <x-peliculas.form :pelicula="$pelicula"
                          :directores="$directores"
                          :categorias="$categorias"
        />
    </form>

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p4">
            <div class="tracking-wide font-semibold text-lg">ÚLTIMAS PELICULAS MODIFICADAS</div>
            <x-peliculas.list :peliculas="$peliculas"/>
        </div>
    </div>
@endsection
