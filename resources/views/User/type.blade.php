<x-app-layout>

    @include('flash-message')
    @include('alert')

    <div class="container w-full items-center flex flex-col">

        @include('User.sidebar')
        <div class="max-w-5xl mx-auto">
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="user_th">#</th>
                        <th class="user_th">Product Type</th>
                        <th class="user_th">Product Category</th>
                        <th class="user_th"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    @foreach ($product_types as $type)
                        <tr>
                            <td class="user_td ml-4">{{ $id++ }}</td>
                            <td class="user_td">{{ $type->name }}</td>
                            <td>{{ $type->product_category_id }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
