<form action="{{ route('admin.'.str(lcfirst(class_basename($model)))->plural().'.update',
                [lcfirst(class_basename($model)) => $model]) }}"
      method="post"
      enctype="multipart/form-data">
    @csrf
    @method('put')
    {{ $slot }}
</form>



