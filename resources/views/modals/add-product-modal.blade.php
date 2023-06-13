<x-modal name="add-product" :show="$errors->productAddition->isNotEmpty()" focusable>
    <form action="{{ route('products.add') }}" method="POST" enctype="multipart/form-data" class="p-6">
        @csrf

        <h3>Add a product Category</h3>
        <div class="mt-6">
            <x-input-label for="name" value="{{ __('Product') }}" class="" />
            <x-text-input name="name" type="text" class="mt-1 block w-3/4" placeholder="{{ __('Product Name') }}"
                required />
            <x-input-error :messages="$errors->productAddition->get('name')" class="mt-2" />
        </div>

        <div class="mt-6">

            <x-input-label for="product_type" value="{{ __('Type') }}" class="" />
            {{-- if the modal is in individual product type page --}}
            @isset($type->id)
                <h4 class="font-semibold font-mono ">{{ $type->name }}</h4>
                <input type="hidden" value="{{ $type->id }}" name="product_type" class="border-0">
                {{-- for pages that does not belong in the product type specific page --}}
            @else
                <x-select class="mt-1 block w-3/4" name="product_type" placeholder="{{ __('Product Type') }}" required>
                    <option value=""></option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </x-select>
                <x-input-error :messages="$errors->productAddition->get('product_type')" class="mt-2" />
            @endisset
        </div>
        <div class="mt-6">
            <x-input-label for="quantity" value="{{ __('Quantity') }}" class="" />

            <x-text-input name="quantity" type="text" class="mt-1 block w-3/4" placeholder="{{ __('Quantity') }}"
                required />
            <x-input-error :messages="$errors->productAddition->get('quantity')" class="mt-2" />
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

