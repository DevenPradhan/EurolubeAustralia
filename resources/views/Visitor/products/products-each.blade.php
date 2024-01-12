<x-visitor-layout>

    <div class="w-full">
        <div class="container max-w-7xl mx-auto my-10">

            <section class="relative w-full h-full md:min-h-screen sm:bg-[#010123] py-0.5 sm:pl-8 sm:pr-0.5 px-2 my-2">
                <div class="w-full flex justify-center sm:justify-between h-full px-4 md:px-0" >
                    {{-- sidebar --}}
                    @include('Visitor.products.sidebar')
                    {{-- end-sidebar --}}


                    <div class="px-6 pt-20 mx-auto flex flex-col items-center max-w-full sm:w-full bg-white min-h-screen">
                        <div class="w-max text-sm tracking-wider">


                            <h4 class="tracking-wide font-semibold uppercase">{{ $product->name }}</h4>
                            <div class="flex mt-4 justify-between max-w-3xl">
                                <div class="w-52 h-auto">
                                    <img src="{{ asset('storage/products/images/' . $product->images()->first()->url) }}"
                                        alt="" class="w-full h-full object-scale-down">
                                </div>
                                <div class="space-y-5 mt-4 max-w-md px-5 pt-5 text-xs pb-2 bg-gray-200">
                                    <p>{{ $product->description }}</p>
                                    <p>Dimensions: {{ $product->details->dimensions }}</p>
                                    <p>Weight: {{ $product->details->weight }}</p>
                                    <p>Part No: {{ $product->details->part_no }}</p>

                                </div>
                            </div>
                            <div class="max-w-3xl">
                                <h5>Features:</h5>
                                <div class="mt-2 px-5 py-2 bg-gray-200">
                                    @foreach ($product->features as $feature)
                                        <p class="p-2">{!! $feature->feature !!}</p>
                                    @endforeach
                                </div>


                            </div>





                        </div>
                    </div>

                </div>

            </section>

            <section class="w-full relative h-full md:h-[900px] overflow-hidden bg-fixed bg-center bg-cover"
                style="background-image: url('/images/banner2-26.jpg'); background-repeat:no-repeat">
                {{-- <img src="{{ asset('images/banner2-26.jpg') }}" alt="banner2-26.jpg"
                    class="absolute inset-0 -z-10 w-full h-full object-cover brightness-75"> --}}
                <div class="font-roboto space-y-10 px-4 md:px-16 py-44 text-[#ffffffc7]">
                    <h1 class=" uppercase font-black text-white  font-archivo max-w-2xl">See our collection.
                    </h1>
                    <p class=" text-sm ">Find the documents that have information on your products or
                        that suit your business ventures.
                    </p>
                    <div class="flex space-x-5">
                        <a href="{{ asset('brochures/Eurolube Australia Lubrication Equipment.pdf') }}"
                            target="__blank">
                            <div class="w-56 h-auto overflow-hidden shadow-sm shadow-gray-500">
                                <img src="{{ asset('images/Eurolube Australia Lubrication Equipment.jpg') }}"
                                    alt="eac" class="w-full h-full object-scale-down">
                            </div>

                        </a>
                        <a href="{{ route('downloads') }}">
                            <div
                                class="group space-y-6 flex flex-col justify-between h-full w-60 p-5 backdrop-brightness-50 hover:bg-opacity-80 hover:bg-red-800 transition-all">
                                <p class="text-sm max-w-md font-normal tracking-wider leading-5">Explore our extensive
                                    list of
                                    products that you might find intriguing, all geared towards improving efficiency,
                                    reducing environmental impact, and increasing your profitability. You can view all
                                    our products, catalogues, and tech sheets online or download a copy today.</p>
                                <div class="flex items-center">
                                    <p>See Downloads</p>
                                    <x-icons.slider-right class="fill-[#ffffffc7] w-8" />
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>



</x-visitor-layout>
