<div class="container mx-auto flex flex-col space-y-20 items-center">
    <div class="flex">
        @include('User.sidebar')
    </div>

    <div class="flex flex-col space-y-5 mx-10">

        <h4 class="font-semibold uppercase text-xl tracking-tight ml-8">
            {{ $product->name }}
        </h4>
        <div class="flex flex-row justify-between p-8 group ">
            <div class="space-y-10 flex flex-col font-semibold relative">
                <p>
                    {{ empty($product->description) ? 'There are no description for this category' : $product->description }}
                </p>
                <div class="flex absolute z-10 -right-16 -top-16 h-16  space-x-2 w-10 ">
                    <button type="button" x-data="" class="max-w-max"
                        onclick="edit_desc({{ $product }})"
                        x-on:click.prevent="$dispatch('open-modal', 'description-modal')">
                        <span
                            class="{{ $product->description == '' ? 'block' : 'hidden' }} px-4 py-2 uppercase font-medium shadow-sm text-xs border rounded-sm">Add</span>
                        <x-edit class="w-5 hidden h-10 {{ $product->description == '' ? '' : 'group-hover:block' }}" />
                    </button>

                    <button wire:click.prevent="deleteDescription({{ $product->id }})"
                        class="hidden {{ $product->description == '' ? '' : 'group-hover:block' }}"
                        onclick="return confirm('Are you sure you want to remove the description?') || event.stopImmediatePropagation()">
                        <x-trash-can class="w-4 h-10" />
                    </button>
                </div>
            </div>

        </div>




        {{-- option to upload images if not uploaded formerly --}}
        <div
            class="{{ $product->images == '[]' ? 'bg-yellow-50 max-w-4xl space-y-4' : 'bg-slate-50 max-w-5xl flex flex-row space-x-4' }} p-8 overflow-x-auto">

            @if ($product->images == '[]')
                <p class="font-bold">
                    You dont have any image for this product. Upload some pictures to provide
                    better
                    description of the item
                </p>
            @else
                @foreach ($product->images as $image)
                    <div class="relative w-56 overflow-hidden h-40 group">
                        <img src="{{ asset('storage/images/' . $image->image_url) }}" alt=""
                            class="object-cover absolute inset-0 w-full h-full top-0 z-0  group-hover:blur-md transition-all">
                        <div
                            class="relative items-center justify-center z-10 hidden group-hover:flex my-16 transition-all">
                            <button class=""
                                onclick="return confirm('Are you sure you want to delete the image?\nYou will lose the image once it is deleted.') || event.stopImmediatePropagation()"
                                wire:click.prevent="deleteImage({{ $image->id }})" type="button">
                                <x-trash-can class=" fill-red-500 group-hover:w-10" />
                            </button>
                        </div>
                    </div>
                @endforeach
            @endif

            <x-primary-button class="focus:ring-0 active:bg-neutral-700 rounded-sm max-w-max" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'add-images')">
                Add {{ $product->images != '[]' ? 'More' : '' }}
            </x-primary-button>

        </div>

        <div class="flex flex-col space-y-5 p-8">
            <div class="inline-flex space-x-10">
                <h4 class="font-semibold">Product Details</h4>

                <x-secondary-button type="button" x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'details-modal')">
                    {{ isset($product->details) ? 'Edit' : 'Add' }}
                </x-secondary-button>

            </div>

            <p>Quantity: &emsp;{{ $product->quantity }}</p>
            <p>Part No: &emsp;{{ $product->details->part_no }}</p>
            <p>Manual: &emsp;{{ $product->details->manual }}</p>
            <p>Dimensions: &emsp;{{ $product->details->dimensions }}</p>
            <p>Weight: &emsp;{{ $product->details->weight }}</p>

        </div>

        <div class="flex flex-col space-y-5 p-8">
            <h4 class="font-semibold">Product Features</h4>
            @if(!empty($product->features))
            @foreach($product->features as $feature)

            @endforeach
            @else
            <button>Add</button>
            @endif
        </div>


    </div>

    <form action="{{ route('product-description-edit', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        @include('modals.description-modal')
    </form>

    <form action="{{ route('product.image.upload', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('modals.image-upload-modal')
    </form>

    {{-- <form action="{{route('product-details.edit', $product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH') --}}
        @include('modals.details-modal')
    {{-- </form> --}}
</div>
