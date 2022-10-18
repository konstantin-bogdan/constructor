<a class="btn btn-app bg-success m-0"
   href="{{ route('admin.'.$table.'.create') }}@if(isset($query))?{{ $query }}@endif">
    <i class="fas fa-plus"></i> {{ $slot }}
</a>
