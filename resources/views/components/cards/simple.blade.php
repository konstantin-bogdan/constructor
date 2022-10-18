<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
        <div class="card-tools">
            @if(isset($model))
            <button type="button" class="btn btn-tool"
                    data-toggle="modal" data-target="#deleteAdminPopup"
                    onclick="copyModelAndId('{{ class_basename($model) }}','{{ $model->id }}')"
            ><i class="fas fa-times"></i>
            </button>
            @endif
        </div>
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
