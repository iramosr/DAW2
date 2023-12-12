@extends("layouts.app-main")

@section("content")
    <x-share.page-title
        action="create"
        titleOption="SOCIOS"
        subtitileOption="Listado de socios"
    />

    <form id="mainForm"
        action="{{route('socios.create')}}"
        method="get">
    </form>

    <x-socios.filtro/>

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p4">
            <x-socios.list :socios="$socios"/>
        </div>
    </div>

@endsection
