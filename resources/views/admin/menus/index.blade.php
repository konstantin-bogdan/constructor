@extends('admin.layout')

@section('content')
    <x-title>Menu</x-title>
    <x-tables.sortable
        :models="$menus"
        :labels="['Name', 'Type']"
        :fields="['name', 'type']"
        :show="1"
    />

    <x-buttons.add-route table="menus">Create Menu</x-buttons.add-route>
    <x-buttons.save-order />
@endsection

