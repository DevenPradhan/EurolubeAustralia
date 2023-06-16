<x-app-layout>
    @include('flash-message')

    @include('alert')

    <div class="container mx-auto flex flex-col space-y-20">
        <div class="flex">
            @include('User.sidebar')
        </div>
        <div class="flex flex-col space-y-5 mx-10">
            <h4 class="font-semibold uppercase text-xl">
                {{ $product->name }}
            </h4>
            <div class="space-x-10 flex items-center">
                <p>{{ $product->description == '' ? 'There are no description for this category' : $product->description }}
                </p>
                <x-secondary-button type="button" x-data="" onclick="edit_desc({{ $product }})"
                    x-on:click.prevent="$dispatch('open-modal', 'description-modal')">
                    {{ $product->description == '' ? 'Add' : 'Edit' }}</x-secondary-button>
            </div>

            {{-- option to upload images if not uploaded formerly --}}

            <div
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

          @livewire('product-details')
        </div>
        <div class="">
            {{ $product->detail }}
            {{ $product->features }}
            @isset($product->detail)
                {{ $product->detail->part_no }}
                {{ $product->detail->manual }}
            @endisset

            @isset($product->features)
                {{ $product->features->dimensions }}
                {{ $product->features->max_air_pressure }}
                {{ $product->features->weight }}
                {{ $product->features->air_inlet }}
                {{ $product->features->outlet }}
                {{ $product->features->capacity }}
                {{ $product->features->pump_tube }}
                {{ $product->features->seals }}
            @endisset

        </div>

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

</x-app-layout>
