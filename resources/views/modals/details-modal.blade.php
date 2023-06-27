<x-modal name="details-modal" :show="$errors->editModal->isNotEmpty()" focusable maxWidth="3xl">
    <div class="p-10 space-y-4">
        <h4 class="font-semibold">Edit</h4>
        <hr>
        <div class="grid grid-flow-cols md:grid-cols-2 gap-4">
            <div class="mt-6 inline-flex space-x-4 items-center">
                <x-input-label value="Available Quantity" for="quantity"/>
                <x-text-input name="quantity" value="{{$product->quantity}}" type="number"/>
            </div>
            <div class="mt-6 inline-flex space-x-4 items-center">
                <x-input-label value="Part No" for="part_no"/>
                <x-text-input name="part_no" value="{{isset($product->details) ? $product->details->part_no ?? old('part_no') : ''}}" type="text"/>
            </div>
            <div class="mt-6 inline-flex space-x-4 items-center">
                <x-input-label value="Dimensions" for="dimensions"/>
                <x-text-input name="dimensions" value="{{isset($product->details) ? $product->details->dimensions ?? old('dimensions') : ''}}" type="text"/>
            </div>
            <div class="mt-6 inline-flex space-x-4 items-center">
                <x-input-label value="Weight" for="weight"/>
                <x-text-input name="weight" value="{{isset($product->details) ? $product->details->weight ?? old('weight') : ''}}" type="text"/>
            </div>
            <div class="mt-6 inline-flex space-x-4 items-center">
                <x-input-label value="Manual" for="manual"/>
                <x-text-input name="manual" value="{{isset($product->details) ? $product->details->manual ?? old('manual') : ''}}" type="text"/>
            </div>
           
            {{-- <div class="mt-6 inline-flex space-x-10 items-center">
                <x-input-label value="Manual" for="manual"/>
                <x-text-input name="manual" value="{{old('manual')}}" type="text"/>
            </div>
            <div class="mt-6 inline-flex space-x-10 items-center">
                <x-input-label value="Dimensions" for="dimensions"/>
                <x-text-input name="dimensions" value="{{old('dimensions')}}" type="text"/>
            </div>
            <div class="mt-6 inline-flex space-x-10 items-center">
                <x-input-label value="Max Air Pressure" for="max_air_pressure"/>
                <x-text-input name="max_air_pressure" value="{{old('max_air_pressure')}}" type="text"/>
            </div>
            <div class="mt-6 inline-flex space-x-10 items-center">
                <x-input-label value="Weight" for="weight"/>
                <x-text-input name="weight" value="{{old('weight')}}" type="text"/>
            </div>
            <div class="mt-6 inline-flex space-x-10 items-center">
                <x-input-label value="Air Inlet" for="air_inlet"/>
                <x-text-input name="air_inlet" value="{{old('air_inlet')}}" type="text"/>
            </div>
            <div class="mt-6 inline-flex space-x-10 items-center">
                <x-input-label value="Outlet" for="outlet"/>
                <x-text-input name="outlet" value="{{old('outlet')}}" type="text"/>
            </div>
            <div class="mt-6 inline-flex space-x-10 items-center">
                <x-input-label value="Capacity" for="capacity"/>
                <x-text-input name="capacity" value="{{old('capacity')}}" type="text"/>
            </div>
            <div class="mt-6 inline-flex space-x-10 items-center">
                <x-input-label value="Pump Tube" for="pump_tube"/>
                <x-text-input name="pump_tube" value="{{old('pump_tube')}}" type="text"/>
            </div> --}}
        </div>
        
        
        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3 hover:bg-red-700">
                {{ __('Save') }}
            </x-danger-button>
        </div>
        <hr>
    </div>
</x-modal>