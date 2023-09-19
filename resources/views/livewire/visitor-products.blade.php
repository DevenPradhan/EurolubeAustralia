<div class="flex flex-col h-full justify-center">
    <div class="flex flex-row justify-between space-x-5 h-screen">
        <div class="w-full grid grid-flow-row md:grid-cols-3 gap-8">
            @forelse ($products as $product)
                <a href="{{route('products-each', $product->id)}}" class="h-max w-max">
                    <div
                        class="w-48 sm:w-60  shadow-sm bg-white shadow-gray-300 shrink-0 h-48 sm:h-72 flex flex-col items-center overflow-hidden">
                        <div class="w-full h-40 sm:h-60 overflow-hidden relative">
                            @if ($product->images->count() > 0)
                                <img src="{{ asset('storage/products/images/' . $product->images->first()->url) }}"
                                    alt="" class="w-full h-full object-scale-down relative z-20 ">
                                    <img src="{{ asset('images/card bg img.jpg') }}" alt=""
                                        class="absolute inset-0 opacity-40">
                            @else
                                <div class="p-4 flex items-center w-full h-full bg-gray-200 justify-center text-sm">Image
                                    Not found</div>
                            @endif
                        </div>
                        <p class="text-[#252f33] px-6  py-4 text-sm font-medium tracking-wider">{{ $product->name }}</p>
                    </div>
                </a>
            @empty
                <div class="w-full shadow shadow-gray-300 bg-gray-100 h-72 flex items-center justify-center">
                    Nothing Found
                </div>
            @endforelse

        </div>
        <div class="w-80 h-max bg-[#EAECEC] px-4 sm:px-8 py-6 sm:py-12 space-y-3 sm:space-y-6">
            <input type="text" wire:model.debounce.500ms="search" placeholder="Search"
                class="ring-0 border-none focus:ring-0 w-full">
            <div class="space-y-3" x-data="{ selected: '' }">
                @foreach ($categories as $key => $category)
                    <x-sidebar-icons type="button"
                        class="{{ $categoryId === $key ? 'bg-red-800 text-white' : 'bg-[#F1F4F5]' }}"
                        wire:click.prevent="getProducts({{ $key }})">{{ $category }}</x-sidebar-icons>
                @endforeach
            </div>
        </div>

    </div>

    <div class=" justify-self-end">
        {{-- {{$products->links()}} --}}

    </div>
</div>
