<div class="space-y-5 w-72 shrink-0 hidden sm:flex flex-col p-10 h-full pb-60 bg-[#010123] text-[#ffffffe5] text-sm">
    @foreach ($categories as $key => $category)
        <a class=" text-start py-1 {{ $url === $category && str_contains($url, $category) ? ' underline underline-offset-4  max-w-max' : '' }}"
            href="{{ route('searchCategory1', ['category1' => str_replace(' ', '-', $category)]) }}">
            {{ $category }}
        </a>

        {{-- on products home page, categories dropdown will be disabled,
                            if a category is clicked, then subcategories are fetched. Only those
                            category sub-categories are visible. If there are no sub-categories then this dropdown
                            will be hidden --}}
        @if (str_contains($url, $category) && $subCategories->count() > 0)
            <div class="space-y-3 text-xs ml-1 flex flex-col">
                @foreach ($subCategories as $subCategory)
                    <a href="{{ route('searchCategory2', [
                        'category1' => str_replace(' ', '-', $category),
                        'category2' => str_replace(' ', '-', $subCategory->name),
                    ]) }}"
                        class=" py-1 {{$url === $category.'/'.$subCategory->name && str_contains($url, $subCategory->name) ? 'underline underline-offset-4 max-w-max' : '' }}">
                        {{ $subCategory->name }}
                    </a>

                    @if (isset($products) && str_contains($url, $category) && str_contains($url, $subCategory->name))
                        <div class="space-y-2 ml-0.5 flex flex-col text-xs">
                            @foreach($products as $product)
                            <a href="{{ route('searchCategory3', [
                                'category1' => str_replace(' ', '-', $category),
                                'category2' => str_replace(' ', '-', $subCategory->name),
                                'category3' => str_replace(' ', '-', $product->name)
                            ]) }}"
                                class=" py-1 {{ str_contains($url, $product->name) ? 'max-w-max underline underline-offset-4' : '' }}">
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
