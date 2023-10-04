<x-visitor-layout>

    <div class="w-full">
        <div class="container max-w-7xl mx-auto my-10">
            <section class="w-full relative h-[750px] md:h-[900px]">
                <img src="{{ asset('images/serv.jpg') }}" alt="serv.jpg"
                    class="absolute inset-0 -z-10 w-full h-full object-cover object-left brightness-75">

                <div class="py-44 px-4 md:px-16">
                    <h1 class=" uppercase max-w-xl font-black text-white font-archivo">Check out <br>our solutions</h1>
                    <p class="text-sm tracking-wide mt-5 text-[#ffffffc7] max-w-lg">Here is a showcase of various
                        installation scenarios for our products for safe and rational handling of oil, grease and other
                        fluids.</p>
                    <div class="w-full h-72 sm:h-96 md:h-[550px] mt-10 md:mt-20 z-20 shrink-0 overflow-hidden">
                        <img src="{{ asset('images/16890567731.jpg') }}" alt="16890567731.jpg"
                            class="w-auto h-full object-cover drop-shadow-lg ">
                    </div>
                </div>

            </section>

            <section class="relative w-full h-full md:h-[900px]">
                <img src="{{ asset('images/banner2-17.jpg') }}" alt="topo"
                    class="absolute inset-0 opacity-30 -z-40 w-full h-full object-cover ">
                <div class="py-28 px-4 md:px-16 space-y-10">
                    <p class="text-sm text-[#252f33] ">Oil Distribution System installed at a bus and truck workshop
                        in Norway. Fully equipped with
                        Eurolube Pumps, oil and grease hose reels and the LUBE-master OIl monitoring system.</p>
                    <div class="flex space-x-3 ml-10">
                        <div class="flex flex-col space-y-3 items-end">
                            <div class="relative mt-20 h-max w-max group">
                                <img src="{{ asset('images/gear-10.jpg') }}" alt=""
                                    class="w-auto h-52 object-scale-down">
                                <button class="services_absolute_text top-0 w-40 -left-10">
                                    Hose reel for Grease, complete with grease gun and shut-off valve.</button>
                            </div>
                            <div class="w-60 relative flex justify-end group">
                                <img src="{{ asset('images/gear-7.jpg') }}" alt="" class="w-48 h-auto">
                                <button class="services_absolute_text top-0 w-40 -left-10">
                                    Hose reel for Grease, complete with grease gun and shut-off valve.</button>
                            </div>
                        </div>
                        <div class="">
                            <div class="flex flex-col space-y-5">
                                <div class="w-72 h-max relative group">
                                    <img src="{{ asset('images/gear-12.jpg') }}" alt=""
                                        class="w-full h-44 object-cover">
                                    <button class="services_absolute_text w-36 -right-10 top-0">Controller, meters,
                                        starts and stops the flow of fluids.</button>
                                </div>
                                <div class="flex space-x-3">
                                    <div class="relative w-52 group">
                                        <img src="{{ asset('images/gear-9.jpg') }}" alt="" class="w-72 h-auto">
                                        <button class="services_absolute_text w-32 bottom-0 -right-10 ">LUBE-Master
                                            Keypad, for ordering fluids.</button>
                                    </div>
                                    <div class="relative h-56 group">
                                        <img src="{{ asset('images/gear-11.jpg') }}" alt="" class="w-auto h-52">
                                        <button class="services_absolute_text right-0 bottom-0 w-28">LUBE-Master Meter
                                            Module for Oil.</>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <section class="w-full relative h-full md:h-[900px] overflow-hidden">
                <img src="{{ asset('images/containers.jpg') }}" alt="banner2-26.jpg"
                    class="absolute inset-0 -z-10 w-full h-full object-cover brightness-75">

            </section>
        </div>
    </div>



</x-visitor-layout>
