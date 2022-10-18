@extends('admin.layout')

@section('content')
    <x-title>Create Backup</x-title>
    <x-forms.post route="admin.backups.store">
        <div class="col-md-6">
            <x-cards.simple title="Create Backup">
                <x-inputs.input
                    label="Title"
                    name="title"
                    req="1"
                />
                <x-inputs.input
                    label="Description"
                    name="description"
                    req="1"
                />
                <x-buttons.save-submit>Save</x-buttons.save-submit>
            </x-cards.simple>
        </div>
    </x-forms.post>
@endsection
