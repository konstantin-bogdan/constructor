@extends('admin.layout')

@section('content')
    <x-title>Edit Template</x-title>
    <x-forms.put :model="$template">
        <div class="col-md-6">
            <x-cards.simple title="Edit Template">
                <x-inputs.input
                    label="Type"
                    name="type"
                    :value="$template->type"
                    req="1"
                />
                <x-inputs.input
                    label="Title"
                    name="title"
                    :value="$template->title"
                    req="1"
                />
                <x-inputs.input
                    label="Slug"
                    name="slug"
                    :value="$template->slug"
                    req="1"
                />
                <x-inputs.image-simple
                    label="Cover"
                    name="cover"
                    :value="$template->cover"
                />

                <x-templates.constructor
                    title="First Level Inputs"
                    :fields="$template->first_fields"
                    key="first_fields"
                />
                <x-templates.constructor
                    title="Second Level Inputs"
                    :fields="$template->second_fields"
                    key="second_fields"
                />
                <x-templates.constructor
                    title="Third Level Inputs"
                    :fields="$template->third_fields"
                    key="third_fields"
                />


                <x-buttons.save-submit>Save</x-buttons.save-submit>
                <x-buttons.delete-popup/>
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

    </x-forms.put>
    <x-popups.delete-model :model="$template"/>
{{--    <x-forms.delete-model :model="$template"/>--}}
@endsection

