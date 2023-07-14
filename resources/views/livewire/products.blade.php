<div class="max-w-5xl mx-auto space-y-7">
    <div class="flex flex-row space-x-2 justify-between">
        <div class="inline-flex space-x-2">
            <x-primary-button class="focus:ring-0 active:bg-neutral-700 rounded-sm" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'add-product')">Add</x-primary-button>
            <x-secondary-button>
                Verify
            </x-secondary-button>
        </div>
        <x-text-input placeholder="Search Products" type="text" class="self-end w-1/3" name="search"
            wire:model.debounce.500ms="search" />
    </div>
    <div class="flex flex-col space-y-2">
        <div class="inline-flex space-x-10">
            <span class="bg-red-600 p-3"></span>
            <p class="text-sm ">Unverified</p>
        </div>
        <div class="inline-flex space-x-10">
            <span class="bg-green-700 p-3"></span>
            <p class="text-sm">Verified</p>
        </div>
    </div>
    <table class="table-auto overflow-x-auto">
        <thead>
            <tr>
                <th class="user_th" scope="col">
                    <input type="checkbox" class="">
                </th>

                <th class="user_th w-60">Name</th>
                <th class="user_th">Part No</th>
                <th class="user_th">Type</th>
                <th class="user_th">Category</th>
                <th class="user_th">Quantity</th>
                <th class="user_th">

                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="{{ $product->validity == 0 ? 'text-red-600' : 'text-green-700' }}">
                    <th class="user_td" scope="col">
                        <input type="checkbox" class="">
                    </th>
                    <td class="user_td">
                        <a href="{{ route('product.details', $product->id) }}" class="anchor_tag">{{ $product->name }}
                        </a>
                    </td>
                    <td class="user_td">
                        <a href="{{ route('product.details', $product->id) }}"
                            class="anchor_tag justify-center">{{ $product->details->part_no }}</a>
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

                        <div class="flex justify-center space-x-4">

                            <button
                                class="{{ Auth::user()->role == 'admin' && $product->validity == 0 ? 'block' : 'hidden' }}">
                                <x-tick />
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach

            @if (!$nothingFound)
                <tr>
                    <td colspan="8">
                        <p class="text-center text-gray-500 italic text-sm h-10 mt-3">Nothing Found</p>
                    </td>
                </tr>
            @endif

        </tbody>

    </table>
    <div class="">
        {{ $products->links() }}

    </div>

    <x-modal name="add-product" :show="$errors->productAddition->isNotEmpty()" focusable maxWidth="5xl">
        <form action="{{ route('products.add') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf

            <h3>Add product(s)</h3>
            <div class="mt-6">
                <x-primary-button wire:click.prevent="addProduct" class="" type="button">Add More
                </x-primary-button>
            </div>
            <table class="mt-6">
                <thead>
                    <tr>
                        <th>
                            <x-input-label for="name" value="{{ __('Product(s)') }}" class="" />
                        </th>
                        <th>
                            <x-input-label for="part_no" value="{{ __('Part No') }}" />
                        </th>
                        <th>
                            <x-input-label for="product_type" value="{{ __('Product Type') }}"
                                class="whitespace-nowrap" />
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
                                        wire:model="newProducts.{{ $id }}.name" type="text" class="mt-1"
                                        placeholder="{{ __('Product Name') }}" required />
                                    <x-input-error :messages="$errors->productAddition->get('newProducts[{{ $id }}][name]')" class="mt-2" />
                                </div>
                            </td>
                            <td class="">
                                <div class="mr-2">
                                    <x-text-input name="newProducts[{{ $id }}][part_no]"
                                        wire:model="newProducts.{{ $id }}.part_no" type="text"
                                        class="mt-1 " placeholder="{{ __('Part No') }}" />
                                    <x-input-error :messages="$errors->productAddition->get(
                                        'newProducts[{{ $id }}][part_no]',
                                    )" class="mt-2" />
                                </div>
                            </td>
                            <td>
                                <div class="mr-2">
                                    <x-select class="mt-1" name="newProducts[{{ $id }}][product_type]"
                                        placeholder="{{ __('Product Type') }}"
                                        wire:model="newProducts.{{ $id }}.product_type" required>
                                        <option value="" hidden>Select One</option>
                                        @foreach ($types as $key => $type)
                                            <option value="{{ $key }}">{{ $type }}</option>
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
                                    <x-input-error :messages="$errors->productAddition->get(
                                        'newProducts[{{ $id }}][quantity]',
                                    )" class="mt-2" />
                                </div>
                            </td>
                            <td>
                                <div class="ml-4 mt-1 {{ count($newProducts) > 1 ? 'block' : 'hidden' }}">
                                    <x-danger-button id="remove" type="button"
                                        wire:click.prevent="removeProduct({{ $id }})"
                                        class="rounded-sm py-1 px-2 block">
                                        Delete </x-danger-button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')" wire:click.prevent="cancelModal">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3 hover:bg-red-700">
                    {{ __('Save') }}
                </x-danger-button>
            </div>
        </form>

    </x-modal>
</div>
