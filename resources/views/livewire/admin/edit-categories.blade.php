<div class="flex p-3 rounded border h-60 bg-gray-300 w-full" x-transition.duration.100ms x-data="{ add_category: @entangle('activeDiv') }">

    <div class="space-y-2" x-show="add_category === 'category_list'">
        {{-- add button to change from select category function to add category --}}

        <x-secondary-button class="max-w-max"
            x-on:click.prevent=" $wire.woProductsCategory() ; add_category = 'new_category'">Add</x-secondary-button>


        <ul class="rounded-sm text-sm max-h-40 overflow-y-auto max-w-sm sm:w-full overflow-x-hidden">
            <li><button wire:click.prevent="mainCategory" type="button"
                    class="inline-flex space-x-3 border bg-gray-200 text-start hover:bg-gray-700 hover:text-white px-2 py-1 w-full sm:w-96">...</button>
            </li>

            @foreach ($categories as $key => $category)
                <li>
                    <button type="button" wire:click.prevent="selectCategory({{ $key }})"
                        class="flex justify-between border space-x-10 bg-gray-200 text-start hover:bg-gray-700 hover:text-white pl-2 pr-4 py-1 w-full sm:w-96">
                        {{ $category }}

                        <span>
                            <x-icons.slider-right
                                class="w-4 {{ App\Models\ProductCategory::where('referencing', $key)->count() === 0 ? 'hidden' : '' }}" />
                        </span>
                    </button>
                </li>
            @endforeach
        </ul>
        @if ($categories->isEmpty())
            <p class="p-3 text-gray-700">
                No data
            </p>
        @endif
    </div>

    {{-- add new category section --}}
    <div class="relative" x-show="add_category === 'new_category'">
        <div class="italic absolute text-green-700 left-20 top-5" x-data="{ notification: false }"
            x-show.transition.opacity.out.duration.1000ms="notification" x-init="@this.on('saved', () => {
                notification = true;
                setTimeout(() => { notification = false }, 2000)
            })">
            Category Saved
        </div>

        <x-secondary-button class="" x-on:click.prevent="$wire.mainCategory() ; add_category = 'category_list'">
            Back
        </x-secondary-button>

        <div class="flex h-10 rounded relative border w-full mt-5">
            <select name="" class="bg-gray-300 rounded-l focus:ring-0 focus:border-none border-none w-60"
                wire:model="upperCategory">
                <option value=""></option>
                @foreach ($categories as $key => $category)
                    <option value="{{ $key }}">{{ $category }}</option>
                @endforeach
            </select>
            <div class="">
                <input type="text" placeholder="Enter new Category" wire:model.debounce.500ms="newCategory"
                    class="focus:ring-0 focus:border-none border-none w-80" />
                <x-input-error :messages="$errors->get('newCategory')" class="mt-2" />
            </div>
        </div>

        @if (!empty($newCategorySearch))
            <div class="absolute top-25 flex w-full justify-center">
                <p class="text-sm text-red-800">{{ $newCategorySearch->name }} : <span class="font-semibold">This
                        category has been taken</span></p>
            </div>
        @endif
        <x-secondary-button class="mt-20" wire:click.prevent="saveCategory">Save</x-secondary-button>
    </div>
</div>
