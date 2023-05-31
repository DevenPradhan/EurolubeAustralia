<x-app-layout>

    @include('flash-message')

    @include('alert')

    <div class="w-full container flex flex-col items-center space-y-4">
        <x-primary-button class="focus:ring-0 active:bg-neutral-700 rounded-sm" x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'add-category')">Add</x-primary-button>
        <div class="">
            <table class=" table-fixed">
                <thead>
                    <tr>
                        <th class="user_th">#</th>
                        <th class="user_th">Name</th>
                        <th class="user_th"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="user_td">{{ $id++ }}</td>
                            <td class="user_td font-semibold uppercase font-mono">{{ $category->name }}</td>
                            <td class="user_td">
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button onclick="return confirm('Are you sure you want to remove this category?')">Remove</x-danger-button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <x-modal name="add-category">
        <form method="post" action="{{ route('category.add') }}" class="p-6">
            @csrf

            <h3>Add a product Category</h3>
            <div class="mt-6">
                <x-input-label for="name" value="{{ __('Category') }}" class="sr-only" />

                <x-text-input name="name" type="text" class="mt-1 block w-3/4" placeholder="{{ __('Category') }}"
                    required />
                @error('name')
                    <div class="text-red-800 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3 hover:bg-red-700">
                    {{ __('Add Category') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>

</x-app-layout>
