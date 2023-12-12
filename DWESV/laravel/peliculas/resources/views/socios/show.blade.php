@extends("layouts.app-admin")

@section("content")
    <x-share.page-title
        action="store"
        titleOption="SOCIOS"
        subtitileOption="Consulta de socios"
    />

        <x-socios.form :socio="$socio" readonly/>

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p4">
            <div class="tracking-wide font-semibold text-lg">LISTADO DE SOCIOS</div>
            <x-socios.list :socios="$socios"/>
        </div>
    </div>
@endsection
