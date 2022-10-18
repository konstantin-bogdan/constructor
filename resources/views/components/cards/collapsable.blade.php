<div class="card card-dark shadow-sm collapsed-card">
    <div class="card-header p-1">
        <h3 class="card-title m-2">{{ $title }}</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool"
                data-toggle="modal" data-target="#deleteAdminPopup"
                onclick="copyModelAndId('{{ class_basename($model) }}','{{ $model->id }}')"
            ><i class="fas fa-times"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: none;">
        {{ $slot }}
    </div>
</div>
