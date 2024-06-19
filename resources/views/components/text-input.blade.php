@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-sm shadow-sm focus:ring-1 focus:ring-[#0D0D0D]/20 border-0',
]) !!}>
