@dd($method ?? 'method-undefined')
<div class="max-w-md mx-auto my-8 p-6 bg-white shadow-lg rounded-lg">
  <h1 class="text-2xl mb-4">Device Check-In</h1>

  <form wire:submit.prevent="lookupCustomer">
    <div class="p-form-select mb-4">
      <select wire:model="method">
        <option value="email">Email</option>
        <option value="phone">Phone</option>
      </select>
    </div>

    <label class="p-form-label block mb-4">
      @if($method === 'email')
        Email:
        <input
          type="email"
          wire:model.defer="email"
          placeholder="you@example.com"
          class="p-form-text mt-1"
        >
      @else
        Phone:
        <input
          type="text"
          wire:model.defer="phone"
          placeholder="555-1234"
          class="p-form-text mt-1"
        >
      @endif
    </label>

    <button type="submit" class="p-btn p-prim-col p-white-color mt-6">
      Next
    </button>
  </form>
</div>
