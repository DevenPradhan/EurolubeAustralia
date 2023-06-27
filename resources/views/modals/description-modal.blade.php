<x-modal name="description-modal" :show="$errors->descriptionModal->isNotEmpty()" focusable>
    <div class="p-6 space-y-6">
        <h4 class="font-semibold">Add/Edit</h4>
        <hr>

        <div class="mt-6 space-y-3">
            <x-input-label for="type" value="{{ __('Description') }}" class="" />
            
            <x-textbox name="description" value="{{ old('description') }}" id="description" rows="10" required/>
            <x-input-error :messages="$errors->descriptionModal->get('type')" class="mt-2 errors" />
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
