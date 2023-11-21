<div class="space-y-5 w-72 shrink-0 hidden sm:flex flex-col p-10 h-full pb-60 bg-[#010123] text-[#ffffffe5] text-sm">
    <?php
    $categories = App\Models\ProductCategory::where('level', 1)->pluck('name', 'id');
    ?>

    @foreach ($categories as $key => $category)
        <a class=" text-start py-1 {{ $url === $category && str_contains($url, $category) ? ' border-b  max-w-max' : '' }}"
            href="{{ route('searchCategory1', ['category1' => str_replace(' ', '-', $category)]) }}">
            {{ $category }}
        </a>

        {{-- on products home page, categories dropdown will be disabled,
                            if a category is clicked, then subcategories are fetched. Only those
                            category sub-categories are visible. If there are no sub-categories then this dropdown
                            will be hidden --}}
        @if (str_contains($url, $category) && $subCategories->count() > 0)
            <div class="space-y-4 ml-3 flex flex-col">
                @foreach ($subCategories as $subCategory)
                    <a href="{{ route('searchCategory2', [
                        'category1' => str_replace(' ', '-', $category),
                        'category2' => str_replace(' ', '-', $subCategory->name),
                    ]) }}"
                        class="text-sm py-1 {{ str_contains($url, $subCategory->name) ? 'border-b max-w-max' : '' }}">
                        {{ $subCategory->name }}
                    </a>
                @endforeach
            </div>
        @endif
    @endforeach
</div>
