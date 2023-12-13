@extends("layouts.app-admin")

@section("content")
    <x-share.page-title
            action="store"
            titleOption="ALQUILERES"
            subtitileOption="Consulta de alquileres"
    />

    <x-alquileres.form :alquiler="$alquiler"
                       :peliculas="$peliculas"
                       :socios="$socios"
                       readonly
    />

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p4">
            <div class="tracking-wide font-semibold text-lg">LISTADO DE ALQUILERES</div>
            <x-alquileres.list :alquileres="$alquileres"/>
        </div>
    </div>
@endsection
