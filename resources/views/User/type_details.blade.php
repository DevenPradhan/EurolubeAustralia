<x-app-layout>

    @include('flash-message')
    @include('alert')

    <div class="container mx-auto flex flex-col space-y-20">
        <div class="flex">
            @include('User.sidebar')
        </div>

        <div class="flex flex-col space-y-5 mx-10">
            <h4 class="font-semibold uppercase text-xl">{{ $type->name }}</h4>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum quo ducimus quas numquam, ratione
                eveniet! Voluptatem tempore eligendi, similique, fugit dolore harum id at, ducimus sapiente consequuntur
                sequi reiciendis quia.</p>

            {{-- option to upload images if not uploaded formerly --}}

            <div
                class="{{ $type->images == '[]' ? 'bg-yellow-50 max-w-4xl space-y-2' : 'bg-slate-50 max-w-5xl flex flex-row space-x-4' }} p-8 overflow-x-auto">
                @if ($type->images == '[]')
                    <p class="font-bold">You dont have any image for this product. Upload some pictures to provide better
                        description of the item</p>
                @else
                    @foreach ($type->images as $image)
                        <img src="{{ asset('storage/images/' . $image->url) }}" alt="" class="w-56 object-cover">
                    @endforeach
                @endif
                <x-primary-button class="focus:ring-0 active:bg-neutral-700 rounded-sm max-w-max" x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'add-images')">Add
                    {{ $type->images != '[]' ? 'More' : '' }}</x-primary-button>
            </div>
        </div>
    </div>


    @include('User.add-product-modal')

    <form action="{{ route('type.image.upload', $type->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('User.image-upload-modal')
    </form>
</x-app-layout>
