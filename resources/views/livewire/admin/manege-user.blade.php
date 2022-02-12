
<div class="flex flex-row w-4/5">
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-6">
        <div>
            <h2 class="text-gray-600 text-2xl">You have these stake holder under your bussiness!</h2>
        </div>
        <div>
            <table class="table-auto bg-gray-300 rounded-lg flex-1 ">
                <tr>
                    <thead class="table-header-group border">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Adress</th>
                        <th>Action</th>
                    </thead>
                </tr>
                <tbody class="">
                    @foreach($stakeholders as $stakeholder)
                    <tr>
                        <td>{{$stakeholder->id}}</td>
                        <td class="p-2">{{$stakeholder->name}}</td>
                        <td class="px-2">{{$stakeholder->email}}</td>
                        <td class="px-2">{{$stakeholder->phone}}</td>
                        <td class="px-2">{{'else'}}</td>
                        <td class="px-2 flex flex-row space-x-2">
                            <button wire:click="delete({{$stakeholder->id}})" class="text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                            <a href="{{ route('admin.edit', $stakeholder->id )}}"  class="text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
                            <button class="text-yellow-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                            </button>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


