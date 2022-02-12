
<div>
    <x-slot name="header">
    {{__('detail.detail')}}
    </x-slot>
    <div>
        <div class="md:flex md:flex-row p-6">
            <div class="md:w-1/4">
                @php($photos = json_decode($product['photo_url']))
                <div class="xzoom-container">
                    <img class="xzoom2" src="{{ asset('storage/'.$photos->photo_1)}}" xoriginal="{{ asset('storage/'.$photos->photo_1)}}" />
                    <div class="xzoom-thumbs">
                        <a href="{{ asset('storage/'.$photos->photo_1)}}"><img class="xzoom-gallery2" width="80" src="{{ asset('storage/'.$photos->photo_1)}}"  xpreview="{{ asset('storage/'.$photos->photo_1)}}" title="The description goes here"></a>
                        @foreach($photos as $photo)
                        <a href="{{ asset('storage/'.$photo)}}"><img class="xzoom-gallery2" width="80" src="{{ asset('storage/'.$photo)}}" title="{{$product['name']}}"></a>
                        @endforeach
                    </div>
                </div>         
            </div>
            <div class="flex-auto pl-6 ">
                <div class="flex flex-wrap items-baseline">
                    <h1 class="w-full flex-none font-semibold mb-2.5">
                        {{ $product->name }}
                        {{ $product->id }}
                    </h1>
                    <p class="w-full pb-3">{{$product->description}}</p>
                    <div class="text-4xl flex items-end leading-7 font-bold text-purple-600">
                        {{$product->price}} <h3 class="pl-2 text-sm">birr</h3>
                    </div>
                    @if($product->status)
                    <div class="text-sm font-medium text-green-900 ml-3">
                        {{__('detail.inStock')}}
                    </div>
                    @else
                    <div class="text-sm font-medium text-red-700 ml-3">
                        Not {{__('detail.inStock')}}
                    </div>
                    @endif
                </div>
                <div class="flex items-baseline my-8">
                    <div class="space-x-2 flex text-lg font-medium">
                        @php($colors = json_decode($product->color))
                        @if(isset($colors))
                        <label for="color">{{('color')}}:</label>
                        @foreach($colors as $color)
                        <div class="h-10 w-10 rounded-lg flex justify-center items-center" style="background-color:{{$color}}">
                            <input class="items-stretch" type="radio" name="color">
                        </div>
                        @endforeach
                        @else
                        <p>{{__('detail.notColor')}}!</p>
                        @endif
                    </div>
                </div>
                <div class="flex  space-x-3 mb-4 text-sm font-semibold">
                    <div class="flex md:w-1/2 w-full space-x-3">
                        <button wire:click="buynow({{$product->id}})" class="md:w-1/2 w-full flex items-center justify-center rounded-full bg-purple-700 text-white" type="submit">{{__('welcome.buyNow')}}</button>
                        <button wire:click="$emit('toCart' , {{$product->id}} )" class="md:w-1/2 w-full flex items-center justify-center bg-gradient-to-r from-red-400 to-pink-800 rounded-full text-gray-200" type="button">{{__('detail.addToBag')}}</button>
                    </div>
                    <button class="flex-none flex items-center justify-center w-9 h-9 rounded-full bg-purple-50 text-purple-700" type="button" aria-label="like">
                        <svg width="20" height="20" fill="currentColor">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                        </svg>
                    </button>
                </div>
                <!-- The star things -->
                <div class="stars flex flex-grow space-x-0">
                    @for($i = 1;$i <=5; $i++)
                    <div class="">
                        <svg wire:click="star({{$i}})" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" stroke="currentColor">
                            <linearGradient id="grad{{$i}}">
                                <stop offset="{{($rate-$i+1)*100}}%" stop-color="gold" />
                                <stop offset="0%" stop-color="white" />
                            </linearGradient>
                            <path stroke-linecap="round" stroke-linejoin="round" fill="url(#grad{{$i}})" stroke-width="0.1" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                    @endfor
                    @if($visible)
                        <div wire:click="rate" class="bg-yellow-400 pl-2 ml-2 rounded pr-2">{{__('detail.rate')}}</div>
                    @endif
                </div>
                <!-- End of staring -->
                <p class="text-sm text-gray-500">
                {{__('detail.feelFree')}}
                </p>
            </div>
        </div>
        <!-- Top rated products -->
        <div class="bg-gray-200 shadow p-3 mt-20">
            @livewire('customer.toprated', ['message' => 'You may also like'])
        </div>
    </div>
    <!-- xzoom plugin here -->
    <script type="text/javascript" src="{{ asset('zoomer/dist/xzoom.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('zoomer/hammer.js/1.0.5/jquery.hammer.min.js')}}"></script>  
    <script type="text/javascript" src="{{ asset('zoomer/fancybox/source/jquery.fancybox.js')}}"></script>
    <script type="text/javascript" src="{{ asset('zoomer/magnific-popup/js/magnific-popup.js')}}"></script>  
    <script src="{{ asset('zoomer/js/foundation.min.js')}}"></script>
    <script src="{{ asset('zoomer/js/setup.js')}}"></script>
</div>

