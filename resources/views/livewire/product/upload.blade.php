<div>
    <x-slot name="header">
        My Products
    </x-slot>
    
        <div class="pl-8 pt-8">
            <div class="bg-blue-300 lg:w-2/3 items-center rounded-2xl p-5 pt-0">
                <div class="pb-3 pt-6">
                    <div class="flex flex-row">
                        <input type="text" class="h-8 px-2 rounded-l-lg" wire:model="newCategory" placeholder="Add ategory">
                        <button wire:click="addCategory()" class="text-gray-300 bg-gray-800 w-14 rounded-r-lg">Add</button>
                    </div>
                </div>
                <div class="pb-3">
                    <input class="bg-gray-600 h-12 w-full rounded-2xl text-white px-2 placeholder-gray-400" wire:model="name" placeholder="Name of product" type="text">
                    <span class="text-red-600">
                        @error('name')
                            <h2>{{ $message }}</h2>
                        @enderror
                    </span>
                </div>
                <div class="pb-3">
                    <input class="bg-gray-600 h-12 w-full rounded-2xl text-white px-2 placeholder-gray-400" wire:model="price" placeholder="Price of product" type="number">
                    <span class="text-red-600">
                        @error('price')
                            <h2>{{ $message }}</h2>
                        @enderror
                    </span>
                </div>
                <div class="pb-3">
                    <input class="bg-gray-600 h-12 w-full rounded-2xl text-white px-2 placeholder-gray-400" wire:model="manufacturer" placeholder="Manufacturer" type="text">
                    <span class="text-red-600">
                        @error('manufacturer')
                            <h2>{{ $message }}</h2>
                        @enderror
                    </span>
                </div>
                <div class="pb-3">
                    <select class="bg-gray-600 h-12 w-full rounded-2xl text-gray-400 px-2" wire:model="category_id">
                        <div class="bg-gray-200 text-gray-300">
                            @forelse($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @empty
                                <option value="">Please add atleast 1 category</option>
                            @endforelse
                        </div>
                    </select>
                    <span class="text-red-600">
                        @error('category_id')
                            <h2>{{ $message }}</h2>
                        @enderror
                    </span>
                </div>
                
                <div class="pb-3">
                    <textarea wire:model="description" name="" id="" rows="4" class="bg-gray-600 w-full rounded-2xl text-white px-2 placeholder-gray-400" placeholder="Detail about product"></textarea>
                    <span class="text-red-600">
                        @error('description')
                            <h2>{{ $message }}</h2>
                        @enderror
                    </span>
                </div>
                <div class="pb-3">
                    <textarea wire:model="operation" name="" id="" rows="4" class="bg-gray-600 w-full rounded-2xl text-white px-2 placeholder-gray-400" placeholder="Working operation (Optional)"></textarea>
                    <span class="text-red-600">
                        @error('operation')
                            <h2>{{ $message }}</h2>
                        @enderror
                    </span>
                </div>
                <div class="pb-3 h-18">
                    <div class="items-center flex bg-gray-600 h-12 rounded-2xl">
                        <label for="photo" class="text-white pl-2">Photo</label>
                        <input wire:model="photo_url" type="file" class=" w-full text-white px-2" id="photo">
                    </div>
                    <span class="text-red-600">
                        @error('photo_url')
                            <h2>{{ $message }}</h2>
                        @enderror
                    </span>
                    @if($photo_url)<img width="400" height="300" src="{{$photo_url->temporaryUrl()}}" alt="">@endif
                </div>
                <div class="flex justify-end">
                    <button wire:click="addProduct" class="bg-green-600 h-12 w-1/3 rounded-2xl self-start text-white">
                        Save 
                    </button>
                </div>
            </div>
        </div>
</div>
