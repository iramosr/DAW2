@extends("layouts.app-admin")

@section("content")
    <x-share.page-title
        action="store"
        titleOption="ALQUILERES"
        subtitileOption="Alta de alquileres"
    />

    <form id="mainForm"
          action="{{route('alquileres.store')}}"
          method="post"
          enctype="multipart/form-data">
        @csrf
        <x-alquileres.form :alquiler="$alquiler"
                          :peliculas="$peliculas"
                          :socios="$socios"
        />
    </form>

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p4">
            <div class="tracking-wide font-semibold text-lg">ÚLTIMOS ALQUILERES AÑADIDOS</div>
            <x-alquileres.list :alquileres="$alquileres"/>
        </div>
    </div>
@endsection
