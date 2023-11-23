@extends("layouts.app-admin")

@section("content")
    <x-share.page-admin-title
        action="store"
        titleOption="CLIENTES"
        subtitileOption="Alta de clientes"
    />

    <form id="mainForm"
        action="{{route('admin.clientes.create')}}"
        method="post">
        FORMULARIO
    </form>
@endsection
