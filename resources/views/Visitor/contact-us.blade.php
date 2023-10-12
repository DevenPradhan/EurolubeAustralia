<x-visitor-layout>
    <div class="w-full">
        <div class="container max-w-7xl mx-auto my-10">
            <section class="w-full relative h-full md:h-[900px] bg-fixed bg-center bg-cover"
                    style="background-image: url('\images/MAP.jpg'); background-repeat:no-repeat">
                {{-- <img src="{{ asset('images/MAP.jpg') }}" alt="public/images/banner2-31.jpg"
                    class="absolute inset-0 -z-10 w-full h-full object-cover brightness-90"> --}}
                <div class="backdrop-brightness-90 w-full h-full font-roboto space-y-10 px-4 md:px-16 py-44 ">
                    <h1 class=" uppercase font-black text-white  font-archivo">How to find us</h1>

                    <p class="text-sm tracking-wide mt-5 text-[#ffffffc7] max-w-md">We're your trusted destination for
                        fluid technology solutions, specializing in high-quality parts. As authorized distributors of
                        Eurolube Sweden, we pride ourselves on offering top-notch products to meet your needs.
                        <br>
                        <br>
                        To locate us, simply click the button below. It will seamlessly redirect you to Google Maps,
                        guiding you to our address at 1146 Abernethy Road, High Wycombe Wa 6057. Finding us has never
                        been easier! Thank you for choosing us as your fluid technology partner.
                    </p>
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
            <section class="w-full relative h-[600px] md:h-[900px] overflow-hidden bg-fixed bg-center bg-cover"
                style="background-image: url('\images/banner2-26.jpg'); background-repeat:no-repeat"
                x-data="{ city: 'perth' }">

                <div class="w-full h-full backdrop-brightness-75">
                    <img src="{{ asset('images/ausmap.png') }}" alt="ausmap.png"
                        class="absolute max-w-md md:max-w-3xl h-auto object-scale-down opacity-90 right-10 bottom-16">
                    <div class="absolute right-[165px] top-[305px]"
                        x-bind:class="{ 'dot_active': city === 'garbutt' }">
                        <button class="dot mx-1" x-on:click.prevent="city = 'garbutt'"></button>
                    </div>
                    {{-- <div class="absolute right-[85px] bottom-[268px]" x-bind:class="{ 'dot_active': city === 'sydney' }">
                        <button class="dot mx-1 " x-on:click.prevent="city = 'sydney'"></button>
                    </div> --}}
                    {{-- <div class="absolute right-[200px] bottom-[188px]"
                        x-bind:class="{ 'dot_active': city === 'melbourne' }">
                        <button class="dot mx-1" x-on:click.prevent="city = 'melbourne'"></button>
                    </div> --}}
                    {{-- <div class="absolute right-[45px] bottom-[400px]" x-bind:class="{ 'dot_active': city === 'brisbane' }">
                        <button class="dot mx-1" x-on:click.prevent="city = 'brisbane'"></button>
                    </div> --}}
                    {{-- <div class="absolute right-[160px] bottom-[70px]" x-bind:class="{ 'dot_active': city === 'hobart' }">
                        <button class="dot mx-1" x-on:click.prevent="city = 'hobart'"></button>
                    </div> --}}
                    <div class="absolute right-[712px] bottom-[241px]"
                        x-bind:class="{ 'dot_active': city === 'albany' }">
                        <button class="dot mx-1" x-on:click.prevent="city = 'albany'"></button>
                    </div>
                    <div class="absolute right-[752px] bottom-[310px]"
                        x-bind:class="{ 'dot_active': city === 'perth' }">
                        <button class="dot mx-1" x-on:click.prevent="city = 'perth'"></button>
                    </div><!-- Perth -->
                    <div class="absolute right-[757px] bottom-[282px]"
                        x-bind:class="{ 'dot_active': city === 'bunbury' }">
                        <button class="dot mx-1" x-on:click.prevent="city = 'bunbury'"></button>
                    </div><!-- Bunbury -->
                    <div class="absolute right-[772px] bottom-[365px]"
                        x-bind:class="{ 'dot_active': city === 'geraldton' }">
                        <button class="dot mx-1" x-on:click.prevent="city = 'geraldton'"></button>
                    </div><!-- Geraldton -->


                    <div
                        class=" top-[65%] -left-16 absolute z-10 flex space-x-4 w-max items-start h-max text-zinc-400 -rotate-90">
                        <button class="hover:text-white" x-on:click.prevent="city = 'albany'"
                            x-bind:class="{ 'text-white': city === 'albany' }">Albany</button>
                        <button class="hover:text-white" x-on:click.prevent="city = 'garbutt'"
                            x-bind:class="{ 'text-white': city === 'garbutt' }">Garbutt</button>
                        <button class="hover:text-white" x-on:click.prevent="city = 'bunbury'"
                            x-bind:class="{ 'text-white': city === 'bunbury' }">Bunbury</button>
                        {{-- hobart button --}}
                        <button class="hover:text-white" x-on:click.prevent="city = 'perth'"
                            x-bind:class="{ 'text-white': city === 'perth' }">Perth</button>
                        <button class="hover:text-white" x-on:click.prevent="city = 'geraldton'"
                            x-bind:class="{ 'text-white': city === 'geraldton' }">Geraldton</button>
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
                            <p x-show="city === 'geraldton'">
                                Stay updated about our new store in Geraldtown
                            </p>
                            <p x-show="city === 'albany'">
                                Stay updated about our new store in Albany
                            </p>
                            <p x-show="city === 'brisbane'">Richard Beare, <br>
                                <br>
                                <br>
                                Brisbane Regional Office
                            </p>
                            <p x-show="city === 'bunbury'">
                                Stay updated about our new store in Bunbury
                            </p>
                            <p class="" x-show="city === 'garbutt'">
                                Aushose NQ Pty Ltd <br>
                                62 Pilkington St, Garbutt <br>
                                Queensland, 4814
                            </p>
                        </div>



                    </div>
                </div>

            </section>
        </div>
    </div>
</x-visitor-layout>
