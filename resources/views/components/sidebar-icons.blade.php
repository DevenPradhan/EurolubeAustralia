<button type="button" {{$attributes->merge(['class' => 'font-semibold text-xs sm:text-sm px-2 sm:px-4 py-1.5 sm:py-3  whitespace-nowrap w-full hover:bg-red-800 hover:text-[#F1F4F5] transition-colors duration-150 flex tracking-wide'])}}>
    {{ $slot }}
</button>