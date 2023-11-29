<div class="flex flex-col p-0.5 bg-gray-200 max-w-max h-full border border-gray-50">
    <a href="{{ route('dashboard') }}" class="sidebar_list {{ str_contains(Request::path(), 'dashboard') ? 'bg-gray-50' : '' }}">
        <i class="w-5">
            <x-icons.house />
        </i>
        <span>Home</span>
    </a>
    <a href="{{ route('products.index') }}"
        class="sidebar_list {{ str_contains(Request::path(), 'product') ? 'bg-gray-50' : '' }}">
        <i class="w-5">
            <x-icons.screwdriver />
        </i>
        <span>Products</span>
    </a>
    <a href="{{route('orders')}}" class="sidebar_list">
        <i class="w-5"><x-icons.abacus/></i>
        <span>Orders</span>
    </a>
    {{-- <a href="{{route('profile.edit')}}" class="sidebar_list {{ str_contains(Request::path(), 'profile') ? 'bg-gray-50' : '' }}">
        <i class="w-5"><x-icons.profile/></i>
        <span>Profile</span>
    </a> --}}

</div>
