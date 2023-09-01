<x-visitor-layout>
    <div class="w-full">
        <div class="container max-w-7xl mx-auto my-10">

            <section class="w-full relative h-full md:h-[900px]">
                <img src="{{ asset('images/banner2-6.jpg') }}" alt="fdshajkfdshf1212"
                    class="absolute inset-0 -z-10 w-full h-full object-cover">
                <div class="font-roboto space-y-10 px-4 md:px-16 py-44 max-w-2xl">
                    <h1 class=" uppercase font-black text-white  font-archivo">Get to know us</h1>

                    <p class="text-[#ffffffe1] opacity-90 text-sm  max-w-md">
                        Eurolube is a Swedish company specializing in the manufacture, distribution, and support of
                        environmentally-friendly products and tailor-made complete and professional solutions for the
                        handling of lubricants and fluids. We provide quality products to partners in more than 40
                        countries.
                        <br><br>
                        Eurolube’s greatest strength is our ability to quickly deliver tailor-made solutions. That,
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
            <section class="w-full relative h-full md:h-[900px] overflow-hidden">
                <img src="{{ asset('images/banner2-21.jpg') }}" alt="banner12332fs"
                    class="absolute inset-0 -z-10 w-full h-full object-cover contrast-75">
                <div class="font-roboto space-y-10 px-4 md:px-16 py-44">
                    <h1 class=" uppercase font-black text-white  font-archivo max-w-2xl">Questions we get a
                        lot
                    </h1>

                    <div class="flex flex-col space-y-4">
                        <div class="max-w-2xl space-y-2" x-data="{ tab : ''}">
                            <button x-on:click.prevent="tab = (tab === 'first_tab') ? '' : 'first_tab'"
                                {{-- x-bind:class= --}}
                                class="flex text-sm  font-semibold w-full items-center justify-between px-4 py-4 bg-white">Questions
                                that people ask a lot on the phone or in an email <span><x-icons.dropdown-arrow
                                        class="w-4" /></span></button>
                            <div class="p-4 space-y-4 bg-neutral-200 font-neutral-400" x-show="tab === 'first_tab'">
                                <p class="text-sm font-semibold">Answer Title</p>
                                <p class="text-neutral-400 text-sm ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae ea necessitatibus
                                    natus corporis delectus! Incidunt, odio, dolore quaerat cupiditate voluptatum
                                    reiciendis dolorum dolorem possimus quo assumenda et id totam numquam.</p>
                            </div>
                        </div>
                        <div class="max-w-2xl space-y-2" x-data="{ tab : ''}">
                            <button x-on:click.prevent="tab = (tab === 'second_tab') ? '' : 'second_tab'"
                                {{-- x-bind:class= --}}
                                class="flex text-sm  font-semibold w-full items-center justify-between px-4 py-4 bg-white">Questions
                                that people ask a lot on the phone or in an email <span><x-icons.dropdown-arrow
                                        class="w-4" /></span></button>
                            <div class="p-4 space-y-4 bg-neutral-200 font-neutral-400" x-show="tab === 'second_tab'">
                                <p class="text-sm font-semibold">Answer Title</p>
                                <p class="text-neutral-400 text-sm ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae ea necessitatibus
                                    natus corporis delectus! Incidunt, odio, dolore quaerat cupiditate voluptatum
                                    reiciendis dolorum dolorem possimus quo assumenda et id totam numquam.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>


</x-visitor-layout>
