<x-visitor-layout class="layout">
    <div class="w-full">
        <div class="container max-w-7xl mx-auto my-10 text-sm">
            <section class="w-full relative h-full md:min-h-screen">
                <img src="{{ asset('images/banner2-17.jpg') }}" alt="banner2-17.jpg"
                    class="absolute inset-0 -z-10 w-full h-full object-cover opacity-30">

                <div class=" py-40 px-4 md:px-16 space-y-10">
                    <h4>{{ $product->name }}</h4>
                    <div class="flex justify-between max-w-3xl">
                        <div class="w-48 h-auto">
                            <img src="{{ asset('storage/products/images/' . $product->images()->first()->url) }}"
                                alt="" class="w-full h-full object-scale-down">
                        </div>
                        <div class="space-y-5 max-w-md">
                            <p>Description: {{ $product->description }}</p>
                            <p>Dimensions: {{ $product->details->dimensions }}</p>
                            <p>Weight: {{ $product->details->weight }}</p>
                            <p>Part No: {{ $product->details->part_no }}</p>

                        </div>
                    </div>
                    <div class="flex justify-between max-w-3xl">
                        <div class="">
                            <h5>Features:</h5>
                            @foreach ($product->features as $feature)
                                <p class="p-2">{!! $feature->feature !!}</p>
                            @endforeach
                        </div>

                    </div>


                </div>
                <div class="">
                    <h5>Similar Products</h5>
                </div>
            </section>
        </div>
    </div>
</x-visitor-layout>
