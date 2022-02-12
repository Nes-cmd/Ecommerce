<div class="bg-gray-200 shadow p-3">
    <div>
        <div class="text-center md:text-left pl-3 text-3xl text-gray-900">
            {{$message}}
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3">
            @foreach($toprateds as $toprated)
            <div class="mb-3">
                <p class="text-green-600 text-center lead pl-3">{{$toprated->name}}</p>
                <div class="flex justify-center ">
                    @php( $photos = json_decode($toprated->photo_url) )
                    @foreach($photos as $photo) 
                        <div class="">
                            <a href="{{route('customer.detail', $toprated->id)}}">
                                <img src="{{ asset('storage/'.$photo) }}" class="rounded-lg w-full h-64 ml-2 mr-2" alt="">
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="text-gray-900">
                    <p class="text-sm ml-3 m-3 text-gradient-to-t from-purple-800 to-green-300">{{$toprated->description}}</p>
                </div>
                <div class="flex justify-center items-center">
                    <button wire:click="buynow({{$toprated->id}})" class="bg-gray-900 text-white h-10 w-1/2 rounded-lg">{{__('welcome.buyNow')}}</button>
                </div>
            </div>
            @endforeach
        </div>
    </div> 
</div>