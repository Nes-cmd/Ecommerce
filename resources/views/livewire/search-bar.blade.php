
<div class="flex justify-center h-10">
    <form wire:submit.prevent="search">
        @csrf
        <div class="flex">
            <select wire:model="selected_category" class="rounded-l-lg w-16 md:w-32 h-5 md:h-8  text-white bg-gray-500 ">
                <option value="0">All</option>    
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id}}">{{ $categorie->category_name}}</option>
                @endforeach
            </select>
            <input wire:model="query" wire:keydown="suggest" type="text" name="cafe"  placeholder="Search...." class="md:h-8 md:w-64 w-32 pl-2 bg-gray-500 placeholder-white text-white border-0" value="{{$query}}" autofocus>
            <button wire:click="search" type="button" class="bg-yellow-500  text-white rounded-r-lg md:h-8 pl-2 p-r-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </button>
        </div>
        <span id="cafelist">
           
            <ul class="text-white bg-gray-800 pl-2 rounded-b-lg" style="display:block;position:relative;">
            @foreach($results as $result)
                <li wire:click="setproduct('{{$result->name }}')">{{$result->name}}</li>
            @endforeach
            </ul> 
          
        </span>
    </form>
</div>
