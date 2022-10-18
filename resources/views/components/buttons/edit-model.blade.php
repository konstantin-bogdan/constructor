<a class="btn btn-app bg-success m-0"
   href="{{ route('admin.'.str(lcfirst(class_basename($model)))->plural().'.edit', [lcfirst(class_basename($model)) => $model]) }}">
    <i class="fas fa-pen"></i> Edit
</a>

