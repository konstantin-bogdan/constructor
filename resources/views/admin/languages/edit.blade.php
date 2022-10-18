@extends('admin.layout')

@section('content')
    <x-title>Edit Language</x-title>
    <x-forms.put :model="$language">
        <div class="col-md-12">
            <x-cards.simple title="Edit Language">
                <x-inputs.input
                    label="Title"
                    name="title"
                    :value="$language->title"
                    req="1"
                />
                <x-inputs.input
                    label="Slug"
                    name="slug"
                    :value="$language->slug"
                    req="1"
                />
                <x-buttons.save-submit>Save</x-buttons.save-submit>
                <x-buttons.delete-popup/>
            </x-cards.simple>
        </div>
    </x-forms.put>
    <x-popups.delete-model :model="$language"/>

@endsection



