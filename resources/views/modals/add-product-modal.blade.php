<x-modal name="add-product" :show="$errors->productAddition->isNotEmpty()" focusable maxWidth="4xl">
    <form action="{{ route('products.add') }}" method="POST" enctype="multipart/form-data" class="p-6">
        @csrf

        <h3>Add product(s)</h3>
        <div class="mt-6 w-full">
            {{-- if the modal is in individual product type page --}}
            @isset($type->id)
                <x-input-label for="product_type" value="{{ __('Type') }}" class="" />
                <h4 class="font-semibold font-mono ">{{ $type->name }}</h4>
                <input type="hidden" value="{{ $type->id }}" name="product_type" class="border-0">

                {{-- for pages that does not belong in the product type specific page --}}
            @else
                {{-- <div class="flex space-x-10">
                    <p>{{ isset($types) ? 'There are no product Types. Add One' : 'Add Type' }}</p>
                    <x-text-input value="{{ old('product_type') }}" placeholder="Add Product Type" type="text"
                        class="w-3/4 block mt-1" />

                    <a href="{{ route('types') }}">All Types</a>
                </div> --}}
               
                    @livewire('products')

            @endisset
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
