@extends("layouts.app-admin")

@section("content")
    <x-share.page-title
        action="store"
        titleOption="PELICULAS"
        subtitileOption="Consulta de peliculas"
    />

    <x-peliculas.form :pelicula="$pelicula"
                      :directores="$directores"
                      :categorias="$categorias"
                      readonly
    />

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p4">
            <div class="tracking-wide font-semibold text-lg">LISTADO DE PELICULAS</div>
            <x-peliculas.list :peliculas="$peliculas"/>
        </div>
    </div>
@endsection
