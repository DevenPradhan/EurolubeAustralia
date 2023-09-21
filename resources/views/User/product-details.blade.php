<x-app-layout>
    <div class="space-y-4">
        <h4 class="tracking-wide">{{ $product->name }}</h4>
        <div class="inline-flex space-x-4">
         <button class="px-2 py-1 shadow opacity-75">
           {{ $product->category->name }}
         </button>
        </div>
        
        
        @livewire('admin.product-details', ['product' => $product])
    </div>

</x-app-layout>
