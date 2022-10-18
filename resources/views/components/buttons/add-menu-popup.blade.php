<botton class="btn btn-app bg-success m-0" type="button"
        data-toggle="modal" data-target="#addSubMenu"
        onclick="copyBlockTemplateId('{{ $blockId }}')">
    <i class="fas fa-plus"></i> Add Menu
</botton>

<script>
    function copyBlockTemplateId(block) {
        document.querySelector('#subMenuId').value = block
    }
</script>
