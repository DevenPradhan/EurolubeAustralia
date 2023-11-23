@props(['src', 'alt'])
<div class="shadow-neutral-300 shadow-sm relative bg-white w-60 h-56 rounded-sm">
    <img src="{{$src}}" alt="alt" class="p-12 w-full h-full object-contain ">
    <p class="absolute z-20 rounded-l-sm top-16 w-52 left-8 px-3 pt-2 pb-1.5 text-end bg-red-800 shadow-sm shadow-neutral-700">{{$slot}}</p>
</div>