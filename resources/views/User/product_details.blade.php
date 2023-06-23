<x-app-layout>
    @include('flash-message')

    @include('alert')

    <div class="container mx-auto flex flex-col space-y-20">
        <div class="flex">
            @include('User.sidebar')
        </div>

        <livewire:product-details id = "{{$id}}"/>
        {{-- <div class="flex flex-col space-y-5 mx-10">
            <h4 class="font-semibold uppercase text-xl">
                {{ $product->name }}
            </h4>
            <div class="space-y-10 flex flex-col p-8 font-semibold">
                <p>{{ $product->description == '' ? 'There are no description for this category' : $product->description }}
                </p>
                <x-secondary-button type="button" x-data="" class="max-w-max"
                    onclick="edit_desc({{ $product }})"
                    x-on:click.prevent="$dispatch('open-modal', 'description-modal')">
                    {{ $product->description == '' ? 'Add' : 'Edit' }}</x-secondary-button>
            </div> --}}

            {{-- option to upload images if not uploaded formerly --}}
            {{-- <div
                class="{{ $product->images == '[]' ? 'bg-yellow-50 max-w-4xl space-y-2' : 'bg-slate-50 max-w-5xl flex flex-row space-x-4' }} p-8 overflow-x-auto">
                @if ($product->images == '[]')
                    <p class="font-bold">You dont have any image for this product. Upload some pictures to provide
                        better
                        description of the item</p>
                @else
                    @foreach ($product->images as $image)
                        <img src="{{ asset('storage/images/' . $image->image_url) }}" alt=""
                            class="w-56 object-cover">
                    @endforeach
                @endif
                <x-primary-button class="focus:ring-0 active:bg-neutral-700 rounded-sm max-w-max"
                    x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-images')">Add
                    {{ $product->images != '[]' ? 'More' : '' }}</x-primary-button>
            </div>

            <div class="flex flex-col space-y-5 p-8">
                <div class="inline-flex space-x-10">
                    <h4 class="font-semibold">Product Details</h4>
                    <x-secondary-button type="button" x-data=""
                        onclick="edit_details({{ $product }})"
                        x-on:click.prevent="$dispatch('open-modal', 'details-modal')">
                        Edit</x-secondary-button>
                </div>

                <p>Part No: {{ isset($product->details) ? $product->details->part_no : '' }}</p>
                <p>Manual: {{ isset($product->details) ? $product->details->manual : '' }}</p>
                <p>Dimensions: {{ isset($product->features) ? $product->features->dimensions : '' }}</p>
                <p>Max Air Pressure: {{ isset($product->features) ? $product->features->max_air_pressure : '' }}</p>
                <p>Weight: {{ isset($product->features) ? $product->features->weight : '' }}</p>
                <p>Air Inlet: {{ isset($product->features) ? $product->features->air_inlet : '' }}</p>
                <p>Outlet: {{ isset($product->features) ? $product->features->outlet : '' }}</p>
                <p>Capacity: {{ isset($product->features) ? $product->features->capacity : '' }}</p>
                <p>Pump Tube: {{ isset($product->features) ? $product->features->pump_tube : '' }}</p>
                <p>Seals: {{ isset($product->features) ? $product->features->seals : '' }}</p>
            </div>

        </div> --}}

    </div>
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

    <form action="">
        @csrf
        @include('modals.details-modal')
    </form>

</x-app-layout>
