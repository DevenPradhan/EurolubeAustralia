<div class="px-6 py-20 w-3/4 place-content-center flex">
    <div class="grid grid-flow-row lg:grid-cols-2 w-max text-sm tracking-wider  text-[#ffffffe5] gap-10 place-content-start">
        @foreach($get_list as $each)
            <a class="w-80 h-60 drop-shadow-md relative rounded-sm overflow-clip bg-white"
                    href="{{route('view_products', $each->name)}}"
                   >
                {{-- <img src="{{asset('images/lube reels.jpg')}}" alt="" class="inset-0 absolute -z-10 w-full h-full object-cover"> --}}
                <p class="mb-28 w-72 pt-2 pb-1.5 px-6 ml-10 bg-red-800 rounded-l-sm shadow-sm shadow-neutral-700 ">{{$each->name}}</p>
            </a>
        @endforeach
    </div>
</div>