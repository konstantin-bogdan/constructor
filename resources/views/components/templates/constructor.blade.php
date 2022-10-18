<x-cards.simple title="{{ $title }}">
    <div class="row">
        <div class="col-md-3">
            <button type="button" onclick="addField('input', '{{ $key }}')"
                    class=" btn btn-info d-block my-1 w-100">Input
            </button>
            <button type="button" onclick="addField('image', '{{ $key }}')"
                    class=" btn btn-info d-block my-1  w-100">Imege
            </button>
            <button type="button" onclick="addField('textarea', '{{ $key }}')"
                    class=" btn btn-info d-block my-1  w-100">Textarea
            </button>
            <button type="button" onclick="addField('textarea', '{{ $key }}')"
                    class=" btn btn-info d-block my-1  w-100">Textarea
            </button>
            <button type="button" onclick="addField('color', '{{ $key }}')"
                    class=" btn btn-info d-block my-1  w-100">Color
            </button>
            <button type="button" onclick="addField('number', '{{ $key }}')"
                    class=" btn btn-info d-block my-1  w-100">Number
            </button>
            <button type="button" onclick="addField('checkbox', '{{ $key }}')"
                    class=" btn btn-info d-block my-1  w-100">Checkbox
            </button>
        </div>
        <div id="fields{{ $key }}" class="col-md-9" style="border: 1px grey solid;
                                  padding: 7px; border-radius: 5px;">
            @if(isset($fields))
                @foreach($fields as $field)
                    <div class="card card-dark" id="{{ $key.$loop->index }}">
                        <div class="card-header">
                            <h3 class="card-title">{{ ucfirst($field->type) }}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool"
                                        data-card-widget="remove"
                                        onclick="removeField('{{ $key.$loop->index }}')"
                                ><i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <input type="text" name="{{ $key }}[{{ $loop->index }}][type]"
                                   value="{{ $field->type }}" hidden>
                            <div class="form-group">
                                <label for="">Label</label>
                                <input type="text" name="{{ $key }}[{{ $loop->index }}][label]"
                                       class="form-control" value="{{ $field->label }}">
                            </div>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="{{ $key }}[{{ $loop->index }}][name]"
                                       class="form-control" value="{{ $field->name}}">
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</x-cards.simple>
