@extends('admin.layout')

@section('content')
    <x-title>Subscribers</x-title>
    <x-tables.simple
        :models="$subscribers"
        :labels="['Name', 'Email', 'Date']"
        :fields="['name', 'email', 'created_at']"
        :status="1"
    />
@endsection

