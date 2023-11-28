<div class="space-y-3 flex flex-col">
    <div class="" x-data="{ edit_name: false }" x-on:click.away="edit_name = false">
        <button class="shadow max-w-max px-2 py-1 opacity-75"
            x-on:click.prevent="edit_name = !edit_name; $nextTick(() => $refs.name.focus());">
            <h4 class="tracking-wide">{{ $name }}</h4>
        </button>
        <div class="absolute bg-white z-20 w-max p-2" x-show="edit_name" x-init="@this.on('name-changed', () => { edit_name = false })">
            <form wire:submit.prevent="changeName">
                <x-text-input type="text" x-ref="name" class="rounded-sm w-96 h-7 border-gray-400 focus:ring-0"
                    wire:model.defer="name" />
                <x-primary-button class="text-sm h-7">Save</x-primary-button>
            </form>

        </div>
    </div>

    <div class="" x-data="{ edit_category: false }" x-on:click.away="edit_category = false">
        <button class="px-2 py-1 shadow opacity-75 max-w-max"
            x-on:click.prevent="$wire.emit('select-category'); edit_category = !edit_category ">
            {{ $category->name }}
        </button>
        <div class="absolute p-2 bg-white z-20" x-show="edit_category" 
            x-init="@this.on('category-selected', () => { edit_category = false })">
            @livewire('admin.edit-categories')

        </div>
    </div>


</div>
