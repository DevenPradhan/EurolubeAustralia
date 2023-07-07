<div class="flex flex-col space-y-4">
    <div class="flex justify-between">

        <x-primary-button class="focus:ring-0 active:bg-neutral-700 rounded-sm" x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'add-category')">Add</x-primary-button>

        <x-text-input placeholder="Search Categories" type="text" class="self-end w-1/3" name="search"
        wire:model.debounce.500ms="search" />
    </div>
        <div class="max-w-5xl mx-auto">
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

                                        <button type="button" x-data=""
                                            onclick="edit_modal({{ $category }})"
                                            x-on:click.prevent="$dispatch('open-modal', 'edit-modal')">
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
        </div>

        @include('modals.add-category-modal')


       
</div>
