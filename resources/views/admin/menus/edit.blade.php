@extends('admin.layout')

@section('content')
    <x-title>Edit Menu</x-title>
    <x-forms.put :model="$menu">
        <div class="col-md-12">
            <x-cards.simple title="Edit Menu">
                <div class="col-md-6">
                    <x-inputs.input
                        label="Name"
                        name="name"
                        :value="$menu->name"
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
                                    <x-cards.simple title="Menu">
                                             <x-menus.list :menu="$menu" :lang="$lang->id"/>
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

    <x-popups.delete-model :model="$menu"/>
    <x-popups.add-menu :menuId="$menu->id" :templateId="$menu->template->id" />
    <x-popups.delete-admin />
@endsection

<script>
    function copyModelAndId(model, id) {
        document.querySelector('#modelForDelete').value = model
        document.querySelector('#idForDelete').value = id
        //alert(model)
    }
</script>


