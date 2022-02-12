
<x-slot name="header">
Detail
</x-slot>

<div class="md:flex md:flex-row">
    <div class="flex flex-row md:flex-col">
        @php($photos = json_decode($photo))
        @foreach($photos as $key => $img)
        {{$key}}
        <div class="flex w-60 h-40 relative hover:bg-red-600">
            <img wire:click="deletePhoto('{{$key}}')" src="{{ asset('storage/'. $img) }}" alt="" class="absolute w-40 h-30 rounded-lg hover:bg-red-600" />
        </div>
        @endforeach
    </div>
    <div class="flex-auto pl-6">
        <div class="flex-1 items-baseline">
            <form wire:submit.prevent="save">
                <div class="w-full flex-none font-semibold mb-2.5">
                    <label for="name">Name: </label>
                    <input wire:model.lazy="product.name" type="text" id="name" value="{{ $product['name'] }}" class="bg-gray-400 pl-2 rounded-lg h-8 w-full">
                    <span class="text-red-700">
                        @error('product.name')
                            <p>{{ $message }}</p>
                        @enderror
                    </span>
                </div>
                <div class="w-full flex flex-rows font-semibold mb-2.5">
                    <label for="desc">Photo:</label>
                    <input wire:model="images.0" type="file" class="bg-gray-400 pl-2 rounded-lg h-8 text-center w-1/2">
                    <input wire:model="images.1" type="file" class="bg-gray-400 pl-2 rounded-lg h-8 text-center w-1/2">
                    <input wire:model="images.2" type="file" class="bg-gray-400 pl-2 rounded-lg h-8 text-center w-1/2">
                    <span class="text-red-700">
                        @error('photo')
                            <p>{{ $message }}</p>
                        @enderror
                    </span>
                </div>
                <div class="w-full flex-none font-semibold mb-2.5">
                    <label for="desc">Descreption: </label>
                    <textarea wire:model.lazy="product.description" id="desc" value="" rows="4" class="bg-gray-400 pl-2 rounded-lg w-full">{{ $product['description'] }}</textarea>
                    <span class="text-red-700">
                        @error('product.description')
                            <p>{{ $message }}</p>
                        @enderror
                    </span>
                </div>
                <div class="w-full flex-none font-semibold mb-2.5">
                    <label for="desc">Price : </label>
                    <input wire:model.lazy="product.price" type="text" value="{{$product['price']}}" class="bg-gray-400 pl-2 rounded-lg h-8 text-center w-full">
                    <span class="text-red-700">
                        @error('product.price')
                            <p>{{ $message }}</p>
                        @enderror
                    </span>
                </div>
                <div class="w-full flex-none font-semibold mb-2.5">
                    <label for="desc">Operation: </label>
                    <textarea wire:model.lazy="product.operation" id="desc" value="" rows="4" class="bg-gray-400 pl-2 rounded-lg w-full">{{ $product['description'] }}</textarea>
                    <span class="text-red-700">
                        @error('product.operation')
                            <p>{{ $message }}</p>
                        @enderror
                    </span>
                </div>
                <div class="w-full flex h-10 bg-gray-400 text-lg rounded-lg items-center font-bold mb-2.5 pl-2">
                    <label class="" for="desc">In stock: </label>
                    <input wire:model="product.status" class="pl-2 h-10 w-7" type="checkbox">
                    <label class="pl-4" for="desc">Popular: </label>
                    <input wire:model="product.speciality" class="pl-2 h-10 w-7" type="checkbox" chacked="false">
                </div>
                <div>
                    <div class="space-x-2 flex font-semibold mb-2">
                        <label for="desc">Color: </label>
                        <input wire:model.lazy="color.0" class="w-9 h-9 flex items-center justify-center rounded-full text-white" name="size" type="color" value="xs">
                        <input wire:model.lazy="color.1" class="w-9 h-9 flex items-center justify-center rounded-full border-2 border-gray-200" name="size" type="color">
                        <input wire:model.lazy="color.2" class="w-9 h-9 flex items-center justify-center rounded-full border-2 border-gray-200" name="size" type="color" >
                        <input wire:model.lazy="color.3" class="w-9 h-9 flex items-center justify-center rounded-full border-2 border-gray-200" name="size" type="color" >
                        <input wire:model.lazy="color.4" class="w-9 h-9 flex items-center justify-center rounded-full border-2 border-gray-200" name="size" type="color" >
                    </div>                </div>                <div class="flex h-10 space-x-3">
                    <button class="w-1/2 flex items-center justify-center rounded-full bg-purple-700 text-white" type="submit">Save changes</button>
                </div>
            </form>        
        </div>
    </div>
</div>
