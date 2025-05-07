@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 p-4">
  <img src="/logo.png" alt="Your Logo" class="w-32 mb-6">
  <h1 class="text-3xl font-bold mb-4">Welcome to Bella’s Check‑In</h1>
  <p class="mb-6 text-gray-700">Please click below to begin checking in your device.</p>
  <a href="{{ route('checkin.start') }}"
     class="px-8 py-4 bg-blue-600 text-white rounded-xl shadow hover:bg-blue-700 transition">
    Start Check‑In
  </a>
</div>
@endsection
