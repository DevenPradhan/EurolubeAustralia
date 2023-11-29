<div class="w-full p-4 space-y-4">

    <h4>Categories</h4>
    @foreach ($categories as $category)
        <div
            class="flex justify-between items-center w-full px-3 py-2 
                    {{ $category->id == $categoryId ? 'bg-gray-200' : 'bg-white' }}
                    hover:bg-gray-200 text-gray-700 hover:text-black font-medium text-sm">
            <div class="space-y-1 w-full">
                <button type="button" wire:click.prevent="getSubCategories({{ $category->id }})"
                    class="md:w-max flex items-center text-left md:whitespace-nowrap px-3">
                    {{ $category->name }}
                    @if (App\Models\ProductCategory::where('referencing', $category->id)->count() > 0)
                        <x-icons.slider-right
                            class="w-7 {{ $categoryId == $category->id ? 'rotate-90 transition-transform' : '' }}" />
                    @endif
                </button>
                @if ($category->id == $categoryId)
                    <div class="mx-3">
                        @foreach ($subCategories as $subCategory)
                            <div class="px-2 w-full flex justify-between items-center py-1 hover:bg-white">
                                <a class="px-1 py-1"
                                    href="{{ route('category-products', $subCategory->id) }}">{{ $subCategory->name }}</a>
                                <div class="inline-flex space-x-2">
                                    <x-secondary-button class="h-6"
                                        wire:click.prevent="openEditModal({{ $subCategory->id }})">
                                        Edit</x-secondary-button>
                                    <x-danger-button class="h-6"
                                        wire:click.prevent="openDeleteModal({{ $subCategory->id }})">Del</x-danger-button>
                                </div>

                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
            {{-- <p>Sub-categories: {{App\Models\productCategory::where('referencing', $category->id)->count()}}</p> --}}
            <div class="inline-flex space-x-2 {{ $category->id == $categoryId ? 'hidden' : 'block' }}">
                <x-secondary-button class=""
                    wire:click.prevent="openEditModal({{ $category->id }})">Edit</x-secondary-button>
                <x-danger-button class=""
                    wire:click.prevent="openDeleteModal({{ $category->id }})">Del</x-danger-button>
            </div>

        </div>
    @endforeach

    <x-livewire-modal wire:model="editModal">
        <div class="p-6">
            <form action="" wire:submit.prevent="saveEditModal">
                <div class="mt-6 flex  items-center">
                    <x-input-label value="Category Name" class="w-28" />
                    <div class="">
                        <x-text-input wire:model="categoryName" type="text" />
                        <x-input-error :messages="$errors->get('categoryName')" class="mt-2" />
                    </div>
                </div>
                @if ($categoryForEdit && $categoryForEdit->level > 1)
                    <div class="flex mt-6 items-center">
                        <x-input-label value="Main Category" class="w-28" />
                        <div class="space-y-1">
                            <x-select wire:model="upCategory">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </x-select>
                            <x-input-error :messages="$errors->get('upCategory')" class="mt-2" />
                        </div>


                    </div>
                @endif

                             
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
