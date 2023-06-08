<x-app-layout>

    @include('flash-message')
    @include('alert')

    <div class="container w-full items-center flex flex-col space-y-10">

        @include('User.sidebar')
        <div class="max-w-5xl mx-auto">
            <x-primary-button class="focus:ring-0 active:bg-neutral-700 rounded-sm" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'add-type')">Add</x-primary-button>
            
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="user_th">#</th>
                        <th class="user_th">Product Type</th>
                        <th class="user_th">Product Category</th>
                        <th class="user_th"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    @foreach ($product_types as $type)
                        <tr>
                            <td class="user_td">
                                <p class="text-center">{{ $id++ }}</p>
                            </td>
                            <td class="user_td w-64">
                                <a class="anchor_tag" href="{{route('type.details', $type->id)}}">{{$type->name}}</a>
                            </td>
                            <td class="user_td w-64"><a href="{{ route('category.details', $type->category->id) }}"
                                    class="anchor_tag">{{ $type->category->name }}</a></td>
                            <td class="user_td"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <x-modal name="add-type" :show="$errors->typeAddition->isNotEmpty()" focusable>
        <form method="post" action="{{ route('type.add') }}" class="p-6">
            @csrf

            <h3>Add a product Type</h3>
            <div class="mt-6">
                <x-input-label for="type" value="{{ __('Type') }}" class="" />

                <x-text-input name="type" type="text" class="mt-1 block w-3/4"
                    placeholder="{{ __('Enter Type here') }}" required />
                <x-input-error :messages="$errors->typeAddition->get('type')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="category" value="{{ __('Category') }}" class="" />

                <x-select class="mt-1 block w-3/4" placeholder="Select a Category" name="category" required>
                    <option value=""></option>
                    @foreach ($categories as $key => $category)
                        <option value="{{ $key }}">{{ $category }}</option>
                    @endforeach
                </x-select>
                <x-input-error :messages="$errors->typeAddition->get('category')" class="mt-2" />

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
