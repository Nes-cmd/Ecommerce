
<x-slot name="header">
    {{ __('proceed.yourCart') }}
</x-slot>

<div class="md:p-6 p-1">
    <div>
        <h2 class="text-gray-600 text-2xl">{{__('proceed.youChoose')}}</h2>
    </div>
    <div class="disable">
        <div class="md:flex">
            <table class="table-auto bg-gray-300 rounded-lg flex-1 ">
                <tr>
                    <thead class="table-header-group border">
                        <th class="flex justify-center">{{__('proceed.photo')}}</th>
                        <th>{{__('proceed.name')}}</th>
                        <th>{{__('proceed.price')}}(1)</th>
                        <th>{{__('proceed.quantity')}}</th> 
                        <th>{{__('proceed.Color')}}</th>
                        <th>{{__('proceed.totalPrice')}}</th>
                        <th>{{__('proceed.action')}}</th>
                    </thead>
                </tr>
                <tbody class="">
                    @php($items = 0)
                    @php($total = 0)
                    @foreach($cart as $product)
                    @php($items += $product['quantity'])
                    @php(($total += $product['quantity'] * $product['price'] ))
                    <tr>
                        <td class="md:px-2 md:w-32 w-full">
                            <img src="{{ asset('storage/'.json_decode($product['photo_url'])->photo_1)}}" class="rounded-lg w-32 h-28" alt="">
                        </td>
                        <td class="">{{ $product['name']}}</td>
                        <td class="md:px-2">{{$product['price'] }}</td>
                        <td class="px-2">
                            <input wire:model.lazy="cart.{{$product['id']}}.quantity" type="number" min="1" value="{{ $product['quantity']}}" class="w-20 text-center rounded-lg">
                        </td>
                        <td class="px-2">
                            <div class="space-x-2 flex text-sm font-medium">
                                @php($colors = json_decode($product['color']))
                                @if(isset($colors))
                                
                                @foreach($colors as $color)
                                <div class="h-6 w-6 rounded-lg flex justify-center items-center" style="background-color:{{$color}}">
                                    <input class="items-stretch" type="radio" name="color">
                                </div>
                                @endforeach
                                @else
                                <p>{{__('proceed.colorWill')}}</p>
                                @endif
                            </div>
                        </td>
                        <td class="px-2">{{ $product['quantity']* $product['price']}}</td>
                        <td class="px-2">
                            <button wire:click="removeCart({{$product['id']}})" class="text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                            <button class="text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </button>
                            <button class="text-yellow-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                   
                    @endforeach
                    <tr class="bg-purple-500 font-bold">
                        <td class="pl-4" colspan="3">
                            {{__('proceed.total')}}
                        </td>
                        <td colspan="2">
                            {{__('proceed.items')}} : {{$items}}
                        </td>
                        <td colspan="2">
                           {{__('proceed.total', ['total'=>$total])}}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="bg-gray-300 md:ml-3 rounded-lg md:w-1/3 mt-4 md:mt-0 ">
                <div class="pl-4 pr-4 mb-3">
                    <div class="text-lg font-semibold pl-4">
                        {{__('proceed.editLocation')}}: <h2 class="text-red-400 text-sm">{{__('proceed.note')}}!</h2>
                        @guest
                            <a href="{{ route('authenticate')}}" class="text-red-500 text-sm " >{{__('proceed.forBetter')}} <b class="text-blue-500">{{__('proceed.login')}} </b></a>
                        @endguest
                    </div>
                    <form action="">
                        <div class="pl-3 mt-2">
                            <label for="city">{{__('proceed.yourCity')}}:</label>
                            <input wire:model.lazy="adress.region" type="text" class="flex rounded placeholder-gray-400 pl-2 pr-2 ml-2 w-full" placeholder="Enter your city or Region" value="{{ $adress->region }}">
                            @error('adress.region')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="pl-3 mt-2">
                            <label for="city">{{__('proceed.yourZone')}}:</label>
                            <input wire:model.lazy="adress.zone" type="text" id="city" class="flex rounded placeholder-gray-400 pl-2 pr-2 ml-2 w-full" placeholder="Zone" value="{{ $adress->zone }}">
                            @error('adress.zone')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="pl-3 mt-2">
                            <label for="city">{{__('proceed.street1')}}:</label>
                            <input wire:model.lazy="adress.street" type="text" id="city" class="flex rounded placeholder-gray-400 pl-2 pr-2 ml-2 w-full" placeholder="Street 1" value="{{ $adress->street }}">
                            @error('adress.street')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="pl-3 mt-2">
                            <label for="city">{{__('proceed.street2')}}:</label>
                            <input wire:model.lazy="adress.street_2" type="text" id="city" class="flex rounded placeholder-gray-400 pl-2 pr-2 ml-2 w-full" placeholder="Street 2" value="{{ $adress->street_2 }}">
                            @error('adress.streer_2')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="pl-3 flex flex-row h-8 mt-2">
                            <label for="city" class="w-24">{{__('proceed.zipCode')}}:</label>
                            <input wire:model.lazy="adress.zipcode" type="text" id="city" class="flex rounded placeholder-gray-400 pl-2 w-1/2" placeholder="Zip code" value="{{ $adress->zipcode }}">
                            <input wire:model.lazy="adress.posta_number" type="text" id="city" class="flex rounded placeholder-gray-400 pl-2 pr-2 ml-2 w-1/2" placeholder="Po Box" value="{{ $adress->posta_number }}">
                        </div>
                        <p class="">
                            @error('adress.zipcode')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                            @enderror
                            @error('adress.posta_number')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                            @enderror
                        </p>
                        <div class="pl-3 mt-2">
                            <label for="city">{{__('proceed.phone')}}:</label>
                            <input wire:model.lazy="adress.phone" type="phone" id="city" class="flex rounded placeholder-gray-400 pl-2 pr-2 ml-2 w-full" placeholder="Phone number" value="{{ $adress->phone }}">
                            @error('adress.phone')
                                <span class="text-red-500">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="pl-3 mt-4 flex justify-center items-center w-full">
                            <button wire:click="saveAdress" type="button" id="city" class="flex rounded items-center justify-center bg-green-400 h-8 pl-2 pr-2 ml-2 w-1/2" >{{__('proceed.saveAddress')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-r from-red-400 to-blue-600 h-10 mt-2 w-1/3 rounded-lg flex justify-center items-center ml-10">
            <button wire:click="proceed" class="w-full flex justify-center">
                {{__('proceed.proceed')}}
            </button>
        </div>
    </div>
    @if($proceeded)
    <div class="flex flex-col bg-gray-300 mt-10 w-full rounded-lg">
        <div class="mb-2">
            <div class="text-center text-2xl">
                {{__('proceed.readCarefuly')}}!
            </div>
            <div class="flex">
                <div  wire:click="setPaymentMethod(1)" class="w-24 h-16 md:h-32 md:w-40 ml-2 rounded-lg text-red-400">
                    <img src="{{ asset('images/digital_wallets_logo/bank.jpg')}}" class="rounded-lg md:h-32 h-16" alt="">
                </div> 
                <div wire:click="setPaymentMethod(2)" class="w-24 h-16 md:h-32 md:w-40 ml-2 rounded-lg text-red-400">
                    <img src="{{ asset('images/digital_wallets_logo/telebirr.jpg')}}" class="rounded-lg md:h-32 h-16" alt="">
                </div> 
                <div wire:click="setPaymentMethod(3)" class="w-24 h-16 md:h-32 md:w-40 ml-2 rounded-lg text-red-400">
                    <img src="{{ asset('images/digital_wallets_logo/mbirr.jpg')}}" class="rounded-lg md:h-32 h-16" alt="">
                </div> 
                <div wire:click="setPaymentMethod(4)" class="w-24 h-16 md:h-32 md:w-40 ml-2 rounded-lg text-red-400">
                    <img src="{{ asset('images/digital_wallets_logo/amole.jpg')}}" class="rounded-lg md:h-32 h-16" alt="">
                </div> 
                <div class="w-24 h-16 md:h-32 md:w-40 ml-2 rounded-lg text-red-400">
                    <img src="{{ asset('images/digital_wallets_logo/cbe.jpg')}}" class="rounded-lg md:h-32 h-16" alt="">
                </div> 
            </div>
            <!-- Alla then -->
        </div>
        <div class="mt-3">
            <h2 class="bg-gradient-to-l from-red-400 to-purple-700 text-xl rounded font-semibold p-3">{{__('proceed.instructionFor')}} {{$paymentMethod->method_name}}</h2>
            <div class="bg-gray-400 pl-6 pr-3 rounded-b-lg">
                
                <h2>1 {{$paymentMethod->first_instruction}}</h2>
                <p>2 {{__('proceed.transfer',  ['ammount' => $total])}}</p>
                @foreach(json_decode($paymentMethod->second_instruction) as $instruction)
                    <p class="pl-3">{{$instruction}}</p>
                @endforeach
                <p>3  {{__('proceed.enterTxn')}}:<input type="text" wire:model.lazy="order.transaction_code" class="rounded-sm placeholder-red-300 pl-2 pr-2" placeholder="Transaction code (Mandatory)" autofocus ></p>
                @error('order.transaction_code') 
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
                <p class="text-red-500">4 {{__('proceed.doubleCheck')}}!</p>
                <p>5 {{__('proceed.uploadPhoto')}} <input wire:model.lazy="order.transaction_photo" type="file" class></p>   
                @error('order.transaction_photo') 
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
                
                <p>6 {{__('proceed.email')}}: <input wire:model.lazy="order.contact_with" class="rounded-sm mb-2 pl-2 placeholder-red-300" placeholder="Enter email" autofocus type="email"></p>
                @error('order.contact_with') 
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
                
                <div class="flex ml-5 md:w-2/3">
                    <button wire:click="placeOrder" class="bg-gradient-to-r from-pink-500 to-green-600 h-10 w-1/3 rounded-lg">{{__('proceed.placeOrder')}}</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

