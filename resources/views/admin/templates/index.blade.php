@extends('admin.layout')

@section('content')
    <x-title>Templates</x-title>
    <x-tables.sortable
        :models="$templates"
        :labels="['Title']"
        :fields="['title']"
        image="cover"
        :show="1"
    />

    <x-buttons.add-route table="templates" :query="'type='.$type">Create Template</x-buttons.add-route>
    <x-buttons.save-order />
@endsection

