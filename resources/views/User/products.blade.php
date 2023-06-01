<x-app-layout>

    @include('flash-message')

    @include('alert')

    <div class="w-full container flex flex-col items-center space-y-4">
        <x-primary-button class="focus:ring-0 active:bg-neutral-700 rounded-sm" x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'add-product')">Add</x-primary-button>

        <div class="">
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="user_th">#</th>
                        <th class="user_th">Name</th>
                        <th class="user_th">Category</th>
                        <th class="user_th">Quantity</th>
                        <th class="user_th"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    @foreach ($products as $product)
                        <tr>
                            <td class="user_td">{{ $id++ }}</td>
                            <td class="user_td">{{ $product->name }}</td>
                            <td class="user_td">{{ $product->category }}</td>
                            <td class="user_td">{{ $product->quantity }}</td>
                            <td class="user_td"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>



    <x-modal name="add-product" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('products.add') }}" class="p-6">
            @csrf

            <h3>Add a Product</h3>

            <div class="mt-6">
                <x-input-label for="name" value="{{ __('Product Name') }}" class="sr-only" />

                <x-text-input id="password" name="name" type="text" class="mt-1 block w-3/4"
                    placeholder="{{ __('Name') }}" required />
                    @error('name')
                    <div class="text-red-800 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-6">
                <x-input-label for="category" value="{{ __('category') }}" class="sr-only" />

                <x-select name="category" id="" class="mt-1 block w-3/4" placeholder="{{ __('Name') }}"
                    required>
                    <option value="" selected></option>
                    @foreach ($categories as $key => $category)
                        <option value="{{ $key }}">{{ $category }}</option>
                    @endforeach
                </x-select>
                @error('category')
                    <div class="text-red-800 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Add Product') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>

</x-app-layout>
