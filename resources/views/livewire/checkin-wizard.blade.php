<div class="p-layout">
  <h1 class="mb-4">Device Check-In</h1>

  <form wire:submit.prevent="lookupCustomer">
    <div class="p-form-select mb-4">
      <select wire:model.defer="method">
        <option value="email">Email</option>
        <option value="phone">Phone</option>
      </select>
    </div>

    <label class="p-form-label block mb-2">
      @if($method === 'email')
        Email:
        <input
          type="email"
          wire:model.defer="email"
          placeholder="you@example.com"
          class="p-form-text w-full"
        />
      @else
        Phone:
        <input
          type="text"
          wire:model.defer="phone"
          placeholder="555-1234"
          class="p-form-text w-full"
        />
      @endif
    </label>

    <button type="submit" class="p-btn p-prim-col p-white-color mt-4">
      Next
    </button>
  </form>
</div>
