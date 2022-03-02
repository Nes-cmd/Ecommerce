<div class="my-5">
    <div class="pl-4">
    <div class="flex justify-center items-center border-2 mt-4">
            <button wire:click="prevPage" class="border-3 shadow-lg h-10 p-2 bg-gray-800 rounded  text-white mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                </svg>  
            </button>
            @for($i = 1; $i <= $totalPage; $i++)
                <div wire:click="toPage({{$i}})" class="border-3 shadow-lg h-8 p-2 {{$i == $current?'bg-blue-600':''}}">
                    {{$i}}
                </div>
            @endfor
            <button wire:click="nextPage" class="border-3 shadow-lg h-10 p-2 bg-gray-800 rounded text-white ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                </svg>
            </button>
        </div>
        <!--  -->
        @foreach($products as $category=>$macro_product  )
        <div class="flex flex-row justify-between">
            <div class="text-lg text-gray-900 rounded-lg bg-gradient-to-r flex justify-center items-center from-green-600 pl-2 to-transparent">
                <p>{{$macro_product[0]->category_name}}</p>
            </div>
            <a href="{{route('customer.product.list', $macro_product[0]->category_id)}}" class="flex flex-row text-lg bg-gradient-to-l text-gray-900 from-green-600 pl-2 to-transparent rounded-3xl p-1">
                {{ __('welcome.viewMore') }}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
        <div class="grid grid-flow-row grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 mt-5">
            @forelse($macro_product as $product)
            <div class="shadow rounded-lg">
                <a href="{{route('customer.detail', $product->id)}}">
                    <img class="rounded-tl-lg rounded-tr-lg h-64" src="{{ asset('storage/'.json_decode($product->photo_url)->photo_1)}}" alt="">
                </a>
                <div class="p-2">
                    <div class="text-gray-800">
                        <a href="{{route('customer.detail', $product->id)}}" class="">{{$product->name }} <i class="text-green-600 text-md">{{number_format($product->price) .' birr'}}</i></a>
                    </div>
                    <div class="flex md:flex-row flex-col justify-between">
                        <button wire:click="$emit('toCart' , {{$product->id}} )" class="bg-gradient-to-r from-red-400 to-pink-800 rounded-full py-2 px-4 h-6 flex justify-center items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <h2>{{__('welcome.addToCart')}}</h2>
                        </button>
                        <!-- <a href="{{route('customer.detail', $product->id)}}" class="mb-2 bg-gradient-to-r from-red-400 to-pink-800 rounded-full py-2 px-4 text-gray hover:bg-blue-600 text-sm flex justify-center items-center h-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6   inline-block" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            <h2>{{__('welcome.viewDetail')}}</h2>
                        </a> -->
                    </div>
                </div>
            </div>
            @empty
            <h2 class="font-extrabold">{{__('welcome.noProduct')}}</h2>
            @endforelse
        </div>
        @endforeach
        
        <div class="flex justify-center mt-3">
            <a href="{{ route('customer.product.list')}}" class="bg-gradient-to-r from-purple-900 to-red-800 rounded-full flex justify-center items-center md:w-1/2 w-full text-lg text-white font-bold h-10">
                <h2 class="text-white font-serif">{{__('welcome.exploreAll')}}</h2>        
            </a>
        </div>
    </div>
</div>