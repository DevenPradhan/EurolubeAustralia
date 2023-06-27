<x-app-layout>

    @include('flash-message')

    @include('alert')

    <div class="w-full container flex flex-col items-center space-y-10">
        @include('User.sidebar')
       
        @livewire('products')

    </div>
    </div>
</x-app-layout>
