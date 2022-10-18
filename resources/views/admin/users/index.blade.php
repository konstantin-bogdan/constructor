@extends('admin.layout')

@section('content')
    <x-title>Admins</x-title>
    <x-tables.simple
        :models="$users"
        :labels="['Name', 'Email']"
        :fields="['name', 'email']"
    />

    <x-buttons.add-route table="users">Create Admin</x-buttons.add-route>
@endsection

