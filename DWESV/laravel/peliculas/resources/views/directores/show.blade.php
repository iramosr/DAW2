@extends("layouts.app-admin")

@section("content")
    <x-share.page-title
        action="store"
        titleOption="DIRECTORES"
        subtitileOption="Consulta de directores"
    />

        <x-directores.form :director="$director" readonly/>

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p4">
            <div class="tracking-wide font-semibold text-lg">LISTADO DE DIRECTORES</div>
            <x-directores.list :directores="$directores"/>
        </div>
    </div>
@endsection
