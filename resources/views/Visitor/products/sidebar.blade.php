<div class="space-y-3 sm:w-80 shrink-0 hidden sm:flex flex-col tracking-wider font-medium py-16 px-4 h-full pb-60 text-[#ffffffc4] text-sm">
    @foreach ($categories as $category)
        <a class=" text-start py-1 {{ $url === $category->name && str_contains($url, $category->name) ? ' text-[#da4242] font-semibold  drop-shadow-lg  max-w-max' : '' }}"
            href="{{ route('searchCategory1', ['category1' => str_replace(' ', '-', $category->name)]) }}">
            {{ $category->name }}
        </a>

        {{-- on products home page, categories dropdown will be disabled,
                            if a category is clicked, then subcategories are fetched. Only those
                            category sub-categories are visible. If there are no sub-categories then this dropdown
                            will be hidden --}}
        @if (str_contains($url, $category->name) && $subCategories->count() > 0)
            <div class="space-y-3 text-xs ml-6 flex flex-col">
                @foreach ($subCategories as $subCategory)
                    <a href="{{ route('searchCategory2', [
                        'category1' => str_replace(' ', '-', $category->name),
                        'category2' => str_replace(' ', '-', $subCategory->name),
                    ]) }}"
                        class=" py-1 {{$url === $category->name.'/'.$subCategory->name && str_contains($url, $subCategory->name) ? 'text-[#da4242] font-semibold max-w-max' : '' }}">
                        {{ $subCategory->name }}
                    </a>

                    @if (isset($products) && str_contains($url, $category->name) && str_contains($url, $subCategory->name))
                        <div class="space-y-2 ml-6 flex flex-col text-xs">
                            @foreach($products as $product)
                            <a href="{{ route('searchCategory3', [
                                'category1' => str_replace(' ', '-', $category->name),
                                'category2' => str_replace(' ', '-', $subCategory->name),
                                'category3' => str_replace(' ', '-', $product->name)
                            ]) }}"
                                class=" py-1 {{ str_contains($url, str_replace('-', ' ', $product->name)) ? 'max-w-max text-[#da4242] font-semibold' : '' }}">
                                {{ $product->name }}
                            </a>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    @endforeach
</div>
