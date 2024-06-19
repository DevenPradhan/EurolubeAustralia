<x-visitor-layout>
    <div class="w-full">
        <div class="container max-w-7xl mx-auto my-10">

            <section class="w-full bg-fixed bg-center relative h-full md:h-[900px]"
                style="background-image: url('\images/banner2-6.jpg'); background-size:1280px; background-repeat:no-repeat">
                <div class="font-roboto space-y-10 px-4 md:px-16 py-44 max-w-2xl">
                    <h1 class=" uppercase font-black text-white  font-archivo">Get to know us</h1>

                    <p class="text-[#ffffffe1] opacity-90 text-sm  max-w-md">
                        Eurolube Australia is an Australian company specializing in the manufacture, distribution, and
                        support of
                        environmentally-friendly products and tailor-made complete and professional solutions for the
                        handling of lubricants and fluids. We provide quality products to partners in more than 40
                        countries.
                        <br><br>
                        Eurolube Australia's greatest strength is our ability to quickly deliver tailor-made solutions.
                        That,
                        simply, is how we contribute to our partners’ efficiency and their profitability.
                    </p>
                    <div class="">
                        <a href="#" class=" bg-red-800 button_link">Download our latest
                            catalogues</a>
                    </div>

                </div>
            </section>


            <section class="relative w-full h-full">
                <img src="{{ asset('images/banner2-17.jpg') }}" alt="topo"
                    class="absolute inset-0 opacity-30 -z-10 w-full h-full object-cover">
                <div class=" pt-32 md:pt-44 pb-20 px-4 md:px-16 w-full space-y-4">
                    <h1 class="font-archivo heading_dark_lg max-w-2xl">What are we all about?</h1>
                    <div class="grid grid-flow-row-dense md:grid-cols-3 gap-4">
                        <div class="bg-[#E7EAEC] px-10 py-8 md:col-span-2 space-y-6">
                            <h5 class="heading_dark_small">Our Mission</h5>
                            <p class=" max-w-md text-zinc-400 text-sm">Developing, manufacturing and supplying products
                                that pump, measure and dose lubricants and fluids, and by delivering these solutions in
                                the most economical and cost-efficient conditions to our partners.
                            </p>
                        </div>

                        <div class="bg-[#E7EAEC] px-10 py-8 row-span-2">
                            <h5 class="heading_dark_small">Our Vision</h5>
                            <p class=" max-w-md text-zinc-400 text-sm mt-5">Eurolube is dedicated to quality solutions
                                and
                                support for the lubricant and fluid handling sector.
                            </p>
                            <img src="https://uploads-ssl.webflow.com/61f361c37ab5da53a16676cf/6202288acaf6c8279d9d80c7_undraw_our_solution_re_8yk6%201.svg"
                                loading="lazy" width="261" alt="" class="mt-5">
                        </div>
                        <div class="bg-[#E7EAEC] px-10 py-8 row-span-2">
                            <h5 class="heading_dark_small">The Customer is our partner</h5>
                            <p class=" max-w-md text-zinc-400 text-sm mt-5">We always strive for long term business
                                relationships.
                            </p>
                            <img src="https://uploads-ssl.webflow.com/61f361c37ab5da53a16676cf/6202281193635a9e72dd06a5_undraw_collaborators_re_hont%201.svg"
                                loading="lazy" width="245" alt="" class="mt-5">
                        </div>
                        <div class="bg-[#E7EAEC] px-10 py-8 space-y-5">
                            <h5 class="heading_dark_small">
                                Commitment and flexibility
                            </h5>
                            <p class="max-w-md text-zinc-400 text-sm">
                                We are recognized for our instant support and our comprehensive interpretation of our
                                partners' needs.
                            </p>
                        </div>
                        <div class="md:col-span-2 bg-[#E7EAEC] px-10 py-8 space-y-5">
                            <h5 class="heading_dark_small">
                                Brief Company History
                            </h5>
                            <p class="max-w-md text-zinc-400 text-sm">
                                In addition to piquing the interest of your target market, a brief company history can
                                help the press talk about your business accurately.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="w-full relative bg-fixed bg-center h-full md:h-[900px] overflow-hidden"
                style="background-image: url('\images/banner2-21.jpg'); background-size:full 900px; background-repeat:no-repeat">
                {{-- <img src="{{ asset('images/banner2-21.jpg') }}" alt="banner12332fs"
                    class="absolute inset-0 -z-10 w-full h-full object-cover contrast-75"> --}}
                <div class="font-roboto space-y-10 px-4 md:px-16 py-44 h-full">
                    <h1 class=" uppercase font-black text-white  font-archivo max-w-2xl">Questions we get a
                        lot
                    </h1>

                    <div class="flex flex-col space-y-4" x-data="{ tab: '' }">
                        <div class="max-w-2xl space-y-2">
                            <button x-on:click.prevent="tab = (tab === 'first_tab') ? '' : 'first_tab'"
                                {{-- x-bind:class= --}}
                                class="flex text-sm  font-semibold w-full items-center justify-between px-4 py-4 bg-white">Are
                                you a wholesaler? <span><x-icons.dropdown-arrow class="w-4" /></span></button>
                            <div class="px-4 py-6 space-y-4 bg-neutral-200" x-show="tab === 'first_tab'" x-transition.duration.300ms>
                                <p class="text-neutral-700 text-sm tracking-wide">We operate as a wholesaler, supplying a
                                    wide range
                                    of products to retailers and businesses. Our focus is on providing quality goods at
                                    competitive prices, supporting our clients' success.</p>
                            </div>
                        </div>
                        <div class="max-w-2xl space-y-2">
                            <button x-on:click.prevent="tab = (tab === 'second_tab') ? '' : 'second_tab'"
                                {{-- x-bind:class= --}}
                                class="flex text-sm  font-semibold w-full items-center justify-between px-4 py-4 bg-white">
                                Do you design your own products too? <span><x-icons.dropdown-arrow
                                        class="w-4" /></span></button>
                            <div class="px-4 py-6 space-y-4 bg-neutral-200" x-show="tab === 'second_tab'" x-transition.duration.300ms>
                                <p class="text-neutral-700 text-sm tracking-wide">Alongside providing an extensive array
                                    of international products, we are dedicated to both quality and innovation. Our
                                    proprietary line of products is specifically crafted to withstand the challenges
                                    posed by our unique climate and usage conditions. Emphasizing durability and
                                    performance in our designs ensures that our products not only meet but surpass the
                                    demands of our environment.
                                </p>
                            </div>
                        </div>
                        <div class="max-w-2xl space-y-2" >
                            <button x-on:click.prevent="tab = (tab === 'third_tab') ? '' : 'third_tab'"
                                {{-- x-bind:class= --}}
                                class="flex text-sm  font-semibold w-full items-center justify-between px-4 py-4 bg-white">
                                Is your product compatible with most other company
                                products?<span><x-icons.dropdown-arrow class="w-4" /></span></button>
                            <div class="px-4 py-6 space-y-4 bg-neutral-200" x-show="tab === 'third_tab'" x-transition.duration.300ms>
                                <p class="text-neutral-700 text-sm tracking-wide">Our product seamlessly integrates with a
                                    wide array
                                    of other company products, making it a versatile and convenient choice for
                                    consumers. This compatibility ensures a hassle-free experience and allows for
                                    enhanced functionality when used in conjunction with various other offerings on the
                                    market.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>


</x-visitor-layout>
