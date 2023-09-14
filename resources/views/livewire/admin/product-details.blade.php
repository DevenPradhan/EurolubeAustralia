<div class="space-y-4">
    <h4 class="tracking-wide">{{ $product->name }}</h4>

    {{-- Status Div start --}}
    <div class="relative  " 
         x-data="{ status: false }" 
         x-on:click.away="status = false">
        
         <button class="px-2 py-1 shadow opacity-75" 
                x-on:click.prevent="status = !status">Status : 
                
                @foreach($statuses as $key => $status)
                {{$key == $product->status ? $status : ''}}
                @endforeach
        </button>
        
                <ul class="absolute z-10 bg-white shadow-md px-0.5 pt-3 pb-1 rounded w-40" 
            x-show="status"
            x-init="@this.on('status-changed', () => {status = false})">
            @foreach ($statuses as $key => $status)
                <button type="button" wire:click.prevent="changeStatus({{$key}})" onclick="return confirm('Are you sure you want to change the status of the product?') || event.stopImmediatePropagation()" class="hover:bg-gray-200 px-2 uppercase w-full flex items-start">
                    <li class="">{{ $status }}</li>
                </button>
            @endforeach
        </ul>
    </div>
    {{-- status div end --}}

    {{-- quantity div start --}}
    <div class="relative"
            x-data="{quantity: false}"
            x-on:click.away="quantity = false">
        <button class="px-2 py-1 shadow opacity-75"
                x-on:click.prevent="quantity = !quantity">Quantity : {{$product->quantity}}</button>
        <div class="absolute z-20 p-3 bg-white shadow-md" 
            x-show="quantity"
            x-init="@this.on('quantity-changed', () => {quantity = false})">
            <form action="" wire:submit.prevent="changeQuantity">
                <input type="number"
                    wire:model.defer="productQuantity" 
                    class="p-2 focus:ring-0 border-gray-400 rounded-sm h-7 w-32 text-sm" 
                    placeholder="Enter Quantity">
                <x-primary-button class="text-sm h-7">Save</x-primary-button>    
            </form>    
        </div>
        
    </div>
    {{-- quantity div ends --}}

    <div class="flex sm:space-x-10 md:flex-row flex-col space-y-5 sm:space-y-0">

        <div class="md:w-1/4 h-80 space-y-4 border shadow p-3 ">
            <h5>Image</h5>

            @if ($product->images->count() > 0)
                <div class="w-full h-48 object-cover">
                    <img src="{{ asset('storage/products/images/' . $product->images->first()->url) }}" alt=""
                        class="w-full h-full object-scale-down">
                </div>
            @endif

            <x-secondary-button
                wire:click.prevent="openImageModal">{{ $product->images->count() == 0 ? 'Add' : 'Change' }}
            </x-secondary-button>
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
