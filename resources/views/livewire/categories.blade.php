<div class="flex flex-col space-y-4">
    <div class="flex justify-between w-full">

        <x-primary-button class="focus:ring-0 active:bg-neutral-700 rounded-sm" x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'add-category')">Add</x-primary-button>

        <x-text-input placeholder="Search Categories" type="text" class="self-end w-1/3" name="search"
            wire:model.debounce.500ms="search" />
    </div>
    <div class="max-w-6xl mx-auto space-y-4">
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
                            <a href="{{ route('category.details', $category->id) }}"
                                class="anchor_tag">{{ $category->name }}</a>
                        </td>

                        <td class="user_td">
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="flex justify-center space-x-4">

                                    <button type="button" x-data="" {{-- onclick="edit_modal({{ $category }})" --}}
                                        x-on:click.prevent="$dispatch('open-modal', 'edit-modal')"
                                        wire:click.prevent="editModal({{ $category }})">
                                        <x-edit />
                                    </button>
                                    <button
                                        onclick="return confirm('Are you sure you want to remove this category?\nYou will lose all the underlying tables after you delete it')">
                                        <x-trash-can />
                                    </button>
                                </div>

                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $product_categories->links() }}
    </div>

    @include('modals.add-category-modal')

    <x-modal name="edit-modal" :show="$errors->editModal->isNotEmpty()" focusable>
        <form action="{{ route('category.edit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="p-6 space-y-6">
                <h4 class="font-semibold">Edit</h4>
                <hr>

                {{-- for categories page edit each --}}
                <div class="mt-6 space-y-3">
                    <x-input-label for="category" value="{{ __('Category') }}" class="" />
                    <input type="hidden" id="category_id" name="category_id" wire:model="category_id">
                    <x-text-input name="category" type="text" required wire:model="category" />

                    <x-input-error :messages="$errors->get('category')" class="mt-2 errors" />
                </div>
                <div class="mt-2 space-y-3">
                    <x-input-label for="description" value="{{ __('Description') }}" />
                    <x-textbox id="category-description" name="description" class="w-full"
                        wire:model="categoryDescription"></x-textbox>
                    <x-input-error :messages="$errors->get('description')" class="mt-2 errors" />

                </div>


                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <button type="submit" {{$errors->any() ? 'disabled' : ''}} class=" px-3 py-1 bg-red-400 ml-2 rounded-sm border border-red-500">Save</button>
                </div>
                <hr>
            </div>
        </form>
    </x-modal>


</div>
