<form action="{{ route($route) }}"
      @if(isset($id))
        id="{{ $id }}"
       @endif
      method="post"
      enctype="multipart/form-data">
    @csrf
    @method('post')
    {{ $slot }}
</form>


