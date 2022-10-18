@extends('admin.layout')

@section('content')
    <x-title>Create Admin</x-title>
    <x-forms.post route="admin.users.store">
        <div class="col-md-12">
            <x-cards.simple title="Create Admin">
                <div class="col-md-6">
                    <x-inputs.input
                        label="Name"
                        name="name"
                        req="1"
                    />
                    <x-inputs.input
                        label="Email"
                        name="email"
                        req="1"
                    />
                    <x-inputs.input
                        label="Password"
                        name="password"
                        req="1"
                    />
                    <div class="form-group">
                        <label for="">Roles</label>
                        @foreach($roles as $role)
                            <x-inputs.checkbox-role name="roles[]"
                                                    :id="$role->id"
                                                    :label="$role->title"/>
                        @endforeach
                    </div>

                </div>

                <x-buttons.save-submit>Save</x-buttons.save-submit>
            </x-cards.simple>
        </div>
    </x-forms.post>
@endsection


