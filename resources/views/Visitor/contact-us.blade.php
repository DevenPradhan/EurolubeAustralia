<x-visitor-layout>
    <div class="w-full">
        <div class="container max-w-7xl mx-auto my-10">
            <section class="w-full relative h-full md:h-[900px]">
                <img src="{{ asset('images/banner2-31.jpg') }}" alt="public/images/banner2-31.jpg"
                    class="absolute inset-0 -z-10 w-full h-full object-cover">
                <div class="font-roboto space-y-10 px-4 md:px-16 py-44 max-w-2xl">
                    <h1 class=" uppercase font-black text-white  font-archivo">How to find us</h1>

                    <div class="">
                        <a href="#" class=" bg-red-800 button_link">Find us in google maps</a>
                    </div>

                </div>
            </section>


            <section class="relative w-full h-full">
                <img src="{{ asset('images/banner2-17.jpg') }}" alt="topo"
                    class="absolute inset-0 opacity-30 -z-10 w-full h-full object-cover">
                <div class=" pt-32 md:pt-44 pb-20 px-4 md:px-16 w-full space-y-10">
                    <h1 class="font-archivo heading_dark_lg max-w-2xl">Our Contact Details...</h1>
                    <div class="space-y-5">
                        <div class="space-y-1.5">
                            <p class="text-[#252f33] uppercase font-medium text-sm">Address</p>
                            <p class="text-zinc-400 text-sm">Unit 2, 1146 Abernethy Rd
                                <br>
                                High Wycombe WA 6057
                            </p>
                        </div>
                        <div class="space-y-1.5">
                            <p class="text-[#252f33] uppercase font-medium text-sm">Phone</p>
                            <p class="text-zinc-400 text-sm">+61 (08) 6336 9369
                            </p>
                        </div>
                        <div class="space-y-1.5">
                            <p class="text-[#252f33] uppercase font-medium text-sm">Email</p>
                            <p class="text-zinc-400 text-sm">info@eurolube.com.au
                            </p>
                        </div>
                        
                    </div>
                    <div class="space-x-4 flex w-full">
                        {{-- button_link css at app.css --}}
                        <a href="#" class="bg-red-800 button_link">Contact Us Today</a>
                        <a href="#" class="bg-[#929494] button_link">Get direction</a>
                    </div>
                </div>
            </section>
            <section class="w-full relative h-full md:h-[900px] overflow-hidden">
                <img src="{{ asset('images/banner2-26.jpg') }}" alt="banner12332fs"
                    class="absolute inset-0 -z-10 w-full h-full object-cover contrast-75">
                    <img src="{{asset('images/Shutterstock_3571714.png')}}" alt="Shutterstock_3571714.png" class="absolute max-w-4xl h-auto object-scale-down opacity-50 right-20 bottom-0">
                <div class="font-roboto space-y-10 px-4 md:px-16 py-44">
                    <h1 class=" uppercase font-black text-white  font-archivo max-w-2xl">Pinpoint a city
                    </h1>

                   

                </div>
            </section>
        </div>
    </div>
</x-visitor-layout>