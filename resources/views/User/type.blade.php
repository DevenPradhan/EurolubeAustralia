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
                                <a class="anchor_tag"
                                    href="{{ route('type.details', $type->id) }}">{{ $type->name }}</a>
                            </td>
                            <td class="user_td w-64"><a href="{{ route('category.details', $type->category->id) }}"
                                    class="anchor_tag">{{ $type->category->name }}</a></td>
                            <td class="user_td">
                                <form action="">
                                    <div class="flex justify-center space-x-4">

                                        <button type="button" x-data="" onclick="edit_modal({{$type}})"
                                            x-on:click.prevent="$dispatch('open-modal', 'edit-modal')" >
                                            <x-edit />
                                        </button>
                                        <button 
                                            onclick="return confirm('Are you sure you want to remove this category?\nYou will lose all the underlying tables after you delete it')">
                                            <x-trash-can />
                                        </button>
                                    </div>
                                </form>

                            </td>
                            <td>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('User.add-product-type-modal')

    <form action="{{ route('type.edit') }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        @include('User.edit-modal')

    </form>

    <script>
        function edit_modal(value)
        {
            $('#type_id').val(value.id);
            $('#type_name').val(value.name);
            $('#type_category').val(value.product_category_id);
            // $('#type_category').val(value.name);
            
        console.log(value);
        }
    </script>
</x-app-layout>
