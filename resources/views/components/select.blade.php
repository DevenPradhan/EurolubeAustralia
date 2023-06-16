@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-700 
        dark:focus:border-gray-700 focus:ring-gray-700 dark:focus:ring-gray-700 rounded-md shadow-sm',
]) !!}>{{ $slot }}</select>
