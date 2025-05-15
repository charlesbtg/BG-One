<div class="space-y-6 bg-white rounded shadow p-6">

    {{-- success message --}}
    @if (session()->has('message'))
        <div class="p-4 bg-green-100 text-green-800 rounded">
            {{ session('message') }}
        </div>
    @endif

    {{-- Issue Type --}}
    <div>
        <label class="block font-medium">* Issue Type</label>
        <select wire:model.defer="issueType" class="w-full border rounded p-2">
            <option value="">Select…</option>
            @foreach($issueTypes as $t)
                <option value="{{ $t }}">{{ $t }}</option>
            @endforeach
        </select>
        @error('issueType') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Description --}}
    <div>
        <label class="block font-medium">* Description</label>
        <textarea wire:model.defer="description" rows="4" class="w-full border rounded p-2"></textarea>
        @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Related Assets --}}
    <div>
        <h3 class="font-medium mb-2">Related Assets</h3>
        @foreach($assets as $idx => $asset)
            <div class="grid grid-cols-3 gap-4 items-end mb-4">
                <div>
                    <label class="block font-medium">* Asset Type</label>
                    <select wire:model.defer="assets.{{ $idx }}.type" class="w-full border rounded p-2">
                        <option value="">Select…</option>
                        @foreach($assetTypes as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                    @error("assets.{$idx}.type") <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block font-medium">* Asset Name</label>
                    <input type="text" wire:model.defer="assets.{{ $idx }}.name"
                           class="w-full border rounded p-2">
                    @error("assets.{$idx}.name") <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block font-medium">* Asset Serial</label>
                    <input type="text" wire:model.defer="assets.{{ $idx }}.serial"
                           class="w-full border rounded p-2">
                    @error("assets.{$idx}.serial") <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
                <div class="col-span-3 text-right">
                    <button wire:click.prevent="removeAsset({{ $idx }})"
                            class="text-red-600 hover:underline text-sm">
                        Remove
                    </button>
                </div>
            </div>
        @endforeach

        <button wire:click.prevent="addAsset"
                class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            + Add Asset
        </button>
    </div>

    {{-- Worksheet --}}
    <div>
        <label class="block font-medium">* Ticket Worksheet</label>
        <select wire:model.defer="selectedWorksheet" class="w-full border rounded p-2">
            <option value="">Select…</option>
            @foreach($worksheets as $ws)
                <option value="{{ $ws }}">{{ $ws }}</option>
            @endforeach
        </select>
        @error('selectedWorksheet') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Submit --}}
    <div class="text-right">
        <button wire:click="submit"
                class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            Create Ticket
        </button>
    </div>
</div>
