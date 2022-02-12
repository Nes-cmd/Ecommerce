
<div class="flex flex-row w-4/5">
    <x-slot name="header">
        {{ __('Category manager') }}
    </x-slot>

    <div class="p-6">
        <div>
            <h2 class="text-gray-600 text-2xl">You have these categories!</h2>
        </div>
        <div>
            <table class="table-auto bg-gray-300 rounded-lg flex-1 ">
                <tr>
                    <thead class="table-header-group border">
                        <th>Id</th>
                        <th>Name</th>
                        <th class="pr-4">Display on front page</th>
                        <th>Action</th>
                    </thead>
                </tr>
                <tbody class="">
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category['id'] }}</td>
                        <td class="px-2">
                            <input wire:model.lazy="categories.{{$category['id']-1}}.category_name" type="text" name="" id="" value="{{ $category['category_name']}}" class="bg-gray-200 pl-2" >
                        </td>
                        <td class="px-2 flex justify-center">
                            <input type="checkbox" wire:model="categories.{{$category['id']-1}}.onfront_page" class="h-6 w-8">
                        </td>
                        <td class="px-2">
                            <button wire:click="saveCategory({{$category['id']}})" class="text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                </svg>
                            </button>
                            <button class="text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="bg-gray-400 rounded-lg flex flex-row h-8 mt-3">
                <input wire:model.lazy="new_category" type="text" class="bg-gray-400 rounded-l-lg p-3 placeholder-gray-200" placeholder="Add category" autofocus>
                <button wire:click="addCategory" class="rounded-r-lg bg-gray-600 w-full">Add</button>
            </div>
        </div>
    </div>
</div>


