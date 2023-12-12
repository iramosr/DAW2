@extends("layouts.app-admin")

@section("content")
    <x-share.page-title
        action="store"
        titleOption="DIRECTORES"
        subtitileOption="Alta de directores"
    />

    <form id="mainForm"
          action="{{route('directores.store')}}"
          method="post"
          enctype="multipart/form-data">
        @csrf
        <x-directores.form :director="$director"/>
    </form>

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p4">
            <div class="tracking-wide font-semibold text-lg">ÚLTIMOS DIRECTORES AÑADIDOS</div>
            <x-directores.list :directores="$directores"/>
        </div>
    </div>
@endsection
