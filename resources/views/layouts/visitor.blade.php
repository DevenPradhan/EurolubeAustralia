<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased font-roboto">
    <div class="max-w-6xl container flex flex-row space-x-10 justify-between py-10 bg-gray-100 mx-auto">
        <div class="shrink-0">
            <a href="{{ route('/') }}">
                <img src="{{ asset('images/eurolube_australia_colour.png') }}" alt="logo" class="w-60 h-full">
            </a>
        </div>
        <div
            class="flex flex-row space-x-4 uppercase  font-semibold text-lg text-[##252f33] items-center justify-evenly whitespace-nowrap">
            <a href="/">
                About us
            </a>
            <a href="{{ route('view_products') }}">
                Products
            </a>
            <a href="#">
                Services
            </a>
            <a href="#">
                Downloads
            </a>
            <a href="#">
                Contact Us
            </a>
        </div>
        <div class="">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

    </div>
    <main>
        {{ $slot }}
    </main>
    <footer class="max-w-7xl container mx-auto">
        <div class="p-16 space-y-20 text-neutral-400 text-sm tracking-wide">
            <div class="">
                <h5 class="font-bold text-[#33333380] font-archivo">Would you like to receive our regural news & special
                    updates? Join our monthly newsletter!</h5>
                    <div class="flex space-x-10 mt-8 max-w-3xl">
                        <div class="grid grid-cols-2 w-full gap-2.5">
                            <x-text-input type="text"
                                class="h-12 ring-0 placeholder-neutral-400 font-light text-sm  bg-neutral-200 rounded-sm border-0 "
                                placeholder="FIRST NAME" />
                            <x-text-input type="text"
                                class="h-12 ring-0 placeholder-neutral-400  bg-neutral-200 rounded-sm border-0 font-light text-sm"
                                placeholder="LAST NAME" />
                            <x-text-input type="text"
                                class="h-12 ring-0 col-span-2 placeholder-neutral-400  bg-neutral-200 rounded-sm border-0 font-light text-sm"
                                placeholder="EMAIL" />
                            <a href="#"
                                class=" bg-red-800 px-8 py-3 text-white uppercase tracking-wide text-sm max-w-max">sign up</a>
                        </div>
                        <div class="grid grid-flow-row md:grid-flow-col p-10  gap-5 md:place-items-center">
                            <a href="#"><x-icons.facebook/></a>
                            <a href="#"><x-icons.linked-in/></a>
                            <a href="#"><x-icons.instagram/></a>
                        </div>
                    </div>
                
            </div>
            <div class="flex space-x-20">
                <div class="max-w-2xl space-y-10 ">
                    <a href="/">
                        <img src="{{ asset('images/logo-f-de.png') }}" alt="" class="w-56 grayscale">
                    </a>
                    <p class="">We are recognized worldwide for our products, systems and solutions for pumping, dispensing and
                        measuring oil, grease, coolants and other comparable fluids.
                        <br><br>
                        Our Products and solutions contributes to a safer better environment with increased efficiency
                        and profitability.
                    </p>
                    <p>Copyright @ Eurolube Australia Pty, Ltd. 2021 - 2023</p>
                </div>
                <div class="space-y-3 tracking-wide flex flex-col">
                    <p class="text-[#33333380] font-semibold uppercase">Resources</p>
                    <a href="#">FAQ</a>
                    <a href="#">Downloads</a>
                    <a href="#">Solutions</a>
                    <a href="#">Branding</a>
                    <a href="#">Products</a>
                </div>
                <div class="space-y-3 tracking-wide flex flex-col">
                    <p class="text-[#33333380] font-semibold uppercase">Company</p>
                    <a href="#">Our Team</a>
                    <a href="#">Location</a>
                    <a href="#">News / Blog</a>
                    <a href="#">Qualifications</a>
                    <a href="#">Legal</a>
                </div>
            </div>
        </div>
    </footer>

</body>

<style>
    .font-roboto {
        font-family: 'Roboto';
        src: url('fonts/Roboto');
    }

    .font-archivo {
        font-family: 'Archivo';
        src: url('fonts/Archivo-SemiBold.ttf');
    }
</style>

</html>
