@if ($message = Session::get('success'))
    <x-flash-message class="bg-green-300">{{ $message }} </x-flash-message>
@endif

@if ($message = Session::get('error'))
    <x-flash-message class="bg-yellow-300">{{ $message }} </x-flash-message>
@endif

@if ($message = Session::get('warning'))
    <x-flash-message class="bg-red-300">{{ $message }} </x-flash-message>
@endif

@if ($message = Session::get('info'))
    <x-flash-message class="bg-slate-300">{{ $message }} </x-flash-message>
@endif
