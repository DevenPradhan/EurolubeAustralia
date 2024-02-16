<div class="space-y-10 w-full">
    <x-primary-button wire:click.prevent="openProductModal">Add Product</x-primary-button>
    <a href="{{ route('product-categories') }}"><x-primary-button>Categories</x-primary-button></a>
    <div class="w-full space-y-4">
        <div class="flex justify-end">
            <x-text-input placeholder="Search" class="pl-2 h-10" wire:model.debounce.500ms="search" />
        </div>
        <div class="space-y-3 flex justify-center">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col">Product</th>
                        <th scope="col">Category</th>

                        <th scope="col">Quantity</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td title="Featured">
                                <x-icons.stars class=" fill-amber-500 {{App\Models\ProductFeature::where('product_id', $product->id)->where('additional', 1)->count()>0 ? 'block' : 'hidden'}}"/>
                            </td>
                            <td scope="col">
                                <a href="{{route('products.show', $product->id)}}" class="user_td hover:underline hover:underline-offset-2">
                                    {{$product->name}}    
                                </a>
                            </td>
                            <td scope="col">
                                <a href="{{route('category-products', $product->category->id)}}" class="user_td hover:underline hover:underline-offset-2">
                                    {{$product->category->name}}    
                                </a>
                            </td>
                            <td scope="col">
                                <p class="user_td">{{ $product->quantity }}</p>
                            </td>
                            <td scope="col">
                                <p class="user_td">
                                    @foreach ($statuses as $key => $status )
                                    {{$key == $product->status ? $status : ''}}
                                    @endforeach
                                </p>
                            </td>
                            <th scope="col">
                                <div class="border-b py-2 space-x-3">
                                    {{-- <a href="{{ route('products.show', $product->id) }}">
                                        <x-secondary-button>View</x-secondary-button>
                                    </a> --}}
                                    <x-danger-button type="button" class="shadow-sm shadow-red-800 rounded-sm"
                                        wire:click.prevent="deleteProductModal({{ $product->id }})">Del</x-danger-button>
                                </div>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
               
            </table>
        </div>
        {{$products->links()}}

    </div>


    {{-- product modal --}}
    <x-livewire-modal wire:model="productModal">
        <div class="p-6">
            <form action="" wire:submit.prevent="addProduct">
                <div class="space-y-8" 
                     x-data="{ show_categories: @entangle('categoryDiv') }" 
                     x-init="@this.on('select-category', () => { show_categories = false })">
                    <h6>Add Product</h6>

                    {{-- Product Name row --}}
                    <div class="flex space-x-10 items-center">
                        <x-input-label for="productName" value="Name" class="w-20" />
                        <x-text-input type="text" name="productName" required wire:model.debounce.500ms="productName"
                            class="w-full" />
                        <x-input-error :messages="$errors->get('productName')" class="mt-2" />
                    </div>
                    {{-- check if product exists --}}
                    @if (!empty($validationSearch))
                        <div class="flex">
                            <p class="">{{ $validationSearch->name }} &emsp; - &emsp;</p>
                            <p>{{ $validationSearch->category->name }}</p>
                        </div>
                    @endif
                    {{-- Product Description row --}}
                    <div class="flex space-x-10 items-center">
                        <x-input-label for="productDescription" value="Description" class="w-20" />
                        <x-textbox name="productDescription" class="w-full h-20"
                            wire:model.debounce.1000ms="productDescription"></x-textbox>
                        <x-input-error :messages="$errors->get('productDescription')" class="mt-2" />
                    </div>

                    {{-- Product Category row ||
                                             \ / --}}
                    <div class="flex space-x-10 items-center">
                        <x-input-label for="productCategory" value="Category" class="w-20" />
                        <x-secondary-button wire:click.prevent="showCategoryDiv">
                            {{ empty($productCategory) ? 'Select a Category' : 'Change' }}
                        </x-secondary-button>
                        <p>{{ !empty($productCategory) ? $productCategory->name : '' }}</p>
                        <x-input-error :messages="$errors->get('productCategory')" class="" />
                    </div>

                    <div x-show="show_categories">
                        @livewire('admin.edit-categories')
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

    <!-- delete modal -->
    <x-livewire-modal wire:model="deleteModal">
        <div class="p-6">
            <form action="" wire:submit.prevent="confirmDeleteProduct">
                <div class="space-y-8">
                    <h6 class="text-red-800">Are you sure you want to delete the product? </h6>
                    <div class="flex space-x-10 items-center">
                        <x-input-label for="password" value="Password" class="w-20" />
                        <div class="w-full">
                            <x-text-input type="password" wire:model.defer="password" name="password" required
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
