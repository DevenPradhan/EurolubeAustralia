<x-visitor-layout>

    <div class="w-full">
        <div class="container max-w-7xl mx-auto my-10">

            <section class="relative w-full h-full md:min-h-screen sm:bg-[#010123] py-0.5 sm:pr-0.5 px-2 my-2">
                <div class="w-full flex justify-center sm:justify-between h-full px-4 md:px-0">
                    {{-- sidebar --}}
                    @include('Visitor.products.sidebar')
                    {{-- end-sidebar --}}


                    <div class="bg-white min-h-screen sm:w-full pt-32 sm:px-20 ">
                        <div class="space-y-3">
                            <h5 class="font-semibold tracking-wide">{{ $product->name }}</h5>
                            <div class="w-full relative py-6 h-44  text-white">
                                <div class="z-20 relative pr-48 space-y-1.5">
                                    <h6 class=" text-base">Part No: {{ $product->details->part_no }}</h6>
                                    <p class=" text-xs tracking-widest">{{ $product->description }}</p>
                                </div>

                                <div class="bg-[#AC0000] inset-0 -left-20 z-10 absolute h-full w-full dynamic_bg">
                                </div>
                                <img src="{{ asset('storage/products/images/' . $product->images()->first()->url) }}"
                                    alt="" class="w-32 h-full z-0 object-scale-down absolute -right-7 bottom-3">
                            </div>

                        <p class="font-medium text-sm tracking-widest">{{ $product->details->dimensions }} /
                            {{ $product->details->weight }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-20 mt-20">
                            @foreach($product->features as $feature)
                            <div class="font-medium trackingw-wider text-sm leading-6">{!!$feature->feature!!}</div>
                            @endforeach
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

    <style>
        @media screen and (min-width: 768px) {
            .dynamic_bg {
                clip-path: polygon(0% 0%, 85% 0%, 100% 100%, 0% 100%);
            }
        }
    </style>


</x-visitor-layout>
