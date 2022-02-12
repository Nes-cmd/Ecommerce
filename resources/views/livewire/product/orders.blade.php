<div class="p-4 bg-gray-200">
    <div>
        <div class="font-bold pb-3 md:pl-2 text-2xl">
            Orders that waits your descission!
        </div>
        @forelse($ordered as $key => $order)
        <div class=" grid grid-cols-1 md:grid-cols-2 mt-3  shadow-lg">
            <div class="pl-2">
                <div class="font-serif text-xl">Order from custmer {{$loop->index+1}}</div>
                @php($tot = 0)
                @foreach($order->product as $product)
                    <div class="flex flex-row">
                        <div class="flex flex-col">
                            <div><img src="{{ asset('storage/'.json_decode($product->photo_url)->photo_1) }}" class="w-28" alt=""></div>
                        </div>
                        <div class="flex flex-col pl-3">
                            <div>
                                <p><i class="text-red-400">{{ $product->name }}</i></p>
                            </div>
                            <div>
                                <p>Quantity Requested: <i>{{$product->quantity}}</i></p>
                            </div>
                            <div>
                                <p>Price of single item: <i>{{ $product->price }}</i></p>
                            </div>
                            <div>
                                <p>Total is: <i>{{ $product->price * $product->quantity}}</i></p>
                            </div>
                            @php($tot = $tot+$product->price * $product->quantity)
                        </div>
                    </div>
                @endforeach
                <div>
                    <p class="text-green-700 font-bold">Overall price <i>{{$tot}}</i></p>
                    <p>Transaction sent: <i>{{ $order->transaction_code }}</i></p>
                </div>
                <div>
                    <button class="bg-gray-400 rounded-lg w-48 mt-2">See all details of order</button>
                </div>
            </div>
            <div class="md:w-2/3">
                <div class="mt-3">
                    Do you received the payment which mach this request? Do you receive <b>{{$tot}}</b> birr with transaction code <b>{{ $order->transaction_code }}</b>?
                </div>
                <div class="m-3">Please give feedback here</div>
                <div class="mb-2">
                    <select wire:model.lazy="order.{{$order->id}}" class="w-full border h-10 pl-2 mb-3" name="" id="">
                        <option value="">Choose</option>
                        <option value="success">Successful payment</option>
                        <option value="not_readable">Unreadable</option>
                        <option value="incorrect">Incorrect transaction</option>
                        <option value="partial_payment">Not full payment</option>
                    </select>
                    @error("order.$order->id")
                        <span class="pl-2 text-red-400">{{ $message }}</span>
                    @enderror
                    <div class="bg-gray-800 h-10 text-center rounded text-white">
                        <button wire:click="submit({{$order->id}}, {{$loop->index}})" class="h-10 w-full" >Submit</button>
                    </div>
                </div>
                
                @if($order->status == 'success')
                    <div class="text-2xl font-bold">Ship to:-</div>
                @if($adress->has($order->id))
                <div class="mt-1">
                    <div>
                        <div class="pl-3">
                            <p>Region: {{ $adress[$order->id]['region'] }}</p> 
                            <p>Zone: {{$adress[$order->id]['zone'] }}</p> 
                            <p>street: {{ $adress[$order->id]['street'] }}</p> 
                            <p>Phone:  {{ $adress[$order->id]['phone'] }}</p> 
                        </div>
                        <div class="text-lg font-bold">
                            <label for="phone">Phone of deliverer</label>
                            <div class="flex flex-row">
                                <input wire:model.lazy="deliverer.{{$order->id}}" class="rounded-l-lg pl-2" id="phone" type="phone" placeholder="Delivery's phone number" autofocus>
                                <button wire:click="makeShipment({{$order->id}})" class="text-white bg-gray-800 pl-2 pr-2 rounded-r-lg text-sm">Make Shipment</button>
                            </div>
                            @error("deliverer.$order->id")
                                <span class="text-red-400">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                @else
                <div>
                    <button class="bg-gray-300 rounded p-2" wire:click="loadAdress({{$order->adress_id}}, {{$order->id}})">Load adress</button>
                </div>
                @endif
                @endif
            </div>
        </div>
        @empty
        <div class="font-serif text-3xl text-green-500">
            It seems you don't have no any orders! Refresh the page meanwhile!
        </div>
        @endforelse
        
    </div>
</div>