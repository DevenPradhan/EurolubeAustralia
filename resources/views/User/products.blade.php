<x-app-layout>

    @include('flash-message')

    @include('alert')

    <div class="w-full container flex flex-col items-center space-y-10">
        @include('User.sidebar')
        <x-primary-button class="focus:ring-0 active:bg-neutral-700 rounded-sm" x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'add-product')">Add</x-primary-button>
        <div class="max-w-5xl mx-auto">
            <table class="table-auto overflow-x-auto">
                <thead>
                    <tr>
                        <th class="user_th">#</th>
                        <th class="user_th w-60">Name</th>
                        <th class="user_th">Type</th>
                        <th class="user_th">Category</th>
                        <th class="user_th">Quantity</th>
                        <th class="user_th"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6">
                            @if ($products == '[]')
                                <div class="h-20 px-10 text-gray-500 flex flex-inline justify-center text-lg mt-6">
                                    <p>There are no products added to the database.</p>
                                </div>
                            @endisset()
                    </td>

                </tr>
                <?php $id = 1; ?>
                @foreach ($products as $product)
                    <tr>
                        <td class="user_td">
                            <p class="text-center">{{ $id++ }}</p>
                        </td>
                        <td class="user_td"><a href="{{ route('product.details', $product->id) }}"
                                class="anchor_tag">{{ $product->name }}</a></td>
                        <td class="user_td"><a class="anchor_tag"
                                href="{{ route('type.details', $product->type->id) }}">{{ $product->type->name }}</a>
                        </td>
                        <td class="user_td">
                            <a href="{{ route('category.details', $product->type->category->id) }}"
                                class="anchor_tag">{{ $product->type->category->name }}</a>
                        </td>
                        <td class="user_td">
                            <p class="text-center">{{ $product->quantity }}</p>
                        </td>
                        <td class="user_td">
                            <form action="{{route('product.destroy', $product->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    @method('DELETE')
                                    <div class="flex justify-center space-x-4">

                                        <button type="button" x-data=""
                                           >
                                            <x-edit />
                                        </button>
                                        <button
                                            onclick="return confirm('Are you sure you want to remove this category?')">
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


@include('modals.add-product-modal')


</x-app-layout>
