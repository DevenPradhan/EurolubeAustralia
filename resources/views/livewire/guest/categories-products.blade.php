<div class="w-full flex justify-center sm:justify-between h-full py-6 px-4 md:px-0">
    <div class="space-y-6 w-72 shrink-0 hidden sm:flex flex-col p-10 h-full pb-60 bg-[#010123] text-[#ffffffe5] text-sm">
       @foreach($categories as $category) 
       <button class=" text-start">
            {{$category->name}}
        </button>
        @endforeach
    </div>
  
    <div class="px-6 py-20 w-3/4 place-content-center flex">
        <div class="grid grid-flow-row lg:grid-cols-2 w-max text-sm tracking-wider  text-[#ffffffe5] gap-10 place-content-start">
            @foreach($categoryProduct as $each)
                <button class="w-80 h-60 drop-shadow-md relative rounded-sm overflow-clip bg-white"
                        wire:click.prevent="getProducts({{$each->id}})">
                    {{-- <img src="{{asset('images/lube reels.jpg')}}" alt="" class="inset-0 absolute -z-10 w-full h-full object-cover"> --}}
                    <p class="mb-28 w-72 pt-2 pb-1.5 px-6 ml-10 bg-red-800 rounded-l-sm shadow-sm shadow-neutral-700 ">{{$each->name}}</p>
                </button>
            @endforeach
        </div>
    </div>
    
   


</div>