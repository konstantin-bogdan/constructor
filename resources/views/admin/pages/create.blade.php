@extends('admin.layout')

@section('content')
    <x-title>Create Page</x-title>
    <x-forms.post route="admin.pages.store">
        <div class="col-md-6">
            <x-cards.simple title="Create Page">
                <x-inputs.input
                    label="Name"
                    name="name"
                    req="1"
                />
                <x-inputs.input
                    label="Path"
                    name="path"
                    req="1"
                />
                <x-buttons.save-submit>Save</x-buttons.save-submit>
            </x-cards.simple>
        </div>
    </x-forms.post>


@endsection


