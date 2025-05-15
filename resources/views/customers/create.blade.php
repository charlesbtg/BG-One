<!-- resources/views/customers/create.blade.php -->
@extends('layouts.app')

@section('content')
    <livewire:new-customer />

    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-2xl mb-4">Welcome to Bella</h1>

        <!-- Your new assistant component: -->
        <livewire:customer-assistant />
    </div>
@endsection
