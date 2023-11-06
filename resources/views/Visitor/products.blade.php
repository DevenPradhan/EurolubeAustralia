<x-visitor-layout>

    <div class="w-full">
        <div class="container max-w-7xl mx-auto my-10">
            <section class="w-full relative h-full md:h-[900px] bg-fixed bg-center overflow-clip "
                style="background-image: url('/images/banner2-24.jpg'); background-size:1280px">

                {{-- <img src="{{asset('images/banner2-24.jpg')}}" alt="" class="w-full h-full object-cover absolute -z-20 inset-0 "> --}}
                <div class="py-44 px-4 md:px-16 space-y-20 backdrop-brightness-50 h-full">
                    <h1 class=" uppercase max-w-2xl font-black text-white font-archivo">Get the best from Eurolube</h1>
                    <div class="max-w-2xl h-auto">
                        <img src="{{ asset('images/banner2-25.jpg') }}" alt="banner2-25.jpg"
                            class="w-full h-full object-scale-down">
                    </div>
                </div>
            </section>

            <section class="relative w-full h-full md:min-h-screen " x-data="{ isFocused: false}" 
                    x-init="$nextTick(() => $refs.mySection.focus())"
                    >
                <img src="{{ asset('images/banner2-17.jpg') }}" alt="topo"
                    class="absolute inset-0 opacity-20 -z-40 w-full h-full object-cover ">
                <div class="w-full flex justify-center sm:justify-between h-full py-6 px-4 md:px-0" x-ref="mySection">
                    <div
                        class="space-y-6 w-72 shrink-0 hidden sm:flex flex-col p-10 h-full pb-60 bg-[#010123] text-[#ffffffe5] text-sm">
                        <?php 

                        ?>

                        @foreach ($categories as $key => $category)
                            <a class=" text-start" href="{{ route('products.all', $category) }}">
                                {{ $category }}
                            </a>
                            @if (isset($url) && $url === $category)
                                <div class="space-y-4 ml-3">
                                    @foreach (App\Models\ProductCategory::where('referencing', $key)->get() as $subCategories)
                                        <a href="{{ route('products.all', $subCategories->name) }}"
                                            class="text-sm ">{{ $subCategories->name }}</a>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="px-6 py-20 w-3/4 place-content-center flex">
                        <div
                            class="grid grid-flow-row lg:grid-cols-2 w-max text-sm tracking-wider  text-[#ffffffe5] gap-10 place-content-start">

                            @foreach($listedEntry as $entry)

                            <p class="text-black">
                            {{$entry->name}}

                            </p>

                            @endforeach
                            {{-- @isset($getCategories)

                                <p class="text-black">hi</p>
                            @else
                                <p class="text-red-400">ni</p>
                            @endisset --}}


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
