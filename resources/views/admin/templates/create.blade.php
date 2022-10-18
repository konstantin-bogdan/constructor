@extends('admin.layout')

@section('content')
    <x-title>Create Template</x-title>
    <x-forms.post route="admin.templates.store">
        <div class="col-md-6">
            <x-cards.simple title="Create Template">
                <input type="text" name="type" value="{{ $type }}" hidden>
                <x-inputs.input
                    label="Title"
                    name="title"
                    req="1"
                />
                <x-inputs.input
                    label="Slug"
                    name="slug"
                    req="1"
                />
                <x-inputs.image-simple
                    label="Cover"
                    name="cover"
                    req="1"
                />

                <x-templates.constructor
                    title="First Level Inputs"
                    key="first_fields"
                />
                <x-templates.constructor
                    title="Second Level Inputs"
                    key="second_fields"
                />
                <x-templates.constructor
                    title="Third Level Inputs"
                    key="third_fields"
                />


                <x-buttons.save-submit>Save</x-buttons.save-submit>
            </x-cards.simple>
        </div>
        <script>
            function addField(type, key) {
                let field = document.createElement('div')
                let index = rand();
                field.id = 'field' + index
                let title = type.charAt(0).toUpperCase() + type.slice(1)
                field.className = 'card card-dark'
                field.innerHTML = `
                                <div class="card-header">
                                    <h3 class="card-title">` + title + `</h3>
                                     <div class="card-tools">
                                     <button type="button" class="btn btn-tool"
                                            data-card-widget="remove"
                                            onclick="removeField('field` + index + `')"
                                            ><i class="fas fa-times"></i>
                                    </button>
                                     </div>
                                </div>
                                <div class="card-body">
                                <input type="text" name="` + key + `[` + index + `][type]"
                                        value="` + type + `" hidden>
                                    <div class="form-group">
                                        <label for="">Label</label>
                                        <input type="text" name="` + key + `[` + index + `][label]" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="` + key + `[` + index + `][name]" class="form-control">
                                    </div>
                                </div>
                            `
                let wrapper = document.querySelector('#fields' + key)
                wrapper.append(field)
            }

            function removeField(id) {
                setTimeout(function () {
                    document.querySelector('#' + id).remove()
                }, 1000);
            }

            function rand() {
                return Math.floor(Math.random() * (100 - 999) + 999)
            }
        </script>

    </x-forms.post>
@endsection

