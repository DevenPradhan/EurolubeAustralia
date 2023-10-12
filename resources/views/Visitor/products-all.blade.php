<x-visitor-layout>
    <div class="w-full">
        <div class="container max-w-7xl mx-auto my-10">
            <section class="w-full relative h-full md:min-h-screen">
                <img src="{{ asset('images/banner2-17.jpg') }}" alt="banner2-17.jpg"
                    class="absolute inset-0 -z-10 w-full h-full object-cover opacity-30 ">

                <div class=" py-40 px-4 md:px-16 space-y-10">
                    <h1 class="uppercase font-black font-archivo text-[#252f3] max-w-2xl">Products</h1>
                    @livewire('visitor-products')

                </div>
            </section>
            <section class="w-full relative h-full md:h-[900px] overflow-hidden space-y-10 flex flex-col bg-fixed bg-center"
                    style="background-image:url('\images/banner2-29.jpg')">
                {{-- <img src="{{ asset('images/banner2-29.jpg') }}" alt="banner12332fs"
                    class="absolute inset-0 -z-10 w-full h-full object-cover brightness-75"> --}}
                <div class="font-roboto space-y-10 px-4 md:px-16 py-44 backdrop-brightness-75 h-full flex flex-col justify-between">
                   <div class="">
                    <h1 class=" uppercase font-black text-white font-archivo max-w-2xl">Operation
                    </h1>

                    <div class="my-5 grid max-w-sm md:max-w-3xl text-[#ffffffc7] grid-flow-row md:grid-cols-3 gap-4">
                        <div
                            class="space-y-3 p-5 w-60 bg-neutral-200 bg-opacity-10 hover:bg-opacity-80 hover:bg-red-800 transition-all">
                            <h6 class="uppercase text-white text-sm">Quality</h6>
                            <p class="tracking-wider text-sm">Eurolube delivers high quality turnkey solutions for
                                professional and
                                environmentally-friendly handling of lubricants and fluids.</p>
                        </div>
                        <div
                            class="space-y-3 w-60 p-5 bg-neutral-200 bg-opacity-10 hover:bg-opacity-80 hover:bg-red-800 transition-all">
                            <h6 class="uppercase text-white text-sm">Range</h6>
                            <p class="tracking-wider text-sm">Our complete customized systems include air operated pumps
                                and accessories of its own
                                production, and advanced electronic devices for metering and measuring. </p>
                        </div>
                        <div
                            class="space-y-3 p-5 w-60 bg-neutral-200 bg-opacity-10 hover:bg-opacity-80 hover:bg-red-800 transition-all">
                            <h6 class="uppercase text-white text-sm">Aim</h6>
                            <p class="tracking-wider text-sm">Constantly develop and be able to offer cost effective
                                solutions
                                with cutting edge technology. </p>
                        </div>
                        
                    </div>
                   </div>
                    <div class="">
                        <p
                        class=" text-sm font-normal text-[#ffffffc7] tracking-wider">
                        Eurolube Products are used by companies in the automotive
                        workshops, manufacturing, shipping, mining and agriculture sectors.
                    </p>
                    </div>
                </div>
                
            </section>

        </div>
    </div>
</x-visitor-layout>
