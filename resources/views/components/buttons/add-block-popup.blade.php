<botton class="btn btn-app bg-success m-0" type="button"
        data-toggle="modal" data-target="#addSubBlock"
        onclick="copyBlockTemplateId('{{ $blockId }}', '{{ $templateId }}')">
    <i class="fas fa-plus"></i> Add Block
</botton>

<script>
    function copyBlockTemplateId(block, template) {
        document.querySelector('#blockId').value = block
        document.querySelector('#templateId').value = template
    }
</script>
