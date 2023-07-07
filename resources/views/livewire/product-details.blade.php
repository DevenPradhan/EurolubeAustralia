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
                <div class="relative items-center justify-center z-10 hidden group-hover:flex my-16 transition-all">
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
        <h4 class="font-semibold">Product Features</h4>
        <x-secondary-button class="max-w-max">Add</x-secondary-button>
    </div>

    @foreach ($product->features as $feature)
        <div class="inline-flex space-x-4">
            <span class="font-semibold">{{ $feature->feature }}:</span> &emsp;{{ $feature->additional }}
        </div>
    @endforeach
    
</div>
