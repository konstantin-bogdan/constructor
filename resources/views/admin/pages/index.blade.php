@extends('admin.layout')

@section('content')
    <x-title>Pages</x-title>
    <x-tables.simple
        :models="$pages"
        :labels="['Name', 'Path']"
        :fields="['name', 'path']"
        :show="1"
    />

    <x-buttons.add-route table="pages">Create Page</x-buttons.add-route>
@endsection

