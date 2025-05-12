{{-- resources/views/checkin.blade.php --}}
@extends('layouts.app')

@section('content')
  <div class="max-w-md mx-auto my-8 p-6 bg-white shadow-lg rounded-lg p-layout">
    {{-- Only render the Livewire component here: --}}
    <livewire:checkin-wizard />
  </div>
@endsection
