<div class="modal fade" id="addSubBlock" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{ route('admin.blocks.store') }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">Add Blocks</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group w-50">
                    <input type="text" name="page_id" value="{{ $pageId }}" hidden>
                    <input type="text" name="block_id" id="blockId" hidden>
                    <input type="text" name="template_id" id="templateId" hidden>
                    <label for="">Blocks Number</label>
                    <input class="form-control" type="number" name="blocksNumber">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </form>
    </div>
</div>
