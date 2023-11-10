<nav class="bg-orange-900 p-4 flex items-center justify-between">
    <div class="flex space-x-4 text-white">
        <span>APRende</span>
        <ul class="flex space-x-4">
            <li><a href="/">Inicio</a></li>
            <li><a href="{{ route('articulos.index') }}">Listado</a></li>
            <li><a href="{{ route('articulos.create') }}">Nuevo</a></li>
        </ul>
    </div>
    <button class="bg-blue-500 hover:bg-blue-400 text-white py-2 px-4 rounded">Login</button>
</nav>
