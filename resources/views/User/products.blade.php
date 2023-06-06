<x-app-layout>

    @include('flash-message')

    @include('alert')

    <div class="w-full container flex flex-col items-center space-y-4">
            @include('User.sidebar')
            <div class="max-w-5xl mx-auto">
            <table class="table-auto overflow-x-auto">
                <thead>
                    <tr>
                        <th class="user_th">#</th>
                        <th class="user_th">Name</th>
                        <th class="user_th">Type</th>
                        <th class="user_th">Category</th>
                        <th class="user_th">Quantity</th>
                        <th class="user_th"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6">
                            @if($products == '[]')
                            <div class="h-20 px-10 text-gray-500 flex flex-inline justify-center text-lg mt-6">
                                <p>There are no products added to the database. Click <button class="text-black underline italic" id="addProductButton">Here</button> to add new product</p>
                            </div>
                        @endisset()
                        </td>
                       
                    </tr>
                    <?php $id = 1; ?>
                    
                    {{-- add form --}}
                    
                        <tr id="add_product" class="form_tr overflow-x-auto">
                            <form action="{{ route('products.add') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <td class="user_td">{{ $id++ }}</td>
                            <td class="user_td">
                                <x-text-input class="form_input" placeholder="Enter a product name" name="name"
                                    required value="{{ old('name') }}" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </td>
                            <td class="user_td">
                                <div class="flex flex-inline space-x-2">
                                    <x-select class="form_input w-60" 
                                    {{-- onchange="show_type(this.value)"  --}}
                                    required
                                        focusable name="product_type" id="type_select">
                                        <option value="{{ old('product_type') }}">{{ old('product_type') }}Select A Type
                                        </option>
                                        @foreach ($types as $type)
                                            <option value=""></option>
                                        @endforeach
                                        {{-- <option value="n" class="select_new"> -- Add new Type --</option> --}}
                                    </x-select>

                                    {{-- <x-text-input class="form_input hidden  transition-all"
                                        placeholder="Enter type here" name="product_type" required id="type_field" />
                                    <x-icons.close onclick="closeTypeInput()" class="hidden" id="type_button">x
                                    </x-icons.close> --}}
                                </div>
                                <x-input-error :messages="$errors->get('product_type')" class="mt-2" />

                            </td>
                            {{-- category select input form --}}
                            <td class="user_td">
                                <div class="flex flex-inline space-x-1">
                                    <x-select class="form_input w-60" 
                                    {{-- onchange="show_category(this.value)"  --}}
                                    required
                                        name="category" id="category_select">
                                        <option value="">Select a Category</option>
                                        @foreach ($categories as $key => $category)
                                            <option value="{{ $key }}">{{ $category }}</option>
                                        @endforeach
                                        {{-- <option value="n" class="select_new">-- Add new Category --</option> --}}
                                    </x-select>

                                    {{-- <x-text-input class="form_input hidden" placeholder="Enter Category Here"
                                        name="category" id="category_field" />
                                    <x-icons.close onclick="closeCategoryInput()" class="hidden" id="category_button">x
                                    </x-icons.close> --}}
                                </div>
                                <x-input-error :messages="$errors->get('category')" class="mt-2" />

                            </td>

                            {{-- quanity --}}
                            <td class="user_td">
                                <x-text-input class="form_input w-16" required name="quantity" value="{{old('quantity')}}" />
                                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                            </td>
                            <td class="user_td">
                                <x-danger-button class="px-3 py-1 rounded-md bg-gray-500" title="Add" type="submit">
                                    Add</x-danger-button>
                            </td>
                        </form>
                        </tr>

                    
                    @foreach ($products as $product)
                        <tr onclick="window.location='{{ route('product.details', $id) }}'"
                            class="cursor-pointer hover:shadow-sm" title="click to view product details">
                            <td class="user_td">{{ $id++ }}</td>
                            <td class="user_td">{{ $product->name }}</td>
                            <td class="user_td"><?php echo $category = App\Models\ProductCategory::where('id', $product->product_category_id)->value('name'); ?></td>
                            <td class="user_td">{{ $product->quantity }}</td>
                            <td class="user_td"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>


    {{-- <script>
        function show_type(value) {
            let select = document.getElementById('type_field');

            if (value === 'n') {
                select.classList.remove('hidden');
                document.getElementById('type_button').classList.remove('hidden');
                document.getElementById('type_select').classList.add('hidden');
            } else {
                select.classList.add('hidden');
            }
        }

        function show_category(value) {
            let select = document.getElementById('category_field');

            if (value === 'n') {
                select.classList.remove('hidden');
                document.getElementById('category_button').classList.remove('hidden');
                document.getElementById('category_select').classList.add('hidden');
            } else {
                select.classList.add('hidden');
            }
        }

        function closeTypeInput() {
            document.getElementById('type_field').classList.add('hidden');
            document.getElementById('type_button').classList.add('hidden');
            document.getElementById('type_select').classList.remove('hidden');
            document.getElementById('type_select').selectedIndex = 0;
        }


        function closeCategoryInput() {
            document.getElementById('category_field').classList.add('hidden');
            document.getElementById('category_button').classList.add('hidden');
            document.getElementById('category_field').value = "";
            document.getElementById('category_select').classList.remove('hidden');
            document.getElementById('category_select').selectedIndex = 0;
        }
    </script> --}}


</x-app-layout>
