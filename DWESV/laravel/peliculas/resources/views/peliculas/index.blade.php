@extends("layouts.app-main")

@section("content")
    <x-share.page-title
        action="create"
        titleOption="PELICULAS"
        subtitileOption="Listado de peliculas"
    />

    <form id="mainForm"
        action="{{route('peliculas.create')}}"
        method="get">
    </form>

    <x-peliculas.filtro/>

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p4">
            <x-peliculas.list :peliculas="$peliculas"/>
        </div>
    </div>

@endsection
