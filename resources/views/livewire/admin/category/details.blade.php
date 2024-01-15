<div class="">
    <div class="space-y-10">
        <div class="space-y-2">
            <h4>{{ $category->name }}</h4>
            @if ($category->level > 1)
                <h6 class="text-gray-700">{{ App\Models\ProductCategory::where('id', $category->referencing)->value('name') }}</h6>
            @endif
        </div>

        <div class="w-60 relative h-80">
            @if ($category->images->count() > 0)
                <div class="absolute inset-0">
                    <img src="{{ asset('storage/categories/images/' . $category->images()->first()->url) }}"
                        alt="">
                </div>
            @endif
            <x-secondary-button class="absolute z-10"
                wire:click.prevent="openImageModal">{{ $category->images()->count() == 0 ? 'Add' : 'Change' }}
            </x-secondary-button>
        </div>



        <div class="space-y-2">
            <x-primary-button wire:click.prevent="addProductModal">Add Product</x-primary-button>
            <div class="grid gap-3 grid-cols-3 grid-flow-row relative">
                @foreach ($products as $product)
                    <div class="h-max">
                        <a href="{{ route('products.show', $product->id) }}">
                            <div class="p-0.5 w-60 bg-gray-200 space-y-0.5">
                                @if ($product->images()->exists())
                                    <img src="{{ asset('storage/products/images/' . $product->images()->first()->url) }}"
                                        alt="" class="w-full h-40 object-contain">
                                @endif
                                <h4 class="bg-white p-1.5 h- rounded-sm tracking-wide uppercase text-lg">
                                    {{ $product->name }}</h4>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <x-livewire-modal wire:model="productModal">
        <form wire:submit.prevent="addProductFunction">
            <div class="p-6 space-y-8">
                <h6>Add Product</h6>
                <div class="flex space-x-10 items-center">
                    <x-input-label for="productName" value="Name" class="w-20" />
                    <div class="">
                        <x-text-input type="text" name="productName" required wire:model.debounce.500ms="productName"
                        class="w-full" />
                        <x-input-error :messages="$errors->get('productName')" class="mt-2" />
                        
                    </div>
                  

                    </div>
                <div class="flex space-x-10 items-center">
                    <x-input-label for="productDescription" value="Description" class="w-20" />
                    <x-textbox name="productDescription" wire:model.defer="productDescription"
                        class="w-full"></x-textbox>
                </div>
                <div class="flex space-x-10 items-center">
                    <x-input-label for="productQuantity" value="Quantity" class="w-20" />
                    <x-text-input type="number" name="productQuantity" required
                        wire:model.debounce.500ms="productQuantity" class="w-full" />
                </div>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-primary-button class="ml-3" type="submit">
                        {{ __('Save') }}
                    </x-primary-button>
                </div>
            </div>

        </form>

    </x-livewire-modal>

    <x-livewire-modal wire:model="imageModal">
        <form wire:submit.prevent="uploadImage">
            <div class="p-6 space-y-8">
                <h6>Upload Image</h6>

                <div class="flex space-x-10 items-center">
                    <x-input-label for="productImage" value="Image" class="w-20" />
                    <x-text-input type="file" name="categoryImage" required wire:model.debounce.500ms="categoryImage"
                        class="w-full" />

                </div>

                @error('productImage')
                    <x-input-error :messages="$errors->get('categoryImage')" class="mt-2" />
                @else
                    @if ($categoryImage)
                        <div class="">
                            <img src="{{ $categoryImage->temporaryUrl() }}" alt="temp">
                        </div>
                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-primary-button class="ml-3" type="submit">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    @endif
                @enderror
            </div>
        </form>
    </x-livewire-modal>
</div>
