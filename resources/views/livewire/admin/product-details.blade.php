<div class="space-y-4">
    <h3>{{ $product->name }}</h3>
    <div class="flex sm:space-x-10 sm:flex-row flex-col space-y-5 sm:space-y-0">

        <div class="w-1/4 h-72 space-y-10 ">
            <h5>Image</h5>
            
            @forelse ($product->images as $images)
                <img src="{{ asset('storage/products/images/' . $images->url) }}" alt="">
            @empty
                <p>Nothing Found</p>
            @endforelse
            
            <x-secondary-button
                wire:click.prevent="openImageModal">{{ $product->images->count() == 0 ? 'Add' : 'Change' }}</x-secondary-button>
        </div>
        <div class="space-y-10 w-1/2">
            <p>Product Description: &emsp;
                {{ $product->description }}
            </p>
            <h5>Features:</h5>
            <p class="w-full"></p>
        </div>
        <div class="w-1/4">
            <p>Part No: {{ $product->details->part_no }}</p>
            <p>Dimensions: {{ $product->details->dimensions }}</p>
            <p>Weight: {{ $product->details->weight }}</p>

        </div>
    </div>

    <x-livewire-modal wire:model="imageModal">
        <form wire:submit.prevent="uploadImage">
            <div class="p-6 space-y-8">
                <h6>Upload Image</h6>

                <div class="flex space-x-10 items-center">
                    <x-input-label for="productImage" value="Image" class="w-20" />
                    <x-text-input type="file" name="productImage" required wire:model.debounce.500ms="productImage"
                        class="w-full" />

                </div>

                @error('productImage')
                    <x-input-error :messages="$errors->get('productImage')" class="mt-2" />
                @else
                    @if ($productImage)
                        <div class="">
                            <img src="{{ $productImage->temporaryUrl() }}" alt="temp">
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
