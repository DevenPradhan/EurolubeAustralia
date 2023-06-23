<div>

    <div class="mt-6 inline-flex w-full">
        <x-input-label for="name" value="{{ __('Product(s)') }}" class="w-2/3" />
        <x-input-label for="product_type" value="{{ __('Product Type') }}" class="w-2/3" />
        <x-input-label for="quantity" value="{{ __('Quantity') }}" class="w-1/6" />
    </div>
    @foreach ($newProducts as $id => $newProduct)
        <div class="mt-6 inline-flex w-full">
            <div class="w-2/3 space-y-1">
                <x-text-input name="newProducts[{{ $id }}][name]"
                    wire:model="newProducts.{{ $id }}.name" type="text" class="mt-1 block w-3/4"
                    placeholder="{{ __('Product Name') }}" required />
                <x-input-error :messages="$errors->productAddition->get('newProducts[{{ $id }}][name]')" class="mt-2" />
            </div>
            <div class="space-y-1 w-2/3">
                <x-select class="mt-1 block w-3/4" name="newProducts[{{ $id }}][product_type]"
                    placeholder="{{ __('Product Type') }}" wire:model="newProducts.{{ $id }}.product_type"
                    required>
                    <option value="" hidden>Select One</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </x-select>
            </div>

            <x-input-error :messages="$errors->productAddition->get('product_type')" class="mt-2" />
            <div class="w-1/6">
                <x-text-input name="newProducts[{{ $id }}][quantity]" type="number" class="mt-1 block w-3/4"
                    wire:model="newProducts.{{ $id }}.quantity" required />
                <x-input-error :messages="$errors->productAddition->get('newProducts[{{ $id }}][quantity]')" class="mt-2" />
            </div>
            <div class="w-1/6 self-end justify-self-center py-2">
                <x-danger-button id="add" type="button" wire:click.prevent="removeProduct({{ $id }})"
                    class="rounded-sm py-1 px-2">
                    Delete </x-danger-button>
            </div>
        </div>
    @endforeach
    <div class="mt-6">
        <x-primary-button wire:click.prevent="addProduct" class="" type="button">Add More
        </x-primary-button>
    </div>
</div>
