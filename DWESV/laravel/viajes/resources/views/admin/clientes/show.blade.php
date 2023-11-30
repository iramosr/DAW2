@extends("layouts.app-admin")

@section("content")
    <x-share.page-admin-title
        action="store"
        titleOption="CLIENTES"
        subtitileOption="Consulta de clientes"
    />

        <x-admin-clientes.form :cliente="$cliente" readonly/>

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p4">
            <div class="tracking-wide font-semibold text-lg">LISTADO DE CLIENTES</div>
            <x-admin-clientes.list :clientes="$clientes"/>
        </div>
    </div>
@endsection
