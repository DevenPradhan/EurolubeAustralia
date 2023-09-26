<x-visitor-layout>

    <div class="w-full">
        <div class="container max-w-7xl mx-auto my-10">
            <section class="w-full relative h-full md:h-[900px]">
                <img src="{{ asset('images/serv.jpg') }}" alt="serv.jpg"
                    class="absolute inset-0 -z-10 w-full h-full object-cover object-left brightness-75">

                <div class="py-44 px-4 md:px-16 space-y-5 ">
                    <h1 class=" uppercase max-w-xl font-black text-white font-archivo">Check out <br>our solutions</h1>
                    <p class="text-sm tracking-wide text-[#ffffffc7] max-w-lg">Here is a showcase of various installation scenarios for our products for safe and rational
                        handling of oil, grease and other fluids.</p>
                   
                </div>
            </section>

            <section class="relative w-full h-full md:h-[900px]">
                <img src="{{ asset('images/banner2-17.jpg') }}" alt="topo"
                    class="absolute inset-0 opacity-30 -z-40 w-full h-full object-cover ">
                    <div class="w-5/6 h-auto relative -top-20 z-20">
                        <img src="{{ asset('images/16890567731.jpg') }}" alt="16890567731.jpg"
                            class="w-full h-full object-scale-down">
                    </div>
                
            </section>
            <section class="w-full relative h-full md:h-[900px] overflow-hidden">
                <img src="{{ asset('images/banner2-26.jpg') }}" alt="banner2-26.jpg"
                    class="absolute inset-0 -z-10 w-full h-full object-cover brightness-75">
                <div class="font-roboto space-y-10 px-4 md:px-16 py-44">
                    <h1 class=" uppercase font-black text-white  font-archivo max-w-2xl">See our collection.
                    </h1>
                    <p class="text-[#ffffffc7] text-sm ">Find the documents that have information on your products or
                        that suit your business ventures.
                    </p>
                    <div class="space-x-10 flex">
                        <a href="{{ asset('brochures/Eurolube Australia Lubrication Equipment.pdf') }}"
                            target="__blank">
                            <div class="w-56 h-auto overflow-hidden shadow-sm shadow-gray-500">
                                <img src="{{ asset('images/banner2-27.jpg') }}" alt="eac"
                                    class="w-full h-full object-scale-down">
                            </div>
                        </a>

                    </div>
                </div>
            </section>
        </div>
    </div>



</x-visitor-layout>
