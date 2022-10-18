@extends('admin.layout')

@section('content')
    <x-title>Edit Page</x-title>
    <x-forms.put :model="$page">
        <div class="col-md-12">
            <x-cards.simple title="Edit Page">
                <div class="col-md-6">
                    <x-inputs.input
                        label="Name"
                        name="name"
                        :value="$page->name"
                        req="1"
                    />
                    <x-inputs.input
                        label="Path"
                        name="path"
                        :value="$page->path"
                        req="1"
                    />
                </div>

                <div class="card card-dark card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            @foreach($languages as $lang)
                                <li class="nav-item">
                                    <a class="nav-link @if($loop->index==0) active @endif" id="custom-tabs-one-home-tab"
                                       data-toggle="pill" href="#{{ $lang->slug }}"
                                       role="tab" aria-controls="custom-tabs-one-home"
                                       aria-selected="false">{{ $lang->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            @foreach($languages as $lang)
                                <div class="tab-pane fade @if($loop->index==0) active show @endif" id="{{ $lang->slug }}" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <x-cards.simple title="Blocks">
                                        <x-title-h2>Blocks</x-title-h2>
                                        <x-blocks.list :blocks="$page->blocks" :lang="$lang->id"/>
                                        <x-buttons.add-route table="blocks" query="page={{ $page->id }}">Add Blocks
                                        </x-buttons.add-route>
                                    </x-cards.simple>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <x-buttons.save-submit>Save</x-buttons.save-submit>
                <x-buttons.delete-popup/>
            </x-cards.simple>
        </div>
    </x-forms.put>

    <x-popups.delete-model :model="$page"/>
    <x-popups.add-block :pageId="$page->id"/>
    <x-popups.delete-admin />
@endsection

<script>
function copyModelAndId(model, id) {
    document.querySelector('#modelForDelete').value = model
    document.querySelector('#idForDelete').value = id
    //alert(model)
}
</script>


