@extends("layouts.app-admin")

@section("content")
    <x-share.page-admin-title
        action="store"
        titleOption="CLIENTES"
        subtitileOption="Alta de clientes"
    />

    <form id="mainForm"
          action="{{route('admin.clientes.store')}}"
          method="post"
          enctype="multipart/form-data">
        @csrf
        <x-admin-clientes.form :cliente="$cliente"/>
    </form>
@endsection
