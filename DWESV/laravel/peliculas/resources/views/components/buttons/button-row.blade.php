@props(['registro'=>'', 'campo'=>'', 'icono'=>'fa-plus'])
<button class="text-white bg-lime-600 hover:bg-lime-100 w-6 rounded"
    onclick="toggleRow('{{ $registro->$campo }}')"
>
    <i class="fa-solid {{$icono}}"></i>
</button>
@push('scripts')
    <script>
        function toggleRow(id) {
            const row = document.getElementById(`row_${id}`);
            row.classList.toggle('hidden');
        }
    </script>
@endpush
