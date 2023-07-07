<x-app-layout>

    <div class="w-full container flex flex-col items-center space-y-10">
        @include('User.sidebar')

        @livewire('categories')
    </div>


    <form action="{{ route('category.edit') }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        @include('modals.edit-modal')
    </form>


    <script>
        function edit_modal(category) {
            $('.errors').empty();
            $('#category_id').val(category.id);
            $('#category').val(category.name);
            $('#category-description').val(category.description);
            // console.log(category);
        }
    </script>
</x-app-layout>
