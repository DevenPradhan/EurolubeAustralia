<x-visitor-layout>

    <div class="container mx-auto flex flex-col space-y-3">
        <div class=" self-center">
            <p>All Products</p>
        </div>
        <div class="flex flex-row space-x-10 justify-between">
            <div class="inline-flex">
                <x-input-label value="Category"/>
                <input type="checkbox">
                
            </div>

            <div class="max-w-6xl">
                {{$products->links()}}
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach($products as $product)
                    <div class="flex flex-col space-y-2 p-10">
                        <div class="h-56 w-48 overflow-hidden">
                            @if($product->images->count() == 0)
                           No image found
                           @else
                           <?php $image = $product->images()->latest()->value('image_url'); ?>
                           {{-- @foreach($product->images as $image) --}}
                            <img src="{{asset('storage/images/'.$image)}}" class="object-scale-down w-full h-full">
                            {{-- @endforeach --}}
                            @endif
                        </div>
                        <h3>{{$product->name}}</h3>
                        <p>Quantity: {{$product->quantity}}
                        <br>Part No: {{$product->details->part_no}}</p>
                    </div>

                    @endforeach
                </div>

            </div>
        </div>
        
    </div>
    

</x-visitor-layout>