<!-- resources/views/livewire/new-customer.blade.php -->
<div class="max-w-md mx-auto p-6 bg-white rounded-2xl shadow">
    @if (session()->has('message'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
            {{ session('message') }}
        </div>
    @elseif (session()->has('error'))
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-4">
        <div>
            <label class="block">First Name</label>
            <input wire:model.defer="first_name" type="text" class="w-full border rounded p-2">
            @error('first_name') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Last Name</label>
            <input wire:model.defer="last_name" type="text" class="w-full border rounded p-2">
            @error('last_name') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Business Name (Optional)</label>
            <input wire:model.defer="business_name" type="text" class="w-full border rounded p-2">
            @error('business_name') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Phone Number</label>
            <input wire:model.defer="phone" type="tel" class="w-full border rounded p-2">
            @error('phone') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Email</label>
            <input wire:model.defer="email" type="email" class="w-full border rounded p-2">
            @error('email') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Physical/Mailing Address</label>
            <textarea wire:model.defer="address" class="w-full border rounded p-2"></textarea>
            @error('address') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>How did you hear about us?</label>
            <input wire:model.defer="referred_by" type="text" class="w-full border rounded p-2">
            @error('referred_by') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full py-2 rounded-2xl shadow hover:opacity-90 bg-blue-600 text-white">
            Create Ticket
        </button>
    </form>
</div>
