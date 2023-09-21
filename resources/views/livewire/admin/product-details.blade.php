<div class="space-y-4">
    {{-- Status Div start --}}
    <div class="relative  " x-data="{ status: false }" x-on:click.away="status = false">

        <button class="px-2 py-1 shadow opacity-75" x-on:click.prevent="status = !status">Status :

            @foreach ($statuses as $key => $status)
                {{ $key == $product->status ? $status : '' }}
            @endforeach
        </button>

        <ul class="absolute z-10 bg-white shadow-md px-0.5 pt-3 pb-1 rounded w-40" x-show="status" x-init="@this.on('status-changed', () => { status = false })">
            @foreach ($statuses as $key => $status)
                <button type="button" wire:click.prevent="changeStatus({{ $key }})"
                    onclick="return confirm('Are you sure you want to change the status of the product?') || event.stopImmediatePropagation()"
                    class="hover:bg-gray-200 px-2 uppercase w-full flex items-start">
                    <li class="">{{ $status }}</li>
                </button>
            @endforeach
        </ul>
    </div>
    {{-- status div end --}}

    {{-- quantity div start --}}
    <div class="relative" x-data="{ quantity: false }" x-on:click.away="quantity = false">
        <button class="px-2 py-1 shadow opacity-75" x-on:click.prevent="quantity = !quantity">Quantity :
            {{ $product->quantity }}</button>
        <div class="absolute z-20 p-3 bg-white shadow-md" x-show="quantity" x-init="@this.on('quantity-changed', () => { quantity = false })">
            <form action="" wire:submit.prevent="changeQuantity">
                <input type="number" wire:model.defer="productQuantity"
                    class="p-2 focus:ring-0 border-gray-400 rounded-sm h-7 w-32 text-sm" placeholder="Enter Quantity">
                <x-primary-button class="text-sm h-7">Save</x-primary-button>
            </form>
        </div>

    </div>
    {{-- quantity div ends --}}


    <div class="flex md:space-x-10 md:flex-row flex-col space-y-10 md:space-y-0">

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
        <div class="space-y-10 w-1/2 text-sm tracking-wider">
            <div class="space-y-4" 
                x-data="{ description: @entangle('description') }">
                <h5>Description: &emsp;
                    <span><x-secondary-button
                            wire:click.prevent="editDescription"
                           >Edit</x-secondary-button></span>
                </h5>

                <p x-show="description === 'show_description'"
                    class="text-sm min-h-[100px] {{ $product->description === null || '' ? 'border p-2 flex items-center justify-center rounded-sm' : '' }}">
                    {{ $product->description == null || '' ? 'Description Not Added' : $product->description }}
                </p>

                <div class="" 
                    x-show="description === 'edit_description'">
                    <x-textbox class="w-full" wire:model.lazy="productDescription"></x-textbox>
                    <div class="flex justify-end text-xs space-x-2">
                        <x-secondary-button x-on:click.prevent="description = 'show_description'">Cancel</x-secondary-button>
                        <x-primary-button wire:click.prevent="saveDescription">Save</x-primary-button>
                    </div>
                </div>
            </div>

            <div class="space-y-4 ">
                <div class="inline-flex space-x-10">
                    <h5>Features:</h5>
                    <x-secondary-button wire:click.prevent="addFeature">Add</x-secondary-button>
                </div>

                @foreach ($product->features as $features)
                    <div class=" p-4 rounded-sm group shadow-sm relative space-y-3">
                        <p class="w-full">{!! $features->feature !!}</p>
                        <div class="text-xs tracking-wider absolute top-4 right-4 hidden group-hover:block transition-all">
                            <x-secondary-button class="px-1 py-1 max-w-max"
                                wire:click.prevent="editFeature({{ $features->id }})">Edit</x-secondary-button>
                            <x-danger-button wire:click.prevent="deleteFeature({{ $features->id }})"
                                onclick="return confirm('Are you sure you want to delete?') || event.stopImmediatePropagation()">Del</x-danger-button>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="w-1/4 space-y-4">
            <x-secondary-button wire:click.prevent="openDetailsModal">Edit</x-secondary-button>
            <div class="tracking-wide text-sm space-y-1">
                <p>Part No: &emsp; 
                    <span class="font-medium">{{ $product->details->part_no }}</span>
                </p>
                <p>Dimensions: &emsp;
                    <span class="font-medium"> {{ $product->details->dimensions }}</span>
                </p>
                <p>Weight: &emsp;
                    <span class="font-medium"> {{ $product->details->weight }}</span>
                </p>
                <p>Manual: &emsp;
                    <span class="font-medium"> {{ $product->details->manual }}</span>
                </p>
            </div>
        </div>
    </div>

    


    <x-livewire-modal wire:model="trixModal" maxWidth="4xl">
        <div class="p-6 space-y-4">

            <h6>Feature/Description</h6>
            <div class="" wire:ignore>
                <x-trix-field name="productFeature" :value="$productFeature" id="productFeature"
                    wire:model.defer="productFeature" class="text-sm" required />
                <x-input-error :messages="$errors->get('productFeature')" class="mt-2" />
                <p class="text-xs tracking-wider text-red-600">This input field doesnt currently support drag and drop feature. Please type into the field manually. </p>
            </div>
            <div class=" inline-flex space-x-4 items-center">
                <x-input-label class="w-full">Do you want to make this visible in your featured products page?</x-input-label>
                <input type="checkbox" wire:model.defer="featured" class="border-gray-400 focus:ring-0 rounded-sm focus:ring-gray-400 text-gray-400">
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                @if ($productFeature)
                    <x-primary-button class="ml-3" type="submit" wire:click.prevent="saveEditFeature"
                        wire:loading.attr="disabled">
                        {{ __('Update') }}
                    </x-primary-button>
                @else
                    <x-primary-button class="ml-3" type="submit" wire:click.prevent="createFeature"
                        >
                        {{ __('Create') }}
                    </x-primary-button>
                @endif
            </div>
        </div>
    </x-livewire-modal>

    {{-- Edit Details Modal --}}
    <x-livewire-modal wire:model="detailsModal">
        <form action="" wire:submit.prevent="saveDetails">
            <div class="p-6 space-y-7">
                <h6>Edit Details</h6>
                <div class="flex space-x-10 items-center">
                    <x-input-label for="part_no" value="Part No" class="w-1/4" />
                    <div class="w-full">
                        <x-text-input type="text" wire:model.defer="partNo" name="part_no" class="w-3/4" />
                        <x-input-error :messages="$errors->get('partNo')" class="mt-2" />
                    </div>
                </div>
                <div class="flex space-x-10 items-center">
                    <x-input-label for="dimensions" value="Dimensions" class="w-1/4" />
                    <div class="w-full">
                        <x-text-input type="text" wire:model.defer="dimensions" name="dimensions"
                            class="w-3/4" />
                        <x-input-error :messages="$errors->get('dimensions')" class="mt-2" />
                    </div>
                </div>
                <div class="flex space-x-10 items-center">
                    <x-input-label for="weight" value="Weight" class="w-1/4" />
                    <div class="w-full">
                        <x-text-input type="text" wire:model.defer="weight" name="weight" class="w-3/4" />
                        <x-input-error :messages="$errors->get('weight')" class="mt-2" />
                    </div>
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

    {{-- Image Upload/change modal --}}
    <x-livewire-modal wire:model="imageModal">
        <form wire:submit.prevent="uploadImage">
            <div class="p-6 space-y-8">
                <h6>Upload Image</h6>

                <div class="flex space-x-10 items-center">
                    <x-input-label for="productImage" value="Image" class="w-20" />
                    <x-text-input type="file" name="productImage" required
                        wire:model.debounce.500ms="productImage" class="w-full" />

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
