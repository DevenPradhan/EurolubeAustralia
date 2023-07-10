<x-modal name="add-category" :show="$errors->categoryAddition->isNotEmpty()" focusable>
    <form method="post" action="{{ route('category.add') }}" class="p-6">
        @csrf

        <h3>Add a product Category</h3>

        <div class="mt-6">
            <x-input-label for="category" value="{{ __('Category') }}" />
            <x-input-error :messages="$errors->get('test[]')" class="mt-2" />
            {{-- add multiple rows of input fields for category --}}
            @foreach ($newCategories as $id => $newCategory)
                <div class="inline-flex w-full space-x-3 mt-2">
                    <div class="w-full">
                        <x-text-input name="newCategories[{{ $id }}][name]"
                            wire:model.debounce.500ms="newCategories.{{ $id }}.name" type="text"
                            class="mt-1 block w-3/4" placeholder="{{ __('Category') }}" required />
                        <x-input-error :messages="$errors->get('newCategories.' . $id . '.name')" class="mt-2" />
                    </div>
                    <div class="w-1/6 self-end justify-self-center py-2">
                        <x-danger-button id="add" type="button"
                            wire:click.prevent="removeCategory({{ $id }})"
                            class="rounded-sm py-1 px-2 {{ count($newCategories) > 1 ? 'block' : 'hidden' }}">
                            Delete
                        </x-danger-button>
                    </div>
                </div>
                <div class="mt-6 {{ count($newCategories) > 1 ? 'hidden' : 'block' }}">
                    <x-input-label for="description" value="{{ __('Description') }}" />
                    <x-textbox name="newCategories[{{ $id }}][description]" class="mt-1 block w-3/4 ">
                        {{ old('newCategories[ $id ][description]') }}
                    </x-textbox>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
            @endforeach
        </div>


        <div class="mt-6">
            <x-primary-button wire:click.prevent="addCategory" class="" type="button">Add More
            </x-primary-button>
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')" wire:click.prevent="cancelModal">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3 hover:bg-red-700">
                {{ __('Save') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
