{{-- resources/views/checkin.blade.php --}}
@extends('layouts.app')

@section('content')
  <div class="max-w-md mx-auto my-8 p-6 bg-white shadow rounded-lg">
    <!-- Puppertino-style heading (h1, h2 auto-styled under p-layout) -->
     <h1>Device Check-In</h1>

    {{-- Step 1: lookup via email/phone --}}
    <form wire:submit.prevent="lookupCustomer">
      {{-- Puppertino select wrapper --}}
      <div class="p-form-select mb-4">
        <select wire:model.defer="method">
            <option value="email">Email</option>
            <option value="phone">Phone</option>
          </select>
        </div>
      <livewire:checkin-wizard />
    </div>

    {{-- Puppertino text input --}}
    <label class="p-form-label">
      @if($method == 'email')
        Email:
        <input
          type="email"
          wire:model.defer="email"
          placeholder="Enter your email address"
          class="p-form-text"
          >
      @else
        Phone:
        <input
          type="text"
          wire:model.defer="phone"
          placeholder="Enter your phone number"
          class="p-form-text"
          >
      @endif
    </label>

    {{-- Puppertino button --}}
    <button
      type="submit"
      class="p-btn p-prim-col p-white-color mt-6"
      >
        Next
    </button>
  </form>
</div>
@endsection
