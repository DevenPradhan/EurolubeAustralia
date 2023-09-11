<x-app-layout>
    <div class="space-y-4">
        <h3>{{$product->name}}</h3>
        <div class="flex sm:space-x-3 sm:flex-row flex-col space-y-5 sm:space-y-0">
            <div class="w-1/4 h-auto overflow-hidden">
                <img src="" alt="" class="w-full h-full object-cover">
            </div>
            <div class=" w-1/2">
                <p>
                    {{$product->description}}
                </p>
                <h5>Features:</h5>
                <p class="w-full"></p>
            </div>
            <div class="w-1/4">
                <p>Part No: {{$product->details->part_no}}</p>
                <p>Dimensions: {{$product->details->dimensions}}</p>
                <p>Weight: {{$product->details->weight}}</p>

            </div>
        </div>
    </div>
</x-app-layout>