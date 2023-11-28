<x-app-layout>
    <div class="space-y-4">

      @livewire('admin.product-details.name-category', ['product' => $product])
        
      @livewire('admin.product-details.details', ['product' => $product])
    </div>

</x-app-layout>
