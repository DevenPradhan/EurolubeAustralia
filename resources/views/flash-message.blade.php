@if ($message = Session::get('success'))
    <x-flash-message class="bg-green-200">{{ $message }} </x-flash-message>
@endif

@if ($message = Session::get('error'))
    <x-flash-message class="bg-yellow-200">{{ $message }} </x-flash-message>
@endif

@if ($message = Session::get('warning'))
    <x-flash-message class="bg-red-200">{{ $message }} </x-flash-message>
@endif

@if ($message = Session::get('info'))
    <x-flash-message class="bg-slate-200">{{ $message }} </x-flash-message>
@endif
