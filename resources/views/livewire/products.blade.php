<div class="space-y-10 w-full">
    <x-primary-button wire:click.prevent="openProductModal">Add Product</x-primary-button>

    <div class="w-full">
        <div class="flex justify-end">
            <x-text-input placeholder="Search" class="pl-2 h-10" wire:model.debounce.500ms="search" />
        </div>
        <div class="space-y-3 flex justify-center">
            <table class="table-auto w-4/5">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td scope="col">
                                <p class="user_td">{{ $product->name }}</p>
                            </td>
                            <td scope="col">
                                <p class="user_td">{{ $product->quantity }}</p>
                            </td>
                            <td scope="col">
                                <p class="user_td">{{ $product->status }}</p>
                            </td>
                            <th scope="col">
                                <div class="border-b py-2 space-x-3">
                                    <a href="{{ route('products.show', $product->id) }}">
                                        <x-secondary-button>View</x-secondary-button>
                                    </a>
                                    <x-danger-button type="button"
                                        wire:click.prevent="deleteProductModal({{$product->id}})">Del</x-danger-button>
                                </div>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>





    {{-- product modal --}}
    <x-livewire-modal wire:model="productModal">
        <div class="p-6">
            <form action="" wire:submit.prevent="addProduct">
                <div class="space-y-8">
                    <h6>Add Product</h6>
                    <div class="flex space-x-10 items-center">
                        <x-input-label for="productName" value="Product Name" class="w-20" />
                        <x-text-input type="text" wire:model.debounce.500ms="productName" name="productName" required
                            class="w-full" />
                        <x-input-error :messages="$errors->get('productName')" class="mt-2" />
                    </div>
                    <div class="flex space-x-10 items-center">
                        <x-input-label for="productDescription" value="Product Name" class="w-20" />
                        <x-textbox wire:model.debounce.1000ms="productDescription" name="productDescription"
                            class="w-full h-20"></x-textbox>
                        <x-input-error :messages="$errors->get('productName')" class="mt-2" />
                    </div>
                    <div class="flex space-x-10 items-center">
                        <x-input-label for="productQuantity" value="Quantity" class="w-20" />
                        <x-text-input type="number" wire:model="productQuantity" name="productQuantity" required
                            class="w-16" />
                        <x-input-error :messages="$errors->get('productQuantity')" class="mt-2" />
                    </div>
                    <div class="mt-6 flex">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-primary-button class="ml-3" type="submit">
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </x-livewire-modal>

    <x-livewire-modal wire:model="deleteModal">
        <div class="p-6">
            <form action="" wire:submit.prevent="confirmDeleteProduct">
                <div class="space-y-8">
                    <h6 class="text-red-800">Are you sure you want to delete the product? </h6>
                    <div class="flex space-x-10 items-center">
                        <x-input-label for="password" value="Password" class="w-20" />
                        <div class="w-full">
                            <x-text-input type="text" wire:model.defer="password" name="password" required
                                class="w-3/4" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                    </div>
                    <div class="mt-6 flex">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-primary-button class="ml-3" type="submit">
                            {{ __('Delete') }}
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </x-livewire-modal>

</div>
