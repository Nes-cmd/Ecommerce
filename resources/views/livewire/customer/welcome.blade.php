<div>
<div class="md:p-3 p-2 mx-auto flex-1">
    <div class="flex justify-end h-48 md:h-64">
        <div class="md:flex md:flex-col hidden bg-gradient-to-bl from-purple-800 via-red-500 to-blue-600 w-1/3 text-white">
            <h1 class="text-5xl font-bold pl-3">{{__('welcome.sologan')}}</h1>
            <p class="font-serif pl-1">{{__('welcome.thesologan')}}</p>
            <p class="text-center font-serif text-3xl bg-purple-700 rounded-xl w-2/3 m-5">{{__('welcome.enjoyWithus')}}</p>
        </div>
        <img src="images/O1CN01QEL53b1ZNOzSa5hHT_!!6000000003182-0-tps-990-400.webp" class="md:w-2/3 w-full" height="50%" alt="">
    </div>

    <div class="flex mt-2">
        <!-- slider -->
        <div class="slider-container first-sample">
            <div class="slider">
                @foreach($specials as $special) 
                    <div class="item">
                        <img src="{{ asset('storage/'.json_decode($special['photo_url'])->photo_1)}}" alt="">
                    </div>
                @endforeach
            </div>
        </div>  
        <!-- End of slider  -->
    </div>
    <!-- Category -->
    <div class="my-20">
        <h2 class="text-gray-900 text-2xl text-center md:text-left md:pl-10 mb-5">{{__('welcome.lookingFor')}}</h2>
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
        <div class="grid grid-flow-row grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-5">
            @forelse($macro_product as $product)
            <div class="shadow rounded-lg">
                <a href="{{route('customer.detail', $product->id)}}">
                    <img class="rounded-tl-lg rounded-tr-lg h-64" src="{{ asset('storage/'.json_decode($product->photo_url)->photo_1)}}" alt="">
                </a>
                <div class="p-2">
                    <div class="text-gray-800">
                        <a href="{{route('customer.detail', $product->id)}}" class="truncate">{{$product->name }} <i class="text-green-600 text-md">{{number_format($product->price) .' birr'}}</i></a>
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
    <!-- End category -->
    <!-- Top rated products -->
    <div>
        @livewire('customer.toprated', ['message' => 'Top rated products'])
    </div>
    <!-- End of top rated products -->
    <!-- Newslater subscribe -->
    <div class="rounded-lg my-20 shadow-lg flex flex-row">
        <div class="p-10 lg:w-3/5 w-full bg-gradient-to-r from-red-600  to-blue-900 md:bg-gradient-to-r rounded-3xl md:from-red-500 md:via-purple-800 md:to-transparent">
            <div class="text-gray-200 lg:w-2/3 w-full">
                @if(session()->has('subscribed'))<p class="bg-green-500 h-8 rounded-lg pl-2 flex items-center" >{{session()->get('subscribed')}}</p>@endif
                <p class="text-3xl font-extrabold ml-2">{{__('welcome.subscribeTitle')}}</p>
                <p class="leading-relaxed">{{__('welcome.subscribeBody')}}</p>
                <input wire:model.lazy="subscriber_email" type="email" placeholder="{{ __('welcome.enterEmail') }}" class="w-full mt-2 mb-2 placeholder-gray-200 rounded-lg bg-gray-600 py-3 px-4 text-gray-200">
                <button wire:click="subscribe" class="bg-gray-800 py-3 w-full rounded-lg" type="button">{{__('welcome.subscribe')}}</button>
            </div>
        </div>
        <div class="lg:w-2/5 w-full lg:flex lg:flex-row hidden">
            <a href="">
                <img src="images/HTB1Lj1pXQT2gK0jSZPcq6AKkpXaf.jpg_300x300.webp" alt="">
            </a>
        </div>
  </div>
    <!-- Newslater subscribe end -->
</div>

<!-- Slider  -->
<script>
$(document).ready(function(){
    $(document).ready(function() {
    $('.first-sample .slider').blue_slider({
        // slide_template: '1fr 2fr 1fr',
        slide_template: screen.width<700?'0fr 1fr':'1fr 4fr (2,1fr) .5fr',
        // slide_template: '1fr',
        // slide_template: '1fr 4fr (2,1fr) .5fr',
        current_fr_index: 2,
        current_fr_index_flow: false,
        // speed: 500,
        ease_function: 'cubic-bezier(.32,.38,.16,.98)',
        slide_step: 1,
        current_fr_class: 'my-fr-current',
        active_fr_class: 'my-fr-active',
        custom_fr_class: '       fr-1         fr-2        fr-3    ',
        // left_padding: 100,
        // right_padding: 100,
        slide_gap: 0,
        speed: 1000,
        ease_function: 'ease-in-out',
        sencitive_drag: 100,
        loop: true,
        auto_play: true,
        auto_play_period: 2000,
        start_slide_index: 0,
        arrows: true,
        prev_arrow: '.first-sample .prev-slide',
        next_arrow: '.first-sample .next-slide',
    })
    });
});
</script>
</div>

