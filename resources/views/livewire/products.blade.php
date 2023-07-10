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
                    <a href="{{ route('product.details', $product->id) }}" class="anchor_tag">{{ $product->name }}
                    </a>
                </td>
                <td class="user_td">
                    <a href="{{ route('product.details', $product->id) }}" class="anchor_tag">{{ $product->details->part_no }}</a>
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


<x-modal name="add-product" :show="$errors->productAddition->isNotEmpty()" focusable maxWidth="5xl">
    <form action="{{ route('products.add') }}" method="POST" enctype="multipart/form-data" class="p-6">
        @csrf

        <h3>Add product(s)</h3>
        <table>
            <thead>
                <tr>
                    <th>
                        <x-input-label for="name" value="{{ __('Product(s)') }}" class="" />
                    </th>
                    <th>
                        <x-input-label for="part_no" value="{{ __('Part No') }}" />
                    </th>
                    <th>
                        <x-input-label for="product_type" value="{{ __('Product Type') }}" class="" />
                    </th>
                    <th>
                        <x-input-label for="quantity" value="{{ __('Quantity') }}" class="" />
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($newProducts as $id => $newProduct)
                    <tr class="">
                        <td>
                            <div class="mr-2">
                                <x-text-input name="newProducts[{{ $id }}][name]"
                                    wire:model="newProducts.{{ $id }}.name" type="text"
                                    class="mt-1" placeholder="{{ __('Product Name') }}" required />
                                <x-input-error :messages="$errors->productAddition->get('newProducts[{{ $id }}][name]')" class="mt-2" />
                            </div>
                        </td>
                        <td class="">
                            <div class="mr-2">
                                <x-text-input name="newProducts[{{ $id }}][part_no]"
                                    wire:model="newProducts.{{ $id }}.part_no" type="text"
                                    class="mt-1 " placeholder="{{ __('Part No') }}" />
                                <x-input-error :messages="$errors->productAddition->get('newProducts[{{ $id }}][part_no]')" class="mt-2" />
                            </div>
                        </td>
                        <td>
                            <div class="mr-2">
                                <x-select class="mt-1"
                                    name="newProducts[{{ $id }}][product_type]"
                                    placeholder="{{ __('Product Type') }}"
                                    wire:model="newProducts.{{ $id }}.product_type" required>
                                    <option value="" hidden>Select One</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </x-select>
                                <x-input-error :messages="$errors->productAddition->get('product_type')" class="mt-2" />
                            </div>
                        </td>
                        <td>
                            <div class="mr-2">
                                <x-text-input name="newProducts[{{ $id }}][quantity]" type="number"
                                    class="mt-1 block" wire:model="newProducts.{{ $id }}.quantity"
                                    required />
                                <x-input-error :messages="$errors->productAddition->get('newProducts[{{ $id }}][quantity]')" class="mt-2" />
                            </div>
                        </td>
                        <td>
                            <div class="ml-4 mt-1">
                                <x-danger-button id="remove" type="button"
                                    wire:click.prevent="removeProduct({{ $id }})"
                                    class="rounded-sm py-1 px-2">
                                    Delete </x-danger-button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-6">
            <x-primary-button wire:click.prevent="addProduct" class="" type="button">Add More
            </x-primary-button>
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
