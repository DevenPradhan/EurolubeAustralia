<div class="flex flex-col h-full justify-center">
    <div class="flex flex-row justify-between space-x-3 h-screen">
        <div class="w-full grid grid-flow-row md:grid-cols-3 gap-2 place-content-start">
            <div class="tracking-wider font-archivo text-[#252f33d3] font-medium italic" wire:loading.delay wire:target="search">
               ... Loading
            </div>
            @forelse ($products as $product)
                <a href="{{ route('products-each', $product->id) }}" class="h-max w-max">
                    <div
                        class="w-48 sm:w-60  shadow-sm bg-white shadow-gray-300 shrink-0 h-48 sm:h-72 flex flex-col items-center overflow-hidden">
                        <div class="w-full h-40 sm:h-60 overflow-hidden relative">
                            @if ($product->images->count() > 0)
                                <img src="{{ asset('storage/products/images/' . $product->images->first()->url) }}"
                                    alt="" class="w-full h-full object-scale-down relative z-20 ">
                                <img src="{{ asset('images/card bg img.jpg') }}" alt=""
                                    class="absolute inset-0 opacity-40">
                            @else
                                <div class="p-4 flex items-center w-full h-full bg-gray-200 justify-center text-sm">
                                    Image
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
        <div class="w-96 h-max bg-[#EAECEC] px-4 sm:px-4 py-4 sm:py-8 space-y-3 sm:space-y-4">
            <input type="text" wire:model.debounce.500ms="search" placeholder="Search"
                class="ring-0 border-none focus:ring-0 w-full">
            <div class="space-y-3" x-data="{ selected: '' }">
                @foreach ($categories as $key => $category)
                    
                    <x-sidebar-icons type="button"
                        class="group  
                            {{ $categoryId === $key ? 'bg-red-800 text-white' : 'bg-[#F1F4F5]' }}"
                        wire:click.prevent="getProducts({{ $key }})"
                       >
                        <span>{{ $category }}</span>

                        <i class="group-hover:fill-[#F1F4F5] w-full flex justify-end items-center h-5 {{$categoryId === $key ? 'fill-[#F1F4F5]' : 'fill-black'}}
                            {{App\Models\ProductCategory::where('referencing', $key)->count() > 0 ? 'block' : 'hidden'}}" 
                           >
                            <x-icons.plus  class=" {{$categoryId === $key ? 'hidden' : 'block'}}"/>
                            <x-icons.minus class=" {{$categoryId === $key ? 'block' : 'hidden'}}"/>
                        </i>
                    </x-sidebar-icons>
                    @if ($categoryId === $key)
                    <div class="-py-3 bg-[#F1F4F5]" >
                        @foreach ($subCategories as $subCategory)
                        <button class="{{$searchedCategory === $subCategory->id ? 'bg-red-800 text-white' : 'bg-[#F1F4F5]' }} font-medium text-xs px-2 sm:px-4 py-1.5 sm:py-2.5  whitespace-nowrap w-full hover:bg-red-800 hover:text-[#F1F4F5] transition-colors duration-150 flex tracking-wide"
                                wire:click.prevent="getProductSub({{$subCategory->id}})">{{$subCategory->name}}</button>
                        @endforeach
                    </div>
                    @endif
                @endforeach
            </div>
        </div>

    </div>

    <div class=" justify-self-end">
        {{ $products->links() }}

    </div>
</div>
