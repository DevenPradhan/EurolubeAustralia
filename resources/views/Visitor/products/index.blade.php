<x-visitor-layout>

    <div class="w-full">
        <div class="container max-w-7xl mx-auto my-10">
            <section class="w-full relative h-[800px] md:h-[900px] bg-fixed bg-center overflow-clip"
                style="background-image: url('/images/banner2-24.jpg'); background-size:1280px">

                {{-- <img src="{{asset('images/banner2-24.jpg')}}" alt="" class="w-full h-full object-cover absolute -z-20 inset-0 "> --}}
                <div class="flex flex-col justify-center px-2 md:px-16 space-y-20 backdrop-brightness-50 h-full">
                    <h1 class=" uppercase max-w-2xl font-black text-white font-archivo">Get the best from Eurolube
                        Australia</h1>
                    <div class="max-w-4xl h-auto">
                        @livewire('guest.featured-products')
                    </div>
                </div>
            </section>

            <section class="relative w-full h-full px-2 my-2 sm:pl-8 sm:pr-0.5 py-0.5 sm:bg-[#010123]">
                <div class="w-full flex justify-center sm:justify-between h-full">

                    {{-- sidebar --}}
                    @include('Visitor.products.sidebar')
                    {{-- end-sidebar --}}

                    <div class="px-6 py-4 w-full  bg-white min-h-screen flex justify-center">
                        <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 max-w-3xl text-sm gap-12 md:gap-8 text-[#010123] h-max">

                            @foreach ($categories as $category)
                                    <a
                                        href="{{ route('searchCategory1', ['category1' => str_replace(' ', '-', $category->name)]) }}">
                                        <div class="w-56 h-full  space-y-2.5 pl-1 pt-1 pb-2 pr-3 border shadow">
                                            <img src="{{ asset($category->images()->count() < 1 ? 'images/no-image.jpg' : 'storage/categories/images/' . $category->images()->first()->url) }}"
                                                alt="" class="w-52 h-44 object-cover ">
                                            <p
                                                class="ml-2 mt-1 font-medium text-center w-full uppercase text-[#010123] text-sm">
                                                {{ $category->name }}</p>
                                        </div>
                                    </a>
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



</x-visitor-layout>
