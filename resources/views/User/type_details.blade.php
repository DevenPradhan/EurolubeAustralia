<x-app-layout>

    <div class="container mx-auto flex flex-col space-y-20 items-center">
        <div class="flex">
            @include('User.sidebar')
        </div>

        <div class="flex flex-col space-y-5 mx-10">
            <div>
                <a href="{{route('category.details', $type->category->id)}}" 
                    class="max-w-max text-neutral-400 hover:text-black text-sm font-semibold">
                    {{$type->category->name}} 
                </a>
                <h4 class="font-semibold uppercase text-xl">{{ $type->name }}</h4>

            </div>
            <div class="space-x-10 flex items-center">
                {{-- part of page for type description --}}
                <p>
                    {{ $type->description == '' ? 
                    'There are no descriptions for this category' : $type->description }}
                </p>
                <x-secondary-button 
                type="button" 
                x-data="" 
                onclick="edit_desc({{ $type }})"
                x-on:click.prevent="$dispatch('open-modal', 'description-modal')">
                    {{ $type->description == '' ? 'Add' : 'Edit' }}</x-secondary-button>
            </div>

            @livewire('type-details', ['type_id' => $type->id])
        </div>
    </div>


    {{-- @include('modals.add-product-modal') --}}

    <form action="{{ route('type.image.upload', $type->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('modals.image-upload-modal')
    </form>

    <form action="{{ route('type-description-edit', $type->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        @include('modals.description-modal')
    </form>

    {{-- script for edit/add description is in layouts/app blade --}}

</x-app-layout>
