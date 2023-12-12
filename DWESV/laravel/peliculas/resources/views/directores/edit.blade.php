@extends("layouts.app-admin")

@section("content")
    <x-share.page-title
        action="store"
        titleOption="DIRECTORES"
        subtitileOption="Edición de directores"
    />

    <form id="mainForm"
          action="{{route('directores.update', $director->id)}}"
          method="post"
          enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <x-directores.form :director="$director"/>
    </form>

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p4">
            <div class="tracking-wide font-semibold text-lg">ÚLTIMOS DIRECTOR MODIFICADOS</div>
            <x-directores.list :directores="$directores"/>
        </div>
    </div>
@endsection
