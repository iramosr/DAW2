@extends("layouts.app-admin")

@section("content")
    <x-share.page-title
        action="store"
        titleOption="ALQUILERES"
        subtitileOption="Edición de alquileres"
    />

    <form id="mainForm"
          action="{{route('alquileres.update', $alquiler->id)}}"
          method="post"
          enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <x-alquileres.form :alquiler="$alquiler"
                          :peliculas="$peliculas"
                          :socios="$socios"
        />
    </form>

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p4">
            <div class="tracking-wide font-semibold text-lg">ÚLTIMOS ALQUILERES MODIFICADOS</div>
            <x-alquileres.list :alquileres="$alquileres"/>
        </div>
    </div>
@endsection
