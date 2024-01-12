<div class="">
    <div class="space-y-10">
        <h4>{{$category->name}}</h4>
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



        <div class="grid gap-3 grid-cols-3 grid-flow-row relative">
            @foreach ($products as $product)
                <div class="h-max">
                    <a href="{{ route('products.show', $product->id) }}">
                        <div class="p-0.5 w-60 bg-gray-200 space-y-0.5">
                            <img src="{{asset('storage/products/images/'.$product->images()->first()->url)}}" 
                                 alt=""
                                 class="w-full h-40 object-cover">
                            <h4 class="bg-white p-1.5 h- rounded-sm tracking-wide uppercase text-lg">{{ $product->name }}</h4>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

    </div>

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
