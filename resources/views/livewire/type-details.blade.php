<div class="flex flex-col space-y-5 mx-10">
    {{-- option to upload images if not uploaded formerly --}}

    <div
        class="{{ $type->images == '[]' ? 'bg-yellow-50 max-w-4xl space-y-2' : 'bg-slate-50 max-w-5xl flex flex-row space-x-4' }} p-8 overflow-x-auto">
        @if ($type->images == '[]')
            <p class="font-bold">
                You dont have any image for this Type. Upload some pictures to provide
                better description of the item</p>
        @else
            @foreach ($type->images as $image)
            <div class="h-40 w-56 overflow-clip">
                <img src="{{ asset('storage/images/' . $image->url) }}" alt="" class="w-56 object-cover">
            </div>
            @endforeach
        @endif
        <x-primary-button class="focus:ring-0 active:bg-neutral-700 rounded-sm max-w-max" x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'add-images')">
            Add
            {{ $type->images != '[]' ? 'More' : '' }}
        </x-primary-button>
    </div>

    <div class="mt-10  flex flex-col space-y-5  bg-red-50 p-8">
        <div class="">
            <x-primary-button class="focus:ring-0 active:bg-neutral-700 rounded-sm" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'add-product')">
                Add
            </x-primary-button>
        </div>

        @if ($type->products->count() == null)
            <div class="mt-4 flex max-w-xl flex-col space-y-3 p-8 rounded-sm">
                <p class="font-bold">
                    You dont have any List in this category
                </p>
            </div>
        @else
            <div class=" p-4 border-2 border-red-100 rounded-sm">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="user_th w-4">#</th>
                            <th class="user_th">Product</th>
                            <th class="user_th">Quantity</th>
                            <th class="user_th">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = 1; ?>
                        @foreach ($type->products as $product)
                            <tr>
                                <td class="user_td">
                                    <p class="text-center">{{ $id++ }}</p>
                                </td>
                                <td class="user_td">
                                    <a href="{{ route('product.details', $product->id) }}"
                                        class="flex justify-center hover:underline whitespace-nowrap max-w-sm">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <td class="user_td">
                                    <p class="text-center">{{ $product->quantity }}</p>
                                </td>
                                <td class="user_td flex justify-center">
                                        <button type="button" wire:click="deleteProduct({{ $product->id }})">
                                            <x-trash-can />
                                        </button>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        @endif
    </div>
    {{-- Only used LIVEWIRE COMPONENT FOR THE TIME BEING --}}
    <x-modal name="add-product" :show="$errors->productAddition->isNotEmpty()" focusable maxWidth="5xl">
        <form action="{{ route('type.products.add', $type->id) }}" method="POST" enctype="multipart/form-data"
            class="p-6">
            @method('PUT')
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
                                        wire:model.debounce.500ms="newProducts.{{ $id }}.name" type="text" class="mt-1"
                                        placeholder="{{ __('Product Name') }}" required />
                                    <x-input-error :messages="$errors->productAddition->get('newProducts[{{ $id }}][name]')" class="mt-2" />
                                </div>
                            </td>
                            <td class="">
                                <div class="mr-2">
                                    <x-text-input name="newProducts[{{ $id }}][part_no]"
                                        wire:model.debounce.500ms="newProducts.{{ $id }}.part_no" type="text" class="mt-1 "
                                        placeholder="{{ __('Part No') }}" />
                                    <x-input-error :messages="$errors->productAddition->get('newProducts.'. $id. 'part_no')" class="mt-2" />
                                </div>
                            </td>
    
                            <td>
                                <div class="mr-2">
                                    <x-text-input name="newProducts[{{ $id }}][quantity]" type="number"
                                        class="mt-1 block" wire:model.debounce.500ms="newProducts.{{ $id }}.quantity"
                                        required />
                                    <x-input-error :messages="$errors->productAddition->get('newProducts.' . $id . '.quantity')" class="mt-2" />
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
    
</div>
