<div class="flex flex-col h-full justify-center">
    <div class="flex flex-row justify-between space-x-5 h-screen">
        <div class="w-full grid grid-cols-3 gap-8">
            @forelse ($products as $product)
                <div
                    class="w-60 shadow shadow-gray-300 shrink-0 bg-gray-100 h-72 flex flex-col items-center overflow-hidden">
                    <div class="w-full h-60 overflow-hidden">
                        @if ($product->images->count() > 0)
                            <img src="{{ asset('storage/products/images/' . $product->images->first()->url) }}" alt=""
                                class="w-full h-full object-cover">
                        @else
                        <div class="p-4 flex items-center w-full h-full bg-gray-200 justify-center text-sm">Image Not found</div>
                        @endif
                    </div>
                    <p class="text-[#252f33] px-4 py-2 text-sm font-medium tracking-wider">{{ $product->name }}</p>
                </div>
            @empty
                <div class="w-full shadow shadow-gray-300 bg-gray-100 h-72 flex items-center justify-center">
                    Nothing Found
                </div>
            @endforelse

        </div>
        <div class="w-80 h-max bg-[#EAECEC] px-8 py-12 space-y-6">
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
