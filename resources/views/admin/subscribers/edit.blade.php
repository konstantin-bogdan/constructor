@extends('admin.layout')

@section('content')
    <x-title>Edit Subscriber</x-title>
    <x-forms.put :model="$subscriber">
        <div class="col-md-12">
            <x-cards.simple title="Edit Subscriber">
                <div class="col-md-6">
                    <x-inputs.input
                        label="Name"
                        name="name"
                        :value="$subscriber->name"
                        req="1"
                    />
                    <x-inputs.input
                        label="Email"
                        name="email"
                        :value="$subscriber->email"
                        req="1"
                    />
                    <x-inputs.textarea
                        label="Message"
                        name="message"
                        :value="$subscriber->message"
                        req="1"
                    />
                    <x-inputs.textarea
                        label="Comment"
                        name="comment"
                        :value="$subscriber->comment"
                    />
                    <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="new" @selected($subscriber->status=="new")>New</option>
                        <option value="in process" @selected($subscriber->status=="in process")>In Process</option>
                        <option value="completed" @selected($subscriber->status=="completed")>Completed</option>
                    </select>
                    </div>
                </div>

                <x-buttons.save-submit>Save</x-buttons.save-submit>
                <x-buttons.delete-popup/>
            </x-cards.simple>
        </div>
    </x-forms.put>

    <x-popups.delete-model :model="$subscriber"/>
@endsection


