<x-app-layout>
    <div class="w-full container flex flex-col items-center space-y-10">
        @include('User.sidebar')

        @livewire('categories')
    </div>

</x-app-layout>
