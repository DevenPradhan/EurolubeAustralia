<x-app-layout>

    @include('flash-message')

    @include('alert')

    <div class="w-full container flex flex-col mb-20 items-center space-y-10">
        @livewire('admin.products')

    </div>
</x-app-layout>
