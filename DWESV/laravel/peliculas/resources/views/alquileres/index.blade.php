@extends("layouts.app-main")

@section("content")
    <x-share.page-title
        action="create"
        titleOption="ALQUILERES"
        subtitileOption="Listado de alquileres"
    />

    <form id="mainForm"
        action="{{route('alquileres.create')}}"
        method="get">
    </form>

    <x-alquileres.filtro/>

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p4">
            <x-alquileres.list :alquileres="$alquileres"/>
        </div>
    </div>

@endsection
