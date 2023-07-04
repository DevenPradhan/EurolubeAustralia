<x-modal name="details-modal" :show="$errors->detailsModal->isNotEmpty()" focusable maxWidth="3xl">
    <div class="p-10 space-y-4">
        <h4 class="font-semibold">Edit</h4>
        <hr>
        <div class="grid grid-flow-cols md:grid-cols-2 gap-4">
            <div class="mt-6 inline-flex space-x-4">
                <x-input-label value="Name" for="name" />
                <div>
                    <x-text-input name="name" value="{{ old('name') ?? $product->name }}" type="text" required/>
                    <x-input-error :messages="$errors->detailsModal->get('name')" class="mt-2" />
                </div>
            </div>

            <div class="mt-6 inline-flex space-x-4">
                <x-input-label value="Available Quantity" for="quantity" />
                <div>
                    <x-text-input name="quantity" value="{{ old('quantity') ?? $product->quantity }}" type="number" />
                    <x-input-error :messages="$errors->detailsModal->get('quantity')" class="mt-2" />
                </div>
            </div>

            <div class="mt-6 inline-flex space-x-4">
                <x-input-label value="Part No" for="part_no" />
                <div class="">
                    <x-text-input name="part_no" value="{{ old('part_no') ?? $product->details->part_no }}"
                        type="text" required/>
                    <x-input-error :messages="$errors->detailsModal->get('part_no')" class="mt-2" />
                </div>
            </div>

            <div class="mt-6 inline-flex space-x-4">
                <x-input-label value="Dimensions" for="dimensions" />
                <div>
                    <x-text-input name="dimensions" value="{{ old('dimensions') ?? $product->details->dimensions }}"
                        type="text" />
                    <x-input-error :messages="$errors->detailsModal->get('dimensions')" class="mt-2" />

                </div>
            </div>

            <div class="mt-6 inline-flex space-x-4 ">
                <x-input-label value="Weight" for="weight" />
                <div>
                    <x-text-input name="weight" value="{{ old('weight') ?? $product->details->weight }}"
                        type="text" />
                    <x-input-error :messages="$errors->detailsModal->get('weight')" class="mt-2" />

                </div>
            </div>

            <div class="mt-6 inline-flex space-x-4 col-span-2">
                <x-input-label value="Description" for="description"/>
                <div>
                    <x-textbox name="description" >{{old('description') ?? $product->description}}</x-textbox>
                    <x-input-error :messages="$errors->detailsModal->get('description')" class="mt-2"/>
                </div>
            </div>

            <div class="mt-6 inline-flex space-x-4 ">
                <x-input-label value="Manual" for="manual" />
                <div>
                    <x-text-input name="manual" value="{{ old('manual') ?? $product->details->manual }}"
                        type="file" />
                    <x-input-error :messages="$errors->detailsModal->get('manual')" class="mt-2" />
                </div>
            </div>
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
