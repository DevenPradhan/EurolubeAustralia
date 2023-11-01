





{{-- <div class="">
    @forelse ($products as $product)
        <div class="w-72 shadow-sm shadow-gray-300 shrink-0 bg-white">
            <div class="h-48 relative">
                <img src="{{ asset('images/card bg img.jpg') }}" alt=""
                    class="absolute -z-10 inset-0 opacity-70">
                <img src="{{ asset('storage/products/images/' . $product->images()->first()->url) }}"
                    alt="" class="w-full h-full object-scale-down">
            </div>
            <div class="py-6 pl-6 pr-10 space-y-4 bg-[#E7EAEC]">
                <h6 class="heading_dark_small ml-4 leading-6 h-12">{{ $product->name }}</h6>
                <div class="flex space-x-4">
                    <div class="border-l-2 h-full border-separate border-spacing-10 border-black">
                        <div class="ml-4 h-24 w-full overflow-hidden leading-4 text-xs tracking-wider font-medium">
                            {!! App\Models\ProductFeature::where('product_id', $product->id)->where('additional', 1)->value('feature') !!}
                        </div>    
                    </div>
                </div>
                <a href="{{route('products-each', $product->id)}}" class="text-xs text-red-800 ml-4 font-semibold">Read More</a>
            </div>
        </div>
    @empty
        Nothing found
    @endforelse
</div> --}}