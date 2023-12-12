@extends("layouts.app-admin")

@section("content")
    <x-share.page-title
        action="store"
        titleOption="CATEGORIAS"
        subtitileOption="Alta de categorias"
    />

    <form id="mainForm"
          action="{{route('categorias.store')}}"
          method="post"
          enctype="multipart/form-data">
        @csrf
        <x-categorias.form :categoria="$categoria"/>
    </form>

    <div class="py-12">
        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-lg p4">
            <div class="tracking-wide font-semibold text-lg">ÚLTIMAS CATEGORÍAS AÑADIDOS</div>
            <x-categorias.list :categorias="$categorias"/>
        </div>
    </div>
@endsection
