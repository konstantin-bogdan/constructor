<div class="modal fade" id="deleteAdminPopup" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{ route('admin.delete') }}" class="modal-content">
            @csrf
            @method('delete')
            <div class="modal-header">
                <h4 class="modal-title">Delete </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" name="model" id="modelForDelete" hidden>
                <input type="text" name="id" id="idForDelete" hidden>
                <p>Delete </p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
    </div>
</div>
