@extends("layouts.app-admin")

@section("content")
    <x-share.page-title
        action="store"
        titleOption="SOCIOS"
        subtitileOption="Edición de socios"
    />

    <form id="mainForm"
          action="{{route('socios.update', $socio->id)}}"
          method="post"
          enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <x-socios.form :socio="$socio"/>
    </form>

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p4">
            <div class="tracking-wide font-semibold text-lg">ÚLTIMOS SOCIOS MODIFICADOS</div>
            <x-socios.list :socios="$socios"/>
        </div>
    </div>
@endsection
