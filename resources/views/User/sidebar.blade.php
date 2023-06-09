<div class="p-1 rounded-sm mx-auto">
    <ul class="flex flex-inline space-x-1">
        <li>
            <x-nav-link href="{{ route('products') }}"
                class="sidebar_list {{ Request::routeIs('products') ? 'shadow-md' : '' }}">Products</x-nav-link>
        </li>
        <li>
            <x-nav-link href="{{route('types')}}" class="sidebar_list {{strpos(Request::path(), 'type' ) ? 'shadow-md' : ''}}">Types</x-nav-link>
        </li>

        <li>
            <x-nav-link href="{{route('categories')}}"
                class="sidebar_list {{strpos(Request::path(), 'categories' ) ? 'shadow-md' : ''}}">Categories</x-nav-link>
        </li>


    </ul>
</div>
