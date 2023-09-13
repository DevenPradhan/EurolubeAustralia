<div class="w-full p-4 space-y-4">

    <h4>Categories</h4>
    @foreach ($categories as $category)
        <div
            class="flex justify-between items-center w-full px-10 py-2 bg-white hover:bg-gray-200 text-gray-700 hover:text-black font-medium text-sm">
            <button type="button" wire:click.prevent="getSubCategories({{$category->id}})" class="w-48 flex px-3">
                {{ $category->name }}
            </button>
            {{-- <p>Sub-categories: {{App\Models\productCategory::where('referencing', $category->id)->count()}}</p> --}}
            
            <x-danger-button class=""
                wire:click.prevent="openDeleteModal({{ $category->id }})">Del</x-danger-button>
        </div>
    @endforeach





    <x-livewire-modal wire:model="deleteModal">
        <div class="p-6">
            <form action="" wire:submit.prevent="confirmDeleteCategory">
                <div class="space-y-8">
                    <h6 class="text-red-900 uppercase">Warning! </h6>
                    <p class="text-sm text-black leading-4 tracking-wide lowercase">If you delete the category many and
                        all of the products and
                        subcategories will be deleted. Are you sure you want to delete?</p>
                    <div class="flex space-x-10 items-center">
                        <x-input-label for="password" value="Password" class="w-20" />
                        <div class="w-full">
                            <x-text-input type="password" wire:model.defer="password" name="password" required
                                class="w-3/4" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                    </div>
                    <div class="mt-6 flex">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-primary-button class="ml-3" type="submit">
                            {{ __('Delete') }}
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </x-livewire-modal>
</div>
