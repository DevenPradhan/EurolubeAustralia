<div class="p-8 rounded-sm drop-shadow-md">
    <ul class="space-y-2">
        <li>
            <x-nav-link href="{{ route('products') }}"
                class="sidebar_list {{ Request::routeIs('products') ? 'shadow-md ' : '' }}">Products</x-nav-link>
        </li>

        <li>
            <x-nav-link href="{{route('categories')}}"
                class="sidebar_list {{ Request::routeIs('categories') ? 'shadow-md ' : '' }}">Categories</x-nav-link>
        </li>


    </ul>
</div>
