<div class="modal fade" id="deleteModelPopup" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete {{ class_basename($model) }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Delete {{ class_basename($model) }}</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger"
                    onclick="document.querySelector('#delete{{ class_basename($model) }}').submit()"
                >Delete</button>
            </div>
        </div>
    </div>
</div>

<x-forms.delete-model :model="$model" />
