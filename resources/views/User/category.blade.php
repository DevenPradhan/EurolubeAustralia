<x-app-layout>

    @include('flash-message')

    @include('alert')

    <div class="w-full container flex flex-col items-center space-y-10">
        @include('User.sidebar')
        <div class="max-w-5xl mx-auto">
            <x-primary-button class="focus:ring-0 active:bg-neutral-700 rounded-sm" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'add-category')">Add</x-primary-button>
            <div class="">
                <table class=" table-auto">
                    <thead>
                        <tr>
                            <th class="user_th">#</th>
                            <th class="user_th">Name</th>
                            {{-- <th class="user_th">Products</th> --}}
                            <th class="user_th">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = 1; ?>
                        @foreach ($product_categories as $category)
                            <tr>
                                <td class="user_td">
                                    <p class="text-center">{{ $id++ }}</p>
                                </td>
                                <td class="user_td font-semibold uppercase font-mono w-72">
                                    <a href="{{route('category.details', $category->id)}}" class="flex justify-center hover:underline">{{ $category->name }}</a>
                                </td>
                                
                                <td class="user_td">
                                    <div class="flex justify-center">
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button
                                                onclick="return confirm('Are you sure you want to remove this category?\nYou will lose all the underlying tables after you delete it')">
                                                Remove</x-danger-button>
                                        </form>
                                    </div>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>

    <x-modal name="add-category" :show="$errors->categoryAddition->isNotEmpty()" focusable>
        <form method="post" action="{{ route('category.add') }}" class="p-6">
            @csrf

            <h3>Add a product Category</h3>
            <div class="mt-6">
                <x-input-label for="category" value="{{ __('Category') }}" class="sr-only" />

                <x-text-input name="category" type="text" class="mt-1 block w-3/4" placeholder="{{ __('Category') }}"
                    required />
                <x-input-error :messages="$errors->categoryAddition->get('category')" class="mt-2" />
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

</x-app-layout>
