<div class="max-w-5xl mx-auto space-y-4">
    <div class="flex flex-row space-x-2 justify-between">
        <x-primary-button class="focus:ring-0 active:bg-neutral-700 rounded-sm" x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'add-product')">Add</x-primary-button>
        <x-text-input placeholder="Search Products" type="text" class="self-end w-1/3" name="search"
            wire:model.debounce.500ms="search" />
    </div>

    <table class="table-auto overflow-x-auto">
        <thead>
            <tr>
                <th class="user_th">#</th>
                <th class="user_th w-60">Name</th>
                <th class="user_th">Part No</th>
                <th class="user_th">Type</th>
                <th class="user_th">Category</th>
                <th class="user_th">Quantity</th>
                <th class="user_th"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6">
                    @if (empty($products))
                        <div class="h-20 px-10 text-gray-500 flex flex-inline justify-center text-lg mt-6">
                            <p>There are no products added to the database.</p>
                        </div>
                    @endisset()
            </td>
            {{ $products }}
        </tr>
        <?php $id = 1; ?>
        @foreach ($products as $product)
            <tr>
                <td class="user_td">
                    <p class="text-center">{{ $id++ }}</p>
                </td>
                <td class="user_td">
                    <a href="{{ route('product.details', $product->id) }}"
                        class="anchor_tag">{{ $product->name }}
                    </a>
                </td>
                <td class="user_td">
                    <a href="{{route('product.details', $product->id)}}">{{$product->details->part_no}}</a>
                </td>
                <td class="user_td"><a class="anchor_tag"
                        href="{{ route('type.details', $product->type->id) }}">{{ $product->type->name }}</a>
                </td>
                <td class="user_td">
                    <a href="{{ route('category.details', $product->type->category->id) }}"
                        class="anchor_tag">{{ $product->type->category->name }}</a>
                </td>
                <td class="user_td">
                    <p class="text-center">{{ $product->quantity }}</p>
                </td>
                <td class="user_td">
                    <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <div class="flex justify-center space-x-4">

                            <button type="button" x-data="">
                                <x-edit />
                            </button>
                            <button onclick="return confirm('Are you sure you want to remove this category?')">
                                <x-trash-can />
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>


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
                                    wire:model="newProducts.{{ $id }}.name" type="text"
                                    class="mt-1 block w-3/4" placeholder="{{ __('Product Name') }}" required />
                                <x-input-error :messages="$errors->productAddition->get('newProducts[{{ $id }}][name]')" class="mt-2" />
                            </div>
                            <div class="space-y-1 w-2/3">
                                <x-select class="mt-1 block w-3/4"
                                    name="newProducts[{{ $id }}][product_type]"
                                    placeholder="{{ __('Product Type') }}"
                                    wire:model="newProducts.{{ $id }}.product_type" required>
                                    <option value="" hidden>Select One</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </x-select>
                            </div>

                            <x-input-error :messages="$errors->productAddition->get('product_type')" class="mt-2" />
                            <div class="w-1/6">
                                <x-text-input name="newProducts[{{ $id }}][quantity]" type="number"
                                    class="mt-1 block w-3/4" wire:model="newProducts.{{ $id }}.quantity"
                                    required />
                                <x-input-error :messages="$errors->productAddition->get('newProducts[{{ $id }}][quantity]')" class="mt-2" />
                            </div>
                            <div class="w-1/6 self-end justify-self-center py-2">
                                <x-danger-button id="add" type="button"
                                    wire:click.prevent="removeProduct({{ $id }})"
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
</div>
