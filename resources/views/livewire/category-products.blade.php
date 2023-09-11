<div class="">
    <div class="max-w-5xl grid grid-flow-row md:grid-cols-4 place-items-center">
        @foreach ($products as $product)
            <a href="{{ route('products.show', $product->id) }}">
                <div class="h-60 w-48 bg-gray-200">
                    <div class="p-2 h-40 overflow-hidden">
                        <img src="" alt="" class="h-full w-full object-cover">
                    </div>
                    <div class="p-4 w-full flex flex-col items-center">
                        <h6 class="tracking-wide text-base">{{ $product->name }}</h6>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
