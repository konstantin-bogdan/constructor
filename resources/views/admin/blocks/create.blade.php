@extends('admin.layout')

@section('content')
    <x-title>Add Block</x-title>
    <div class="row">
        @foreach($templates as $template)
            <div class="col-md-4 template" onclick="document.querySelector('#cb{{ $template->id }}').submit()">
          <x-cards.simple title="{{ $template->title }}">
                <img  class="w-100" src="{{ $template->cover }}" alt="cover">
                <x-forms.post route="admin.blocks.store" id="cb{{ $template->id }}">
                    <input type="text" name="page_id" value="{{ $pageId }}"hidden>
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

