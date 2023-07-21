<x-app-layout>
    @include('flash-message')

    @include('alert')

    <div class=" container mx-auto flex flex-col space-y-20 items-center">
        <div class="flex">
            @include('User.sidebar')
        </div>
        <div class="flex flex-col space-y-5 mx-10">
            <h4 class="font-semibold uppercase text-xl">
                {{ $category->name }}
            </h4>
            <div class="space-x-10 flex items-center max-w-5xl">
                @if ($category->description == '')
                    <p>There are no descriptions for this category.</p>
                @else
                    <p>{{ $category->description }}</p>
                @endif
                <x-secondary-button type="button" 
                x-data="" 
                onclick="edit_desc({{ $category }})"
                x-on:click.prevent="$dispatch('open-modal', 'description-modal')">
                    {{ $category->description == '' ? 'Add' : 'Edit' }}
                </x-secondary-button>
            </div>


            {{-- option to upload images if not uploaded formerly --}}
            <div
                class="{{ $category->images == '[]' ? 'bg-yellow-50 max-w-4xl space-y-2' : 'bg-slate-50 max-w-5xl flex flex-row space-x-4' }} p-8 overflow-x-auto">
                @if ($category->images == '[]')
                    <p class="font-bold">
                        You dont have any image for this product. Upload some pictures to provide better
                        description of the item
                    </p>
                @else
                    @foreach ($category->images as $image)
                        <img src="{{ asset('storage/images/' . $image->url) }}" 
                             alt=""
                             class="w-56 object-cover">
                    @endforeach
                @endif
                <x-primary-button class="focus:ring-0 active:bg-neutral-700 rounded-sm max-w-max"
                                  x-data="" 
                                  x-on:click.prevent="$dispatch('open-modal', 'add-images')">
                    Add {{ $category->images != '[]' ? 'More' : '' }}
                </x-primary-button>
            </div>
            <div class="mt-4 flex max-w-4xl flex-col space-y-3 p-8 rounded-sm bg-red-50">
                <div>
                    <x-primary-button class="" 
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'add-type')">
                        Add
                    </x-primary-button>
                </div>
                @if ($category->product_types->count() == null)
                    <p
                        class="font-bold {{ count($category->product_types) == null ? 'block' : 'hidden' }} w-full flex justify-center">
                        You dont have any List in this category</p>
                @else
                    <div class="table_border">
                        <table class="table-auto w-full">
                            <thead>
                                <tr class="w-full">
                                    <th class="user_th w-4">#</th>
                                    <th class="user_th">Type</th>
                                    <th class="user_th">Action</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                <?php $id = 1; ?>
                                @foreach ($category->product_types as $type)
                                    <tr>
                                        <td class="user_td">
                                            <p class="text-center">{{ $id++ }}</p>
                                        </td>
                                        <td class="user_td"><a href="{{ route('type.details', $type->id) }}"
                                                class="flex justify-center hover:underline">
                                                {{ $type->name }}
                                            </a>
                                        </td>
                                        <td class="user_td flex justify-center">
                                            <button type="button">
                                                <x-trash-can />
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

            </div>
            @endif
        </div>


    </div>


    <form method="post" action="{{ route('category.type.add', $category->id) }}" enctype="multipart/form-data">
        @csrf
        @include('modals.add-product-type-modal')
    </form>

    <form action="{{ route('category.image.upload', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('modals.image-upload-modal')
    </form>

    <form action="{{ route('category-description-edit', $category->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        @include('modals.description-modal')
    </form>

</x-app-layout>
