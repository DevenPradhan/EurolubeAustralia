<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{asset('images/ela icon.png')}}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
   
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <livewire:styles />
</head>

<body class="font-sans text-gray-900 antialiased font-roboto tracking-wide">
    <div class="max-w-6xl container flex flex-row space-x-10 justify-between py-10 bg-gray-100 mx-auto">
        <div class="shrink-0">
            <a href="{{ route('/') }}">
                <img src="{{ asset('images/eurolube_australia_colour.png') }}" alt="logo" class="w-60 h-full">
            </a>
        </div>
        <div
            class="hidden md:flex flex-row space-x-4 uppercase font-semibold text-lg text-[##252f33] items-center justify-evenly whitespace-nowrap">
           
            <a href="{{route('about.us')}}" class="nav-titles">
                About us
            </a>
            <a href="{{ route('view_products') }}" class="nav-titles ">
                Products
            </a>
            <a href="{{route('services')}}" class="nav-titles">
                Services
            </a>
            <a href="{{route('downloads')}}" class="nav-titles">
                Downloads
            </a>
            <a href="{{route('news.blogs')}}" class="nav-titles">
                News/Blog
            </a>
            <a href="{{route('contact.us')}}" class="nav-titles">
                Contact Us
            </a>
        </div>
        <div class="">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class=" font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
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
        <button type="button"
        class="max-w-max p-2 hidden bg-gray-100 md:hidden shadow-md text-black rounded-sm fixed bottom-20 left-10 z-50"
        id="page-up">
        <x-icons.page-up />
    </button>
    </div>
    <main>
        {{ $slot }}
    </main>
    <footer class="max-w-7xl container mx-auto">
        <div class="p-16 space-y-20 text-neutral-400 text-sm ">
            <div class="">
                <h5 class="font-bold text-[#33333380] font-archivo">Would you like to receive our regural news & special
                    updates? Join our monthly newsletter!</h5>
                    <div class="flex flex-col space-y-8 sm:space-y-0 sm:items-end  sm:flex-row sm:space-x-6 justify-between mt-8">
                        <div class="grid grid-cols-2 w-full gap-2.5 max-w-xl">
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
                                class=" bg-red-800 button_link text-sm max-w-max">sign up</a>
                        </div>
                        <div class="grid grid-flow-col gap-5 place-items-center max-w-max sm:w-full">
                            <a href="https://www.facebook.com/EurolubeInfo" target="__blank">
                                <img src="{{asset('images/facebook.png')}}" alt="fb" class="w-8 h-auto">
                            </a>
                            <a href="https://www.linkedin.com/company/eurolube-australia/" target="__blank">
                                <img src="{{asset('images/linkedin.png')}}" alt="In" class="w-8 h-auto">
                            </a>
                            {{-- <a href="#" target="__blank">
                                <img src="{{asset('images/instagram.png')}}" alt="Insta" class="w-8 h-auto">
                            </a> --}}
                            <a href="https://twitter.com/EurolubeInfo" target="__blank">
                            <img src="{{asset('images/twitter-x.png')}}" alt="X" class="w-8 h-auto"></a>
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
                <div class="space-y-3  flex flex-col">
                    <p class="text-[#33333380] font-semibold uppercase">Resources</p>
                    <a href="#">FAQ</a>
                    <a href="#">Downloads</a>
                    <a href="#">Solutions</a>
                    <a href="#">Branding</a>
                    <a href="#">Products</a>
                </div>
                <div class="space-y-3  flex flex-col">
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
    <livewire:scripts />
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

<script>
    window.addEventListener("scroll", function(){
        var pageUpIcon = document.getElementById('page-up');
        var scrollThreshold = 160;

        if(window.pageYOffset > scrollThreshold){
            pageUpIcon.classList.remove('md:hidden');
            pageUpIcon.classList.add('md:block');
        }
        else{
            pageUpIcon.classList.add('md:hidden');
            pageUpIcon.classList.remove('md:block');
        }
    });

    $(document).ready(function(){
        $('#page-up').click(function(){
            $('html, body').animate({
                scrollTop: 0
            }, 'slow');
            });
        });
</script>

</html>
