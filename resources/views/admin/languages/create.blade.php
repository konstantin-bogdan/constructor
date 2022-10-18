@extends('admin.layout')

@section('content')
    <x-title>Add Language</x-title>
    <x-forms.post route="admin.languages.store">
        <div class="col-md-6">
            <x-cards.simple title="Add Language">
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
                <x-buttons.save-submit>Save</x-buttons.save-submit>
            </x-cards.simple>
        </div>
    </x-forms.post>


@endsection


