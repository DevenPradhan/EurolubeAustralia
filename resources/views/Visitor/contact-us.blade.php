<x-visitor-layout>
    <div class="w-full">
        <div class="container max-w-7xl mx-auto my-10">
            <section class="w-full relative h-full md:h-[900px]">
                <img src="{{ asset('images/banner2-31.jpg') }}" alt="public/images/banner2-31.jpg"
                    class="absolute inset-0 -z-10 w-full h-full object-cover">
                <div class="font-roboto space-y-10 px-4 md:px-16 py-44 max-w-2xl">
                    <h1 class=" uppercase font-black text-white  font-archivo">How to find us</h1>

                    <div class="">
                        <a href="https://www.google.com/maps/place/2%2F1146+Abernethy+Rd,+High+Wycombe+WA+6057/@-31.9341828,115.9936982,17z/data=!3m1!4b1!4m5!3m4!1s0x2a32b90287572c79:0xc7a4d30827b4404f!8m2!3d-31.9341828!4d115.9936982?entry=ttu"
                            class=" bg-red-800 button_link" target="__blank">Find us in google maps</a>
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
            <section class="w-full relative h-[600px] md:h-[900px] overflow-hidden" x-data="{ city: 'perth' }">
                <img src="{{ asset('images/banner2-26.jpg') }}" alt="banner12332fs"
                    class="absolute inset-0 -z-10 w-full h-full object-cover contrast-75 brightness-75">

                <img src="{{ asset('images/ausmap.png') }}" alt="ausmap.png"
                    class="absolute max-w-md md:max-w-3xl h-auto object-scale-down opacity-75 right-10 bottom-16">

                <div class="absolute right-[85px] bottom-[268px]" x-bind:class="{ 'dot_active': city === 'sydney' }">
                    <button class="dot mx-1" x-on:click.prevent="city = 'sydney'"></button>
                </div><!-- Sydney -->
                <div class="absolute right-[200px] bottom-[188px]"
                    x-bind:class="{ 'dot_active': city === 'melbourne' }">
                    <button class="dot mx-1" x-on:click.prevent="city = 'melbourne'"></button>
                </div><!-- Melbourne -->
                <div class="absolute right-[45px] bottom-[400px]" x-bind:class="{ 'dot_active': city === 'brisbane' }">
                    <button class="dot mx-1" x-on:click.prevent="city = 'brisbane'"></button>
                </div><!-- Brisbane -->
                <div class="absolute right-[160px] bottom-[70px]" x-bind:class="{ 'dot_active': city === 'hobart' }">
                    <button class="dot mx-1" x-on:click.prevent="city = 'hobart'"></button>
                </div><!-- Hobart -->
                <div class="absolute right-[752px] bottom-[310px]" x-bind:class="{ 'dot_active': city === 'perth' }">
                    <button class="dot mx-1" x-on:click.prevent="city = 'perth'"></button>
                </div><!-- Perth -->
                <div class="absolute right-[757px] bottom-[282px]" x-bind:class="{ 'dot_active': city === 'bunbury' }">
                    <button class="dot mx-1" x-on:click.prevent="city = 'bunbury'"></button>
                </div><!-- Bunbury -->


                <div
                    class=" top-[60%] -left-32 absolute z-10 flex space-x-4 w-max items-start h-max text-zinc-400 -rotate-90">
                    <button class="hover:text-white" x-on:click.prevent="city = 'sydney'"
                        x-bind:class="{ 'text-white': city === 'sydney' }">Sydney</button>
                    <button class="hover:text-white" x-on:click.prevent="city = 'melbourne'"
                        x-bind:class="{ 'text-white': city === 'melbourne' }">Melbourne</button>
                    <button class="hover:text-white" x-on:click.prevent="city = 'bunbury'"
                        x-bind:class="{ 'text-white': city === 'bunbury' }">Bunbury</button>
                    <button class="hover:text-white" x-on:click.prevent="city = 'brisbane'"
                        x-bind:class="{ 'text-white': city === 'brisbane' }">Brisbane</button>
                    <button class="hover:text-white" x-on:click.prevent="city = 'hobart'"
                        x-bind:class="{ 'text-white': city === 'hobart' }">Hobart</button>
                    <button class="hover:text-white" x-on:click.prevent="city = 'perth'"
                        x-bind:class="{ 'text-white': city === 'perth' }">Perth</button>
                </div>

                <div class="font-roboto space-y-10 px-4 md:px-16 py-16 md:py-44">

                    <h1 class=" uppercase font-black text-white  font-archivo max-w-md">Pinpoint <br> a city
                    </h1>
                    <div class="flex text-[#ffffffc7] ml-20 text-sm">
                        <p x-show="city === 'perth'">Located in the heart of Perth, <br>
                            High Wycombe WA 6057
                            <br>
                            <br>
                            Our Head Office
                        </p>
                        <p x-show="city === 'brisbane'">Richard Beare, <br>
                            <br>
                            <br>
                            Brisbane Regional Office
                        </p>
                        <p x-show="city === 'bunbury'">Located in the heart of Perth, <br>
                            High Wycombe WA 6057
                            <br>
                            <br>
                            Our Head Office
                        </p>
                        <p x-show="city === 'hobart'">Located in the heart of Perth, <br>
                            High Wycombe WA 6057
                            <br>
                            <br>
                            Our Head Office
                        </p>
                        <p x-show="city === 'melbourne'">Located in the heart of Perth, <br>
                            High Wycombe WA 6057
                            <br>
                            <br>
                            Our Head Office
                        </p>
                        <p x-show="city === 'sydney'">Located in the heart of Perth, <br>
                            High Wycombe WA 6057
                            <br>
                            <br>
                            Our Head Office
                        </p>
                    </div>



                </div>
            </section>
        </div>
    </div>
</x-visitor-layout>
