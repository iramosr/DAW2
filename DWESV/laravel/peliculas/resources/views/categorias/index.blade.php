@extends("layouts.app-main")

@section("content")
    <x-share.page-title
        action="create"
        titleOption="CATEGORIAS"
        subtitileOption="Listado de categorias"
    />

    <form id="mainForm"
        action="{{route('categorias.create')}}"
        method="get">
    </form>

    <x-categorias.filtro/>

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p4">
            <x-categorias.list :categorias="$categorias"/>
        </div>
    </div>

@endsection
