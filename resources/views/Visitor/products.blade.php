<x-visitor-layout>

    <div class="w-full">
        <div class="container max-w-7xl mx-auto my-10">
            <section class="w-full relative h-full md:h-[900px]">
                <img src="{{ asset('images/banner2-24.jpg') }}" alt="banner2-24.jpg"
                    class="absolute inset-0 -z-10 w-full h-full object-cover object-left brightness-75">

                <div class="py-44 px-4 md:px-16 space-y-20 ">
                    <h1 class=" uppercase max-w-2xl font-black text-white font-archivo">Get the best from Eurolube</h1>
                    <div class="max-w-2xl h-auto">
                        <img src="{{ asset('images/banner2-25.jpg') }}" alt="banner2-25.jpg"
                            class="w-full h-full object-scale-down">
                    </div>
                </div>
            </section>

            <section class="relative w-full h-full">
                <img src="{{ asset('images/banner2-17.jpg') }}" alt="topo"
                    class="absolute inset-0 opacity-30 -z-40 w-full h-full object-cover ">
                <div class="w-full py-44 px-4 md:px-16 max-w-2xl space-y-10">
                    <h1 class="heading_dark_lg font-archivo ">Featured Products</h1>
                    {{-- slider products --}}
                    @livewire('guest.featured-products')
                    <div class="space-x-4 flex justify-center w-full">
                        {{-- button_link css at app.css --}}
                        <a href="{{ route('products.all') }}" class="bg-red-800 button_link">Browse all our products</a>
                        <a href="https://www.eurolube.com/en/pump-selection-guide/"
                            class="bg-[#929494] button_link">Pump Selection Guide</a>
                    </div>
                </div>
            </section>
            <section class="w-full relative h-full md:h-[900px] overflow-hidden">
                <img src="{{ asset('images/banner2-26.jpg') }}" alt="banner2-26.jpg"
                    class="absolute inset-0 -z-10 w-full h-full object-cover brightness-75">
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
                                <p class="text-sm max-w-md font-normal tracking-wider leading-5">Explore our extensive list of
                                    products that you might find intriguing, all geared towards improving efficiency,
                                    reducing environmental impact, and increasing your profitability. You can view all
                                    our products, catalogues, and tech sheets online or download a copy today.</p>
                                <div class="flex items-center">
                                    <p>See Downloads</p>
                                    <x-icons.slider-right class="fill-[#ffffffc7] w-8"/>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>



</x-visitor-layout>
