@props(['name', 'action'=>'store'])
@switch($action)
    @case('create')
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded"
                type="submit">
            {{$name}}
        </button>
    @break
    @case('store')
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded"
                type="submit">
            {{$name}}
        </button>
    @break
@endswitch

