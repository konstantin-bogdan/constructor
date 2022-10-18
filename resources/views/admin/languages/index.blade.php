@extends('admin.layout')

@section('content')
    <x-title>Languages</x-title>
    <x-tables.sortable
        :models="$languages"
        :labels="['Title', 'Slug']"
        :fields="['title', 'slug']"
        :show="1"
    />
    <x-buttons.add-route table="languages">Add Language</x-buttons.add-route>
    <x-buttons.save-order />

@endsection


