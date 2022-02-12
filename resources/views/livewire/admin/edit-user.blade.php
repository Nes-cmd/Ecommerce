
<x-slot name="header">
Edit personal detail
</x-slot>

<div class="md:flex md:flex-row">
    <div class="flex-auto pl-6 my-6">
        <div class="flex-1 items-baseline">
            <form wire:submit.prevent="save">
                <div class="grid md:grid-cols-2 grid-cols-1">
                    <div class="w-full mr-2"> 
                        
                        <div class="w-full flex-none font-semibold mb-2.5">
                            <label for="name">Name: </label>
                            <input wire:model.lazy="user.name" type="text" id="name"  class="bg-gray-400 pl-2 rounded-lg h-8 w-full">
                            <span class="text-red-700">
                                @error('user.name')
                                    <p>{{ $message }}</p>
                                @enderror
                            </span>
                        </div>

                        <div class="w-full flex-none font-semibold mb-2.5">
                            <label for="name">Email: </label>
                            <input wire:model.lazy="user.email" type="text" id="name" class="bg-gray-400 pl-2 rounded-lg h-8 w-full">
                            <span class="text-red-700">
                                @error('user.email')
                                    <p>{{ $message }}</p>
                                @enderror
                            </span>
                        </div>

                        <div class="w-full flex-none font-semibold mb-2.5">
                            <label for="name">Phone: </label>
                            <input wire:model.lazy="user.phone" type="text" id="name" class="bg-gray-400 pl-2 rounded-lg h-8 w-full">
                            <span class="text-red-700">
                                @error('user.phone')
                                    <p>{{ $message }}</p>
                                @enderror
                            </span>
                        </div>
                        <div class="w-full flex-none font-semibold mb-2.5">
                            <label for="name">Registered at: </label>
                            <input wire:model.lazy="user.created_at" type="text" id="name" class="disable bg-gray-400 pl-2 rounded-lg h-8 w-full cursor-not-allowed" disabled>
                        </div>

                        <div class="w-full flex-none font-semibold mb-2.5">
                            <label for="name">Role: </label>
                            <input  type="text" id="name" value="{{$role->name}}" class="disable bg-gray-400 pl-2 rounded-lg h-8 w-full cursor-not-allowed" disabled>
                        </div>

                    </div>

                    <div class="ml-2">
                        <div class="font-bold pl-3 text-xl">
                            Permissions
                        </div>
                        @php($all = $allowed->has(1)?'disabled':'')
                        @foreach($permissions as $permission)
                        <div class="flex flex-row h-10 bg-gray-200 text-lg rounded-lg items-center font-bold mb-2.5 pl-2">
                           <div class="flex flex-row justify-between w-1/2">
                                <label class="" for="desc">{{$permission->permission_name}}: </label>
                                <input wire:model="allowed.{{$permission->id}}" value="{{$permission->id}}" {{ $permission->id == 1?'' : $all }} class="pl-2 h-10 w-7" type="checkbox">
                           </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex justify-end w-1/2 items-center">
                        <button class="bg-green-500 w-full h-8 rounded-lg">
                            Save changes
                        </button>
                    </div>
            </form>        
        </div>
    </div>
</div>
