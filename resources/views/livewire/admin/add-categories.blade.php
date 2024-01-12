<div>

    <x-primary-button wire:click.prevent="openAddModal">
        NEW category
    </x-primary-button>



    <x-livewire-modal wire:model="addModal">
        <div class="p-6">
            <form action="" wire:submit.prevent="saveNewCategory">
                <div class="mt-6 flex  items-center">
                    <x-input-label value="Category Name" class="w-40" />
                    <div class="">
                        <x-text-input wire:model.defer="categoryName" type="text" class="w-full" required />
                        <x-input-error :messages="$errors->get('categoryName')" class="mt-2" />
                    </div>
                </div>

                <div class="mt-6 flex items-center">
                    <x-input-label value="Category " class="w-40" />
                    <x-select wire:model="upCategory" class="w-1/2" required>
                        <option value="0"></option>
                        @foreach ($upCategories as $key => $category)
                            <option value="{{$key}}">{{$category}}</option>
                        @endforeach
                    </x-select>
                </div>

                <div class="mt-6 flex">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-primary-button class="ml-3" type="submit">
                        {{ __('Save') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </x-livewire-modal>

</div>
