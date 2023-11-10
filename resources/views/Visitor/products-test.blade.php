<x-visitor-layout>

    <div class="w-full">
        <div class="container max-w-7xl mx-auto my-10">
            <section class="w-full relative h-[800px] md:h-[900px] bg-fixed bg-center overflow-clip"
                style="background-image: url('/images/banner2-24.jpg'); background-size:1280px">

                {{-- <img src="{{asset('images/banner2-24.jpg')}}" alt="" class="w-full h-full object-cover absolute -z-20 inset-0 "> --}}
                <div class="flex flex-col justify-center px-2 md:px-16 space-y-20 backdrop-brightness-50 h-full">
                    <h1 class=" uppercase max-w-2xl font-black text-white font-archivo">Get the best from Eurolube</h1>
                    <div class="max-w-4xl h-auto">
                        <div
                            class="w-full min-w-max h-80 sm:h-96 relative bg-gradient-to-r opacity-90 from-gray-100 to-neutral-800 px-1 sm:px-3 py-10 flex items-center justify-center">
                            <div class="rounded-2xl bg-neutral-800 opacity-20 hover:opacity-50 absolute md:relative left-5 z-10">
                                <x-icons.slider-left class="fill-gray-100 w-7 md:w-10" />
                            </div>
                            <div class="w-full flex justify-center sm:justify-start px-2 sm:px-8 h-60 relative">
                                <div class="bg-white w-52 sm:w-64 md:w-80 h-full px-8 py-8 bg-opacity-60 shrink-0">
                                    <img src="{{ asset('images/ibc.test.png') }}" alt=""
                                        class=" w-full h-full object-contain">
                                </div>
                                <div
                                    class="relative overflow-hidden shrink-0 text-[#fff6f6f8] md:absolute md:top-28 md:left-80 h-full md:h-60 flex flex-col justify-center px-8 sm:px-8 py-6 w-56 sm:w-72 bg-red-800">
                                    <p class=" md:text-lg">3:1 Pump Kit for IBC</p>
                                    <p class="mt-3 text-xs md:text-sm tracking-wider">Our Mobile oil pump kits are designed to meet
                                        any needs of effective dispensing, based on quiet and trouble-free acting 3:1
                                        pumps.</p>
                                        <div class="mt-4">
                                            <a href="#" class="text-sm text-[#fff6f6d7]">Read More</a>
                                        </div>
                                    
                                </div>
                            </div>
                            <div class="rounded-2xl bg-gray-100 opacity-20 hover:opacity-50 absolute md:relative right-5 z-10">
                                <x-icons.slider-right class="fill-neutral-800 w-7 md:w-10" />
                            </div>
                            <div class=""></div>
                        </div>
                        {{-- <img src="{{ asset('images/banner2-25.jpg') }}" alt="banner2-25.jpg"
                            class="w-full h-full object-scale-down"> --}}
                    </div>
                </div>
            </section>

            <section class="relative w-full h-full md:min-h-screen " x-data="{ isFocused: false }" x-init="$nextTick(() => $refs.mySection.focus())">
                <img src="{{ asset('images/banner2-17.jpg') }}" alt="topo"
                    class="absolute inset-0 opacity-20 -z-40 w-full h-full object-cover ">
                <div class="w-full flex justify-center sm:justify-between h-full py-6 px-4 md:px-0" x-ref="mySection">
                    <div
                        class="space-y-5 w-72 shrink-0 hidden sm:flex flex-col p-10 h-full pb-60 bg-[#010123] text-[#ffffffe5] text-sm">
                        <?php
                            $categories = App\Models\ProductCategory::where('level', 1)->pluck('name', 'id');
                        ?>

                        @foreach ($categories as $key => $category)
                            {{-- {{str_contains($url, $category) ? 'Y' : 'N'}} --}}
                            <a class=" text-start py-1 {{ $url === $category && str_contains($url, $category) ? ' border-b  max-w-max' : '' }}"
                                href="{{route('category', str_replace(' ', '-', $category))}}">
                                {{ $category }}
                            </a>

                            {{-- on products home page, categories dropdown will be disabled,
                            if a category is clicked, then subcategories are fetched. Only those
                            category sub-categories are visible. If there are no sub-categories then this dropdown
                            will be hidden --}}
                            @if (str_contains($url, $category) && $subCategories->count() > 0)
                                <div class="space-y-4 ml-3 flex flex-col">
                                    @foreach ($subCategories as $subCategory)
                                        <a href="{{str_replace(' ', '-', $url.'/'.$subCategory->name)}}"
                                            class="text-sm py-1  {{ str_contains($url, $subCategory->name) ? 'border-b max-w-max' : '' }}">
                                            {{ $subCategory->name }}
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>


                    <div class="px-6 py-20 w-3/4 place-content-center flex">
                        <div
                            class="grid grid-flow-row lg:grid-cols-2 w-max text-sm tracking-wider  text-[#ffffffe5] gap-10 place-content-start">
                            
                          
                            @if (isset($listedEntry) && $listedEntry->count() > 0)
                                @foreach ($listedEntry as $entry)
                                    <p class="text-black">
                                        @if ($url == '')
                                            <a
                                                href="">{{ $entry->name }}</a>
                                        @else
                                            <a
                                                href="">{{ $entry->name }}</a>
                                        @endif
                                    </p>
                                @endforeach
                            @else
                                @forelse ($products as $product)
                                    <a class="text-black" href="Equipment-for-Grease/50:1-Pumps-&-Kits">{{ $product->name }}</p>
                                @empty
                                    <p class="text-black">nothing found</p>
                                @endforelse
                            @endif
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
