<x-visitor-layout>

    <div class="w-full">
        <div class="container max-w-7xl mx-auto my-10">


            <section class="relative w-full h-full md:min-h-screen sm:bg-[#010123] py-0.5 sm:pr-0.5 px-2 my-2">
                <div class="w-full flex justify-center sm:justify-between h-full md:px-0">
                    {{-- sidebar --}}
                    @include('Visitor.products.sidebar')
                    {{-- end-sidebar --}}


                    <div class="px-2 py-4  w-full flex justify-center bg-white min-h-screen">
                        <div class="mt-10 place-items-center grid grid-cols-3 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 lg:auto-rows-max lg:grid-flow-row-dense text-sm text-[#010123]  h-max">

                            @foreach ($listedEntry as $subCategory)
                                <a
                                    href="{{ route('searchCategory2', ['category1' => str_replace(' ', '-', $url), 'category2' => str_replace([' ', '/'], '-', $subCategory->name)]) }}">
                                    <div class="group w-48 h-full flex flex-col items-center space-y-2.5 pl-1 pt-1 pb-2 pr-3 border shadow">

                                        {{-- location address for category images --}}
                                        @if (empty($subCategory->category_id))
                                            <img src="{{ asset($subCategory->images()->count() < 1 ? 'images/no-image.jpg' : 'storage/categories/images/' . $subCategory->images()->first()->url) }}"
                                                alt="" class="w-28 h-28 overflow-clip object-cover group-hover:w-36 transition-all">
                                        @else
                                            {{-- location address for product images --}}
                                            <img src="{{ asset($subCategory->images()->count() < 1 ? 'images/no-image.jpg' : 'storage/products/images/' . $subCategory->images()->first()->url) }}"
                                                alt="" class="w-28 h-28 overflow-clip object-cover group-hover:w-36 transition-all">
                                        @endif

                                        <p
                                            class="ml-2 mt-1 font-medium text-center w-full uppercase text-[#010123] text-sm">
                                            {{ $subCategory->name }}</p>
                                    </div>
                                </a>

                               
                            @endforeach
                        </div>
                        {{-- <p class="text-sm form_label mx-6">If goods are wrongly supplied through our negligence we will gladly exchange when returned to our
                            warehouse. However goods returned through the fault of, or not required by, the customer will incur
                            a restocking charge of 20%. <br> We cannot accept for exchange, goods that are damaged, weatherd or used. Goods will not be accepted for return after 7 days. </p> --}}
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
