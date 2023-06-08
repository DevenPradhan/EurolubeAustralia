<x-modal name="add-type" :show="$errors->typeAddition->isNotEmpty()" focusable>
    <form method="post" action="{{ route('type.add') }}" class="p-6">
        @csrf

        <h3>Add a product Type</h3>
        <div class="mt-6">
            <x-input-label for="type" value="{{ __('Type') }}" class="" />

            <x-text-input name="type" type="text" class="mt-1 block w-3/4" placeholder="{{ __('Enter Type here') }}"
                required />
            <x-input-error :messages="$errors->typeAddition->get('type')" class="mt-2" />
        </div>

        {{-- if the modal is in category details page, hide the below field --}}

        @if (!Request::routeIs('category.details'))
            <div class="mt-4">
                <x-input-label for="category" value="{{ __('Category') }}" class="" />

                <x-select class="mt-1 block w-3/4" placeholder="Select a Category" name="category" required>
                    <option value=""></option>
                    @foreach ($categories as $key => $category)
                        <option value="{{ $key }}">{{ $category }}</option>
                    @endforeach
                </x-select>
                <x-input-error :messages="$errors->typeAddition->get('category')" class="mt-2" />
            </div>
        @else
            <div class="mt-4 inline-flex space-x-4">
                <x-input-label value="Category" />
                <x-input-label class="font-semibold uppercase" value="{{$primary->name}}"/>
                <x-text-input type="hidden" value="{{ $primary->id }}" name="category" />
            </div>

        @endif

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
