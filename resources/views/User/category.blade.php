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
                                    <a href="{{ route('category.details', $category->id) }}"
                                        class="anchor_tag">{{ $category->name }}</a>
                                </td>

                                <td class="user_td">
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="flex justify-center space-x-4">

                                            <button type="button" x-data="" onclick="edit_modal({{$category}})"
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
        </div>


    </div>

    <form action="{{ route('category.edit', $category->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        @include('modals.edit-modal')
    </form>

    
    @include('modals.add-category-modal')

    <script>
        function edit_modal(category){
            $('.errors').empty();
            $('#category_id').val(category.id);
            $('#category').val(category.name);
            // console.log(category);
        }
    </script>
</x-app-layout>
