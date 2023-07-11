<x-app-layout>
    <div class="w-full container flex flex-col space-y-20 items-center">
        <div class="flex">
            @include('User.sidebar')
        </div>

        <div class="flex flex-col  mx-10">

            <h4 class="font-semibold uppercase text-xl tracking-tight ml-8">
                {{ $product->name }}
            </h4>

            <div class="flex flex-col space-y-5 p-8">
                <div class="inline-flex space-x-10">
                    <h4 class="font-semibold">Product Details</h4>

                    <x-secondary-button type="button" x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'details-modal')">
                        {{ isset($product->details) ? 'Edit' : 'Add' }}
                    </x-secondary-button>

                </div>

                <p><span class="font-semibold">Quantity:</span>&emsp;{{ $product->quantity }}</p>
                <p><span class="font-semibold">Part No:</span>&emsp;{{ $product->details->part_no }}</p>
                {{-- @if (empty($product->details->manual)) --}}

                <p class="inline-flex"><span class="font-semibold">Manual:</span> &emsp;
                    <a href="{{ asset('storage/manuals/' . $product->details->manual) }}" target="_blank"
                        class="font-semibold drop-shadow-md {{ empty($product->details->manual) ? 'hidden' : 'block' }}">
                        View Manual
                    </a>
                </p>
                <p><span class="font-semibold">Dimensions:</span> &emsp;{{ $product->details->dimensions }}</p>
                <p><span class="font-semibold">Weight:</span> &emsp;{{ $product->details->weight }}</p>

            </div>
            <div class="flex flex-row justify-between p-8 group ">

                <p>
                    <span class="font-semibold">Product Description:</span>&emsp;
                    {{ empty($product->description) ? '-- There are no description for this category --' : $product->description }}
                </p>

                {{-- <div class="flex absolute z-10 -right-16 -top-16 h-16  space-x-2 w-10 ">
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
                    </div> --}}

            </div>


            @livewire('product-details', ['product_id' => $product->id])


        </div>

        <form action="{{ route('product.image.upload', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('modals.image-upload-modal')
        </form>

        <form action="{{ route('product-details.edit', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @include('modals.details-modal')
        </form>
    </div>


</x-app-layout>
