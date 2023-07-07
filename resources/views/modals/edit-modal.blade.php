    <x-modal name="edit-modal" :show="$errors->editModal->isNotEmpty()" focusable>
        <div class="p-6 space-y-6">
            <h4 class="font-semibold">Edit</h4>
            <hr>

            {{-- for categories page edit each --}}
            @if (Request::routeIs('categories'))
                <div class="mt-6 space-y-3">
                    <x-input-label for="category" value="{{ __('Category') }}" class="" />
                    <input type="hidden" 
                            id="category_id" 
                            name="category_id">
                    <x-text-input name="category" 
                                    type="text" 
                                    required 
                                    value="{{ old('category') }}" 
                                    id="category" />
                                    
                    <x-input-error :messages="$errors->editModal->get('category')" class="mt-2 errors" />
                </div>
                <div class="mt-2 space-y-3">
                    <x-input-label for="description" value="{{__('Description')}}"/>
                    <x-textbox id="category-description" name="description" class="w-full">{{old('description')}}</x-textbox>
                    <x-input-error :messages="$errors->editModal->get('description')" class="mt-2 errors" />

                </div>

                {{-- for types page type edit each --}}
            @elseif (Request::routeIs('types'))
                <div class="mt-6 space-y-3">
                    <x-input-label for="type" value="{{ __('Type') }}" class="" />
                    <input type="hidden" value="" id="type_id" name="type_id">
                    <x-text-input name="type" type="text" value="{{ old('type') }}" id="type_name" />
                    <x-input-error :messages="$errors->editModal->get('type')" class="mt-2 errors" />
                </div>
                <div class="mt-6 space-y-3">
                    <x-input-label for="category" value="{{ __('Category') }}" class="" />
                    <x-select name="category" class="mt-1 block w-3/4" id="">
                        {{-- default value for category --}}
                        <option value="" {{ old('category') }} id="type_category" selected><?php echo $category = App\Models\ProductCategory::where('id', old('category'))->value('name'); ?>
                        </option>
                        @foreach ($categories as $key => $category)
                            <option value="{{ $key }}">{{ $category }}</option>
                        @endforeach
                    </x-select>
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

   
