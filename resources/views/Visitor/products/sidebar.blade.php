<div
    class="space-y-3 w-max shrink-0 hidden sm:flex flex-col tracking-normal font-medium py-16 px-12 h-full pb-60 text-[#ffffffc4] text-sm">
    <hr class=" opacity-30">
    @foreach ($categories as $category)
        <a class="mx-4 text-start py-1 hover:text-[#da4242] transition-colors {{ $url === $category->name && str_contains($url, $category->name) ? ' text-[#da4242] font-semibold  drop-shadow-lg  max-w-max' : '' }}"
            href="{{ route('searchCategory1', ['category1' => str_replace(' ', '-', $category->name)]) }}">
            {{ $category->name }}
        </a>
        <hr class="opacity-30">
        {{-- on products home page, categories dropdown will be disabled,
                            if a category is clicked, then subcategories are fetched. Only those
                            category sub-categories are visible. If there are no sub-categories then this dropdown
                            will be hidden --}}
        @if (str_contains($url, $category->name) && $subCategories->count() > 0)
            <div class="space-y-3 text-xs flex flex-col">
                @foreach ($subCategories as $subCategory)
                    <a href="{{ route('searchCategory2', [
                        'category1' => str_replace(' ', '-', $category->name),
                        'category2' => str_replace(' ', '-', $subCategory->name),
                    ]) }}"
                        class="ml-8 mr-4 py-1 hover:text-[#da4242] transition-colors {{ $url === $category->name . '/' . $subCategory->name && str_contains($url, $subCategory->name) ? 'text-[#da4242] font-semibold max-w-max' : '' }}">
                        {{ $subCategory->name }}
                    </a>
                    <hr class="opacity-30">

                    @if (isset($products) && str_contains($url, $category->name) && str_contains($url, $subCategory->name))
                        <div class="space-y-3 flex flex-col text-xs">
                            @foreach ($products as $product)
                                <a href="{{ route('searchCategory3', [
                                    'category1' => str_replace(' ', '-', $category->name),
                                    'category2' => str_replace(' ', '-', $subCategory->name),
                                    'category3' => str_replace([' ', '/'], '-', $product->name),
                                ]) }}"
                                    class="ml-12 mr-8 py-1 hover:text-[#da4242] transition-colors {{ str_contains($url, str_replace(['-', '/'], ' ', $product->name)) ? 'max-w-max text-[#da4242] font-semibold' : '' }}">
                                    {{ $product->name }}
                                </a>
                                <hr class="opacity-30">
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    @endforeach
</div>
