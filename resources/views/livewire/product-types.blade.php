<div class="space-y-4">
    <div class="flex justify-between">
        <x-primary-button class="focus:ring-0 active:bg-neutral-700 rounded-sm" x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'add-type')">Add</x-primary-button>
        <x-text-input placeholder="Search Categories" type="text" class="self-end w-1/3" name="search"
        wire:model.debounce.500ms="search" />
    </div>
    
    <div class="max-w-5xl mx-auto">
        <table class="table-auto">
            <thead>
                <tr>
                    <th class="user_th">#</th>
                    <th class="user_th">Product Type</th>
                    <th class="user_th">Product Category</th>
                    <th class="user_th"></th>
                </tr>
            </thead>
            <tbody>
                <?php $id = 1; ?>
                @foreach ($product_types as $type)
                    <tr>
                        <td class="user_td">
                            <p class="text-center">{{ $id++ }}</p>
                        </td>
                        <td class="user_td w-64">
                            <a class="anchor_tag" href="{{ route('type.details', $type->id) }}">{{ $type->name }}</a>
                        </td>
                        <td class="user_td w-64"><a href="{{ route('category.details', $type->category->id) }}"
                                class="anchor_tag">{{ $type->category->name }}</a></td>
                        <td class="user_td">
                            <form action="{{ route('type.destroy', $type->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <div class="flex justify-center space-x-4">

                                    <button type="button" x-data=""
                                        onclick="edit_modal({{ $type }})"
                                        x-on:click.prevent="$dispatch('open-modal', 'edit-modal')">
                                        <x-edit />
                                    </button>
                                    <button
                                        onclick="return confirm('Are you sure you want to remove this category?\nYou will lose all the underlying tables after you delete it')">
                                        <x-trash-can />
                                    </button>
                                </div>
                            </form>

                        </td>
                        <td>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <x-modal name="add-type" :show="$errors->typeAddition->isNotEmpty()" focusable>
        <form method="post" action="{{ route('type.add') }}" class="p-6">
            @csrf
    
            <h3>Add a product Type</h3>
            <div class="mt-6">
                <x-input-label for="type" value={{__('Type')}} class=""/>
            </div>
            @foreach($newTypes as $id => $newType)
            <div class="flex {{count($newTypes) > 1 ? 'flex-row' : 'flex-col'}} w-full mt-2 ">
                <x-text-input 
                wire:model="newTypes.{{ $id }}.name" 
                name="newTypes[{{ $id }}][name]" 
                type="text" 
                placeholder="Enter Type"
                class="w-2/3 block mr-3 mb-2"/>
                
                <x-select 
                class=" block w-2/3 mr-3 mb-2" 
                name="newTypes[{{$id}}][category]" 
                wire:model="newTypes.{{$id}}.category" 
                required>
                    <option value="" hidden>Select A Category</option>
                    @foreach ($categories as $key => $category)
                        <option value="{{ $key }}">{{ $category }}</option>
                    @endforeach
                </x-select>
                
                <div class="w-1/6  justify-self-center ">
                    <x-danger-button 
                    id="add" 
                    type="button"
                    wire:click.prevent="removeType({{ $id }})"
                    class="rounded-sm py-1 px-2 {{ count($newTypes) > 1 ? 'block' : 'hidden' }}">
                        Delete 
                    </x-danger-button>
                </div>
                <div class="mt-4 {{count($newTypes) > 1 ? 'hidden' : 'block'}}">
                    <x-input-label for="description" value="{{ __('Description') }}" class="" />
                    <x-textbox name="description" value="{{ old('description') }}" class="text-gray-500 w-2/3"></x-textbox>
                </div>
            </div>
            @endforeach
            <div class="mt-6">
                <x-primary-button wire:click.prevent="addType" class="" type="button">Add More
                </x-primary-button>
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
    
</div>
