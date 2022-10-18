@extends('admin.layout')

@section('content')
    <x-title>Create Backup From File</x-title>
    <x-forms.post route="admin.backups.storeFromFile">
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
                <div class="form-group">
                    <label for="">Backup File</label>
                    <input  class="form-control" type="file" name="backup" required>
                </div>
                <x-buttons.save-submit>Save</x-buttons.save-submit>
            </x-cards.simple>
        </div>
    </x-forms.post>


@endsection


