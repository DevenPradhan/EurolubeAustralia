@props(['disabled' => false])

<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-sm font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-700 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
