@extends("layouts.app-admin")

@section("content")
    <x-share.page-title
        action="store"
        titleOption="SOCIOS"
        subtitileOption="Alta de socios"
    />

    <form id="mainForm"
          action="{{route('socios.store')}}"
          method="post"
          enctype="multipart/form-data">
        @csrf
        <x-socios.form :socio="$socio"/>
    </form>

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p4">
            <div class="tracking-wide font-semibold text-lg">ÚLTIMOS SOCIOS AÑADIDOS</div>
            <x-socios.list :socios="$socios"/>
        </div>
    </div>
@endsection
