<x-app-layout>
    @include('flash-message')

    @include('alert')

    <div class="mt-10 container mx-auto flex flex-col space-y-20">
        <a href="{{URL::previous()}}" class="fill-gray-400 hover:fill-black hover:drop-shadow-sm transition-all"><x-icons.arrow-left/></a>
        <div class="">
            <h4>{{$product->name}}</h4>

           @isset($product->detail->part_no)
            {{$product->detail->part_no}}
            @endisset

            {{-- {{$product->product_details->part_no}} --}}
           
        </div>
    </div>

</x-app-layout>