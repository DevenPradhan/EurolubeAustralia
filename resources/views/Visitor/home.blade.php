<x-visitor-layout>
    <div class="w-full">
        <div class="container max-w-7xl mx-auto my-10">

            <section class="w-full relative h-full md:h-[900px]">
                <img src="{{ asset('images/banner2-2.jpg') }}" alt="fdshajkhf1212"
                    class="absolute inset-0 -z-10 w-full h-full object-cover object-left">
                <div class="font-roboto space-y-10 px-4 md:px-16 py-44 max-w-2xl">
                    <h1 class=" uppercase font-black text-white  font-archivo">Quality You can trust</h1>

                    <p class="text-[#ffffffc7]  text-sm r max-w-md">
                        We are recognized worldwide for our products, systems and solutions for pumping, dispensing and
                        measuring oil, grease, coolants and other comparable fluids. Our products and solutions
                        contribute to a safer better environment with increased efficiency and profitability. Use our
                        smart search function to find the product you are looking for.
                    </p>
                    <div class="">
                        <a href="#" class=" bg-red-800 button_link">Download our
                            latest
                            catalogues</a>
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
                        <a href="https://www.eurolube.com/en/pump-selection-guide/" class="bg-[#929494] button_link">Download Our Guide</a>
                    </div>
                </div>
            </section>


            {{-- <section class="relative w-full h-full">
                <img src="{{ asset('images/banner2-17.jpg') }}" alt="topo"
                    class="absolute inset-0 opacity-50 -z-10 w-full h-full object-cover ">
                <div class=" py-44 px-4 md:px-16 max-w-2xl space-y-4">
                    <h1 class="uppercase font-black font-archivo text-[#252f3]">Agriculte & Farming</h1>
                    <p class=" bg-[#E7EAEC] px-10 py-4 max-w-md text-zinc-400 text-sm">Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. Quis consequatur, reiciendis cum magni
                        repudiandae ad. Ipsum incidunt necessitatibus adipisci, sint ullam repellat et quibusdam
                        quisquam error voluptatibus cumque, repudiandae veniam?
                    </p>
                    <div class="space-x-4 inline-flex">
                        <a href="#" class="bg-red-800 button_link">Contact Us Today</a>
                        <a href="#" class="bg-[#929494] button_link">Download Our Guide</a>
                    </div>
                </div>
            </section> --}}


            <section class="w-full relative h-full md:h-[900px] overflow-hidden">
                <img src="{{ asset('images/sdfafdsfsdafsdafsd.jpg') }}" alt="banner12332fs"
                    class="absolute inset-0 -z-10 w-full h-full object-cover brightness-50">
                <div class="font-roboto space-y-10 px-4 md:px-16 py-44">
                    <h1 class=" uppercase font-black text-white  font-archivo max-w-2xl">Frequently Used
                        Services...
                    </h1>

                    <div class="my-5 grid max-w-sm md:max-w-4xl text-[#ffffffc7] grid-flow-row md:grid-flow-col gap-4">
                        {{-- <a class="space-y-3 p-5 backdrop-brightness-125 hover:bg-opacity-80 hover:bg-red-800 transition-all"
                            href="#">
                            <h6 class="uppercase text-white text-sm">Our support network</h6>
                            <p class="text-sm font-normal tracking-wider">We make it easier for our customers to choose
                                the right product when chemicals must be
                                pumped. Check our Pump Selection Guide to Choose the chemical to be pumped, and find out
                                what materials are compatible with the selected chemical.</p>
                        </a> --}}
                        <a class="space-y-3 p-5 backdrop-brightness-125 hover:bg-opacity-80 hover:bg-red-800 transition-all"
                            href="{{route('downloads')}}">
                            <h6 class="uppercase text-white text-sm">Catalogues & Tech Sheets</h6>
                            <p class="text-sm font-normal tracking-wider">Here you will find products that improve
                                efficiency, reduce environmental impact and increase your profitability. You can view
                                all our products, catalogues and tech sheets online or download a copy today.</p>
                        </a>
                        <a class="space-y-3 p-5 backdrop-brightness-125 hover:bg-opacity-80 hover:bg-red-800 transition-all"
                            href="https://www.eurolube.com/en/pump-selection-guide/" target="__blank">
                            <h6 class="uppercase text-white text-sm">Pump Selection Guide</h6>
                            <p class="text-sm font-normal tracking-wider">We make it easier for our customers to choose
                                the right product when chemicals must be
                                pumped. Check our Pump Selection Guide to Choose the chemical to be pumped, and find out
                                what materials are compatible with the selected chemical.</p>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>

</x-visitor-layout>
