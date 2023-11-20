<div>
    <div x-data="{ product: @entangle('product') }"
        class="w-full min-w-max h-80 sm:h-96 relative bg-gradient-to-r opacity-80 from-gray-100 to-neutral-800 px-1 sm:px-3 py-10 flex items-center justify-center">
        <button x-on:click.prevent="$wire.previousItem()" {{ $count <= 1 ? 'disabled' : '' }}
            class="rounded-2xl bg-gray-800 opacity-20  {{ $count > 1 ? 'hover:opacity-50' : '' }}  absolute md:relative left-5 z-10">
            <x-icons.slider-left class="fill-gray-100 w-7 md:w-10" />
        </button>

        <div class="w-full flex justify-center sm:justify-start px-2 sm:px-8 h-60 relative">
            <div class="bg-white w-48 sm:w-64 md:w-80 h-full px-3 py-3 shrink-0">
                <img src="{{ asset('storage/products/images/' . $product->images()->first()->url) }}" alt=""
                    class=" w-full h-full object-contain">
            </div>
            <div
                class="relative overflow-hidden shrink-0 text-gray-50 md:absolute md:top-28 md:left-80 h-full md:h-60 flex flex-col px-8 sm:px-8 py-6 w-56 sm:w-96 bg-[#a80000] ">
                <p class="mt-2 md:text-lg">{{ $product->name }}</p>
                <div class="mt-3 text-xs line-clamp-5 tracking-wider leading-4 overflow-hidden">
                    <p>{!! $product->features->where('additional', 1)->first()->feature !!}</p>
                </div>
                <div class="mt-4">
                    <a href="{{ route('products-each', $product->name) }}" class="text-sm text-[#fff6f6d7]">Read
                        More</a>
                </div>

            </div>
        </div>


        <button x-on:click.prevent="$wire.nextItem()"
            class="rounded-2xl bg-gray-100 opacity-20 hover:opacity-50 absolute md:relative right-5 z-10">
            <x-icons.slider-right class="fill-gray-800 w-7 md:w-10" />
        </button>

    </div>
    <div class="space-x-3 flex mt-20 justify-center">
        @foreach ($products as $each)
            <div class="flex items-center">
                <p class="h-auto w-max opacity-80 rounded-full 
            {{ $products[$count - 1]->id === $each->id ? 'p-1 bg-gray-50' : 'p-0.5 bg-gray-300' }}"
                    x-transition.duration.500ms></p>
            </div>
        @endforeach
    </div>
</div>
