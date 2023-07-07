<x-app-layout>

    @include('flash-message')
    @include('alert')

    <div class="container w-full items-center flex flex-col space-y-10">

        @include('User.sidebar')

        @livewire('product-types')
    </div>

    

    <form action="{{ route('type.edit') }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        @include('modals.edit-modal')

    </form>

    <script>
        function edit_modal(value) {
            $('.errors').empty();
            $('#type_id').val(value.id);
            $('#type_name').val(value.name);
            $('#type_category').val(value.category.id);
            $('#type_category').text(value.category.name);

            // console.log(value);
        }
    </script>
</x-app-layout>
