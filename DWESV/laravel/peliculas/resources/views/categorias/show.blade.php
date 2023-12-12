@extends("layouts.app-admin")

@section("content")
    <x-share.page-title
        action="store"
        titleOption="CATEGORIAS"
        subtitileOption="Consulta de categorias"
    />

        <x-categorias.form :categoria="$categoria" readonly/>

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p4">
            <div class="tracking-wide font-semibold text-lg">LISTADO DE CATEGORÍAS</div>
            <x-categorias.list :categorias="$categorias"/>
        </div>
    </div>
@endsection
