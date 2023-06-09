    <x-modal name="edit-modal" :show="$errors->editModal->isNotEmpty()" focusable>
        <div class="p-6 space-y-6">
            <h4 class="font-semibold">Edit</h4>
            <hr>
            @if (Request::routeIs('categories'))
                <div class="mt-6 space-y-3">
                    <x-input-label for="category" value="{{ __('Category') }}" class="" />
                    <x-text-input name="category" type="text" value="{{ $category->name }}" />

                    <x-input-error :messages="$errors->editModal->get('category')" class="mt-2" />
                </div>
                
            @elseif (Request::routeIs('types'))
                <div class="mt-6 space-y-3">
                    <x-input-label for="type" value="{{__('Type')}}" class=""/>
                    <input type="hidden" value="" id="type_id" name="type_id">
                    <x-text-input name="type" type="text" value="" id="type_name"/>
                        <x-input-error :messages="$errors->editModal->get('type')" class="mt-2" />
                </div>
                <div class="mt-6 space-y-3">
                    <x-input-label for="type" value="{{__('Type')}}" class=""/>
                    <input type="text" id="type_category" name="category" value="">
                    {{-- <x-select name="category" class="mt-1 block w-3/4" id="type_category" >
                        <option value="" id="type_category"></option>
                        @foreach($categories as $key=>$category)
                        <option value="">{{$category}}</option>
                        @endforeach
                    </x-select> --}}
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
            <hr>
        </div>
    </x-modal>
