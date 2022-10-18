@extends('admin.layout')

@section('content')
    <x-title>Edit Backup</x-title>
    <x-forms.put :model="$backup">
        <div class="col-md-12">
            <x-cards.simple title="Edit Backup">
                <x-inputs.input
                    label="Title"
                    name="title"
                    :value="$backup->title"
                    req="1"
                />
                <x-inputs.input
                    label="Description"
                    name="description"
                    :value="$backup->description"
                    req="1"
                />
                <x-buttons.save-submit>Save</x-buttons.save-submit>
                <x-buttons.delete-popup />
                <x-buttons.restore />
                <x-buttons.download />


            </x-cards.simple>
        </div>
    </x-forms.put>
    <form id="restoreBackup"
          action="{{ route('admin.backups.restore') }}"
          method="post">
        @csrf
        <input type="text" name="id" value="{{ $backup->id }}" hidden>
    </form>
    <form id="downloadForm"
          action="{{ route('admin.backups.download') }}"
          method="post">
        @csrf
        <input type="text" name="id" value="{{ $backup->id }}" hidden>
    </form>
    <x-popups.delete-model :model="$backup" />
@endsection



