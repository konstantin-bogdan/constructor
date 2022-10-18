@extends('admin.layout')

@section('content')
    <x-title>Edit Admin</x-title>
    <x-forms.put :model="$user">
        <div class="col-md-12">
            <x-cards.simple title="Edit Admin">
                <div class="col-md-6">
                    <x-inputs.input
                        label="Name"
                        name="name"
                        :value="$user->name"
                        req="1"
                    />
                    <x-inputs.input
                        label="Email"
                        name="email"
                        :value="$user->email"
                        req="1"
                    />
                    <div class="form-group">
                        <label for="">Roles</label>
                        @foreach($roles as $role)
                            <x-inputs.checkbox-role name="roles[]"
                                                    :id="$role->id"
                                                    :disabled="$user->is_admin"
                                                    :checked="$user->roles->contains($role)"
                                                    :label="$role->title"/>
                        @endforeach
                    </div>

                </div>

                <x-buttons.save-submit>Save</x-buttons.save-submit>
                @if(!$user->is_admin)
                    <x-buttons.delete-popup/>
                @endif
            </x-cards.simple>
        </div>
    </x-forms.put>
    @if(!$user->is_admin)
        <x-popups.delete-model :model="$user"/>
    @endif

@endsection


