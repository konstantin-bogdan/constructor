@extends('admin.layout')

@section('content')
    <x-title>Create Menu</x-title>
    <div class="row">
        @foreach($templates as $template)
            <div class="col-md-4 template" onclick="document.querySelector('#am{{ $template->id }}').submit()">
                <x-cards.simple title="{{ $template->title }}">
                    <img  class="w-100" src="{{ $template->cover }}" alt="cover">
                    <x-forms.post route="admin.menus.store" id="am{{ $template->id }}">
                        <input type="text" name="type" value="header"hidden>
                        <input type="text" name="template_id" value="{{ $template->id }}"hidden>
                    </x-forms.post>
                </x-cards.simple>
            </div>
        @endforeach
    </div>
@endsection
<style>
    .template {
        cursor: pointer;
    }

    .template:hover  {
        transform: scale(1.02);
    }


</style>

