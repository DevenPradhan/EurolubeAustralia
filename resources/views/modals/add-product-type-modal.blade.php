<x-modal name="add-type" :show="$errors->typeAddition->isNotEmpty()" focusable>
    <div class="p-6">
        <h3>Add a product Type</h3>
        <div class="mt-6">
            <x-input-label for="type" value="{{ __('Type') }}" class="" />

            <x-text-input name="type" type="text" class="mt-1 block w-3/4" placeholder="{{ __('Enter Type here') }}"
                required value="{{ old('type') }}" />
            <x-input-error :messages="$errors->typeAddition->get('type')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="description" value="{{ __('Description') }}" class="sr-only" />
            <x-textbox name="description" value="{{ old('description') }}" class="text-gray-500"></x-textbox>
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>
            <x-danger-button class="ml-3 hover:bg-red-700">
                {{ __('Save') }}
            </x-danger-button>
        </div>
    </div>
</x-modal>
