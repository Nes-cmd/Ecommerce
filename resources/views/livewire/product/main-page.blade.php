<div>
    <x-slot name="header">
        {{ __('All products you have') }}
    </x-slot>

    <div class="p-6">
        <div>
            <h2 class="text-gray-600 text-2xl">You have these trends!</h2>
        </div>
        <div class="flex-1 w-full">
            <table class="table-auto bg-gray-300 rounded-lg ">
                <tr>
                    <thead class="table-header-group border">
                        <th class="p-2">Id</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Detail</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Action</th>
                    </thead>
                </tr>
                <tbody class="">
                    @forelse($products as $product)
                    <tr>
                        <td class="pl-2">{{ $product->id }}</td>
                        <td class="px-2">
                            <img src="{{ asset('storage/'.json_decode($product->photo_url)->photo_1)}}" class="rounded-lg w-32 h-28" alt="">
                        </td>
                        <td class="px-2">{{ $product->name}}</td>
                        <td class="px-2">{{ $product->description}}</td>
                        <td class="px-2">{{ number_format($product->price, 2)}}</td>
                        <td class="px-2">{{ $product->category_id}}</td>
                        <td class="px-2">
                            <button wire:click="delete({{$product->id}})" class="text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                            <a href="{{ route('product.edit', $product->id ) }}" class="text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
                           
                        </td>
                    </tr>
                    @empty
                    <h2>You Don't hve any post. to upload new <a href="{{ route('product.upload')}}">click this</a></h2>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
