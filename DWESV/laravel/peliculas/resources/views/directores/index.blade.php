@extends("layouts.app-main")

@section("content")
    <x-share.page-title
        action="create"
        titleOption="DIRECTORES"
        subtitileOption="Listado de directores"
    />

    <form id="mainForm"
        action="{{route('directores.create')}}"
        method="get">
    </form>

    <x-directores.filtro/>

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p4">
            <x-directores.list :directores="$directores"/>
        </div>
    </div>

@endsection
