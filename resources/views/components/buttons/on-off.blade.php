<div class="form-group m-0">
    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
        <input type="checkbox" class="custom-control-input" id="on-off{{ $model->id }}"
         onchange = changeModelStatus('{{ class_basename($model) }}','{{ $model->id  }}')
        @checked($model->show)>
        <label class="custom-control-label" for="on-off{{ $model->id }}"></label>
    </div>
</div>

<script>
function changeModelStatus(model, id) {
   let request = new Request('{{ route('admin.on-off') }}', {
       method: 'POST',
       body: JSON.stringify({
           id: id,
           model: model
       }),
       headers: {
           "Content-Type" : "application/json",
           "X-CSRF-Token" : "{{ csrf_token() }}"
       }
   })
    fetch(request)
    .then()
    .then(data => {
        console.log(data)
    })
    .catch(error => {
        console.log(error)
    })
}
</script>
