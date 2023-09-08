<div class="space-y-10 w-full">
    <x-primary-button wire:click.prevent="openProductModal">Add Product</x-primary-button>
    <a href=""><x-primary-button>Categories</x-primary-button></a>
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
                                        wire:click.prevent="deleteProductModal({{ $product->id }})">Del</x-danger-button>
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
                <div class="space-y-8" x-data="{ show_categories: false }">
                    <h6>Add Product</h6>
                    <div class="flex space-x-10 items-center">
                        <x-input-label for="productName" value="Name" class="w-20" />
                        <x-text-input type="text" wire:model.debounce.500ms="productName" name="productName" required
                            class="w-full" />
                        <x-input-error :messages="$errors->get('productName')" class="mt-2" />
                    </div>
                    <div class="flex space-x-10 items-center">
                        <x-input-label for="productDescription" value="Description" class="w-20" />
                        <x-textbox wire:model.debounce.1000ms="productDescription" name="productDescription"
                            class="w-full h-20"></x-textbox>
                        <x-input-error :messages="$errors->get('productDescription')" class="mt-2" />
                    </div>
                    <div class="flex space-x-10 items-center">
                        <x-input-label for="productCategory" value="Category" class="w-20" />
                        <x-secondary-button x-on:click.prevent="show_categories = true">{{empty($productCategory) ? 'Select a ': 'Change'}}
                            category</x-secondary-button>
                            <p>{{!empty($productCategory) ? $productCategory->name : ''}}</p>
                        {{-- <x-input-error :messages="$errors->get('productName')" class="mt-2" /> --}}
                    </div>
                    <div class="flex p-3 rounded border h-60 bg-gray-300"
                        x-show="show_categories" 
                        x-init="@this.on('select-category', () => { show_categories = false })"
                        x-transition.duration.100ms
                        x-data="{add_category : 'category_list'}">

                        <div class="space-y-2" 
                            x-show="add_category === 'category_list'" 
                           >
                            {{-- add button to change from select category function to add category --}}
                            
                            <x-secondary-button class="max-w-max" 
                                                x-on:click.prevent="add_category = 'new_category'">Add</x-secondary-button>
                            
                            
                           
                            <ul class="rounded-sm text-sm max-h-40 overflow-y-auto">
                                <li><button wire:click.prevent="mainCategory" 
                                    type="button" 
                                    class="{{$categories->first()->level != 1 ? 'block' : 'hidden'}} flex justify-between border bg-gray-200 text-start hover:bg-gray-700 hover:text-white px-2 py-1 w-80">...</button></li>
                                @foreach($categories as $category)
                                
                                <li>
                                    <button type="button" 
                                            wire:click.prevent="addCategory({{$category->id}})" 
                                            class="flex justify-between border bg-gray-200 text-start hover:bg-gray-700 hover:text-white px-2 py-1 w-80">
                                        {{$category->name}} 

                                        <span>
                                            <x-icons.slider-right class="w-4 {{App\Models\ProductCategory::where('referencing', $category->id)->count() === 0 ? 'hidden' : ''}}"/>
                                        </span>
                                    </button>
                                </li>
                                @endforeach
                            </ul>
                            @if($categories->isEmpty())
                            <p class="p-3 text-gray-700">
                                No data
                            </p>
                            @endif
                        </div>

                        <div class="space-y-2 relative"  
                            x-show="add_category === 'new_category'" 
                            >
                            <div class="italic absolute text-green-700 left-20 top-5" 
                                    x-data="{notification: false}" 
                                    x-show.transition.opacity.out.duration.1000ms="notification"
                                    x-init="@this.on('saved', () => { notification = true; setTimeout(() => { notification = false }, 2000) })">
                                Category Saved
                               </div>

                                <x-secondary-button class=""
                                                x-on:click.prevent="add_category = 'category_list'">
                                                Back
                                </x-secondary-button>
                            
                            <div class="flex h-10 rounded border  w-full">
                                <select name="" 
                                    class="bg-gray-300 rounded-l focus:ring-0 focus:border-none border-none w-60"
                                    wire:model="upperCategory">
                                        <option value=""></option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                    <div class="">
                                        <input type="text" 
                                            placeholder="Enter new Category" 
                                            wire:model.lazy="newCategory" 
                                            class="focus:ring-0 focus:border-none border-none w-80"/>
                                        <x-input-error :messages="$errors->get('newCategory')" class="mt-2"/>
                                    </div>
                               
                            </div>
                            <x-secondary-button class="ml-2" wire:click.prevent="saveCategory">Save</x-secondary-button>
                        </div>
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
