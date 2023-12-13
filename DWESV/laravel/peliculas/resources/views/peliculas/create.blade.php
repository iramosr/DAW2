@extends("layouts.app-admin")

@section("content")
    <x-share.page-title
        action="store"
        titleOption="PELICULAS"
        subtitileOption="Alta de peliculas"
    />

    <form id="mainForm"
          action="{{route('peliculas.store')}}"
          method="post"
          enctype="multipart/form-data">
        @csrf
        <x-peliculas.form :pelicula="$pelicula"
                          :directores="$directores"
                          :categorias="$categorias"
        />
    </form>

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p4">
            <div class="tracking-wide font-semibold text-lg">ÚLTIMAS PELICULAS AÑADIDOS</div>
            <x-peliculas.list :peliculas="$peliculas"/>
        </div>
    </div>
@endsection
