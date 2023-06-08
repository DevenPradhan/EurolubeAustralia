<x-modal name="add-images" :show="$errors->imageUpload->isNotEmpty()" focusable>
    <div class="p-6">
        <h3>Add Image(s)</h3>
        <div class="mt-6">
            <x-input-label for="name" value="{{ __('Select images(PNG/JPG)') }}" class="" />

            <x-text-input name="images[]" type="file" class="mt-1 block w-3/4"
                placeholder="{{ __('Upload Multiple Files') }}" required multiple />
            <x-input-error :messages="$errors->imageUpload->get('images')" class="mt-2" />
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
