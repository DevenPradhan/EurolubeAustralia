@if ($errors->any())
<div class="fixed right-20 opacity-80 top-20 bg-neutral-300 shadow-md p-5 font-bold">
    <p class="uppercase font-mono text-red-800">Something went wrong!</p>
    <ul class="p-4 bg-red-200">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

