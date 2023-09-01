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
                    <div class="items-center flex space-x-3">
                        <div class="flex space-x-10 ">
                            <div class="w-72 shadow-sm shadow-gray-300 shrink-0 bg-white">
                                <div class="h-36 relative">
                                    <img src="{{ asset('images/card bg img.jpg') }}" alt=""
                                        class="absolute -z-10 inset-0 opacity-70">
                                    <img src="{{ asset('/images/My project.png') }}" alt=""
                                        class="w-full h-full object-cover">
                                </div>
                                <div class="py-6 pl-6 pr-10 space-y-4 ">
                                    <h6 class="heading_dark_small whitespace-nowrap ml-4">Product Name</h6>
                                    <div class="flex space-x-4">
                                        <div class="border-l-2 h-full border-separate border-spacing-10 border-black">
                                            <p class="text-xs ml-4 py-2">Lorem ipsum dolor sit amet consectetur
                                                adipisicing
                                                elit.
                                                Harum distinctio omnis iure ex quam ab natus sapiente similique officia,
                                            </p>
                                        </div>
                                    </div>
                                    <a href="" class="text-xs text-red-800 ml-4 font-semibold">Read More</a>
                                </div>
                            </div>
                            <div class="bg-white w-72 shadow-sm shadow-gray-300 shrink-0">
                                <div class="h-36 relative">
                                    <img src="{{ asset('/images/My project.png') }}" alt=""
                                        class="w-full h-full absolute inset-0 z-10 object-cover">
                                </div>
                                <div class="py-6 pl-6 pr-10 space-y-4 ">
                                    <h6 class="heading_dark_small whitespace-nowrap ml-4">Product Name</h6>
                                    <div class="flex space-x-4">
                                        <div class="border-l-2 h-full border-separate border-spacing-10 border-black">
                                            <p class="text-xs ml-4 py-2">Lorem ipsum dolor sit amet consectetur
                                                adipisicing
                                                elit.
                                                Harum distinctio omnis iure ex quam ab natus sapiente similique officia,
                                            </p>
                                        </div>
                                    </div>
                                    <a href="" class="text-xs text-red-800 ml-4 font-semibold">Read More</a>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="space-x-4 flex justify-center w-full">
                        {{-- button_link css at app.css --}}
                        <a href="{{route('products.all')}}" class="bg-red-800 button_link">Browse all our products</a>
                        <a href="#" class="bg-[#929494] button_link">Pump Selection Guide</a>
                    </div>
                </div>
            </section>
            <section class="w-full relative h-full md:h-[900px] overflow-hidden">
                <img src="{{ asset('images/banner2-26.jpg') }}" alt="banner2-26.jpg"
                    class="absolute inset-0 -z-10 w-full h-full object-cover brightness-75">
                <div class="font-roboto space-y-10 px-4 md:px-16 py-44">
                    <h1 class=" uppercase font-black text-white  font-archivo max-w-2xl">See our collection.
                    </h1>
                    <p class="text-[#ffffffc7] text-sm ">Find the documents that have information on your products or that suit your business ventures.
                    </p>
                    <div class="space-x-10 flex">
                        <a href="{{asset('brochures/Eurolube Australia Lubrication Equipment.pdf')}}" target="__blank">
                            <div class="w-56 h-auto overflow-hidden shadow-sm shadow-gray-500">
                                <img src="{{asset('images/banner2-27.jpg')}}" alt="eac" class="w-full h-full object-scale-down">
                            </div>
                        </a>
                        
                    </div>
                </div>
            </section>
        </div>
    </div>



</x-visitor-layout>
