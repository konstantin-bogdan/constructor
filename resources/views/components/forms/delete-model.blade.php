<form id="delete{{ class_basename($model) }}"
    action="{{ route('admin.'.str(lcfirst(class_basename($model)))->plural().'.destroy',
                [lcfirst(class_basename($model)) => $model]) }}"
      method="post">
    @csrf
    @method('delete')

</form>
