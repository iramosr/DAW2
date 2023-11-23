@extends("layouts.app-admin")

@section("content")
    <x-share.page-admin-title
        action="create"
        titleOption="CLIENTES"
        subtitileOption="Listado de clientes"
    />

    <form id="mainForm"
        action="{{route('admin.clientes.create')}}"
        method="get">
    </form>
@endsection
