@extends('admin.layout')

@section('content')
    <x-title>Backups</x-title>
    <x-tables.simple
        :models="$backups"
        :labels="['Title', 'Description', 'Created At', 'From File']"
        :fields="['title', 'description', 'created_at', 'from_file']"
    />
    <x-buttons.add-route table="backups">Create Backup</x-buttons.add-route>
    <a type="button" href="{{ route('admin.backups.createFromFile') }}" class="btn btn-app bg-primary m-0">
        <i class="fas fa-file"></i> Create From File
    </a>

@endsection
