<x-modal name="details-modal" :show="$errors->detailsModal->isNotEmpty()" focusable maxWidth="3xl">
    <div class="p-10 space-y-4">
        <form wire:submit.prevent="editDetails">
        <h4 class="font-semibold">Edit</h4>
        <hr>
        <div class="grid grid-flow-cols md:grid-cols-2 gap-4">
            <div class="mt-6 inline-flex space-x-4 items-center">
                <x-input-label value="Available Quantity" for="quantity" />
                <x-text-input name="quantity" wire:model="quantity" type="number" />
                    <x-input-error :messages="$errors->detailsModal->get('newProducts[{{ $id }}][name]')" class="mt-2" />

            </div>
            <div class="mt-6 inline-flex space-x-4 items-center">
                <x-input-label value="Part No" for="part_no" />
                <x-text-input name="part_no" wire:model="part_no" type="text" />
            </div>
            <div class="mt-6 inline-flex space-x-4 items-center">
                <x-input-label value="Dimensions" for="dimensions" />
                <x-text-input name="dimensions" wire:model="dimensions"
                    type="text" />
            </div>
            <div class="mt-6 inline-flex space-x-4 items-center">
                <x-input-label value="Weight" for="weight" />
                <x-text-input name="weight" wire:model="weight" type="text" />
            </div>
            <div class="mt-6 inline-flex space-x-4 items-center">
                <x-input-label value="Manual" for="manual" />
                <x-text-input name="manual" wire:model="{{ $product->details->manual ?? old('manual') }}" type="text" />
            </div>
        </div>


        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3 hover:bg-red-700">
                {{ __('Save') }}
            </x-danger-button>
        </div>
        <hr>
    </div>
</x-modal>
