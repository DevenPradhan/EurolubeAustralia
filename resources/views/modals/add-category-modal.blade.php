<x-modal name="add-category" :show="$errors->categoryAddition->isNotEmpty()" focusable >
    <form method="post" action="{{ route('category.add') }}" class="p-6">
        @csrf

        <h3>Add a product Category</h3>
        <div class="mt-6">
            <x-input-label for="category" value="{{ __('Category') }}" />

            <x-text-input name="category" type="text" class="mt-1 block w-3/4" placeholder="{{ __('Category') }}"
                required />
            <x-input-error :messages="$errors->categoryAddition->get('category')" class="mt-2" />
        </div>
        <div class="mt-6">
            <x-input-label for="description" value="{{__('Description')}}"/>
            <x-textbox name="description" class="mt-1 block w-3/4">{{old('description')}}</x-textbox>
            <x-input-error :messages="$errors->categoryAddition->get('description')" class="mt-2"/>
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3 hover:bg-red-700">
                {{ __('Save') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>