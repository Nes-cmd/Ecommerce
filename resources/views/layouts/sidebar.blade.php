
<div class="sidebar hidden md:flex bg-gray-800 border-t border-gray-500 w-1/6 h-screen rounded-br-full">
    <div class="text-white">
        <div class="border-b border-gray-500">
            <div class="font-bild text-2xl mt-3 pl-1 mb-2 rounded-full bg-gray-700">
                {{__('main')}}
            </div>
            <div class="pl-5 mb-3 hover:text-yellow-500 items-center {{request()->routeIs('admin.dashboard')?'text-yellow-500':''}}">
                <a href="{{ route('admin.dashboard')}}" class="flex flex-row">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
                        </svg>
                    <h2 class="pl-2">{{__('sidebar.dashboard')}}</h2>
                </a>
            </div>
            <div class="pl-5 mb-3 flex hover:text-yellow-500 {{request()->routeIs('admin.manege-user')?'text-yellow-500':''}}">
                <a href="{{route('admin.manege-user')}}" class="flex flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <h3 href="" class="pl-2">{{__('sidebar.users')}}</h3>
                </a>
            </div>
        </div>
        <div class="border-b border-gray-600">
            <div class="font-bild text-2xl mt-3 pl-1 mb-2 rounded-full bg-gray-700">
                {{__('sidebar.products')}}
            </div>
            <div class="pl-5 mb-3 hover:text-yellow-500 {{request()->routeIs('product.main')?'text-yellow-500':''}}">
                <a href="{{ route('product.main')}}" class="flex ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
                        <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                    <h2 class="pl-2">{{__('sidebar.myProducts')}}</h2>
                </a>
            </div>
            <div class="pl-5 mb-3 hover:text-yellow-500 {{request()->routeIs('product.upload')?'text-yellow-500':''}}">
                <a href="{{ route('product.upload')}}" class="flex ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>
                    <h2 class="pl-2">{{__('sidebar.uploadProducts')}}</h2>
                </a>
            </div>
            <div class="pl-5 mb-3 flex hover:text-yellow-500 {{request()->routeIs('product.order')?'text-yellow-500':''}}">
                <a href="{{ route('product.order')}}" class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    
                    <h2 class="pl-2">
                        {{__('sidebar.orders')}}
                    </h2>
                </a>
            </div>
        </div>
        <div class="">
            <div class="font-bild text-2xl mt-3 pl-1 mb-2 rounded-full bg-gray-700">
                {{__('sidebar.others')}}
            </div>
            <div class="pl-5 mb-3 flex  hover:text-yellow-500 {{request()->routeIs('product.category')?'text-yellow-500':''}}">
                <a href="{{route('product.category')}}" class="flex flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                    </svg>
                <h3 class="pl-2">
                    {{__('sidebar.manageCategories')}}
                </h3>
               </a>
            </div>
            <div class="pl-5 mb-3 flex  hover:text-yellow-500 {{request()->routeIs('unknown')?'text-yellow-500':''}}">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="pl-2">
                    {{__('sidebar.addPhotos')}}
                </h3>
            </div>
            <div class="pl-5 mb-3 flex hover:text-yellow-500 {{request()->routeIs('unknown')?'text-yellow-500':''}}">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="pl-2">
                    {{__('sidebar.question')}}
                </h3>
            </div>
        </div>
    </div>
</div>
    <!-- Mobile menu options -->
<div class="flex md:hidden mobile-menu bg-gray-800 border-t border-gray-500 w-20 h-screen">
    <div class="text-white">
        <div class="border-b border-gray-500">
            <div class="font-bild text-xl mt-3 pl-1 mb-2 rounded-full bg-gray-700">
                {{__('sidebar.main')}}
            </div>
            <div class="pl-5 mb-3 hover:text-yellow-500 items-center {{request()->routeIs('admin.dashboard')?'text-yellow-500':''}}">
                <a href="{{ route('admin.dashboard')}}" class="flex flex-row">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
                        </svg>
                </a>
            </div>
            <div class="pl-5 mb-3 flex hover:text-yellow-500 {{request()->routeIs('admin.manege-user')?'text-yellow-500':''}}">
                <a href="{{route('admin.manege-user')}}" class="flex flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="border-b border-gray-600">
            <div class="font-bild text-xl mt-3 pl-1 mb-2 rounded-full bg-gray-700">
                {{__('sidebar.products') }}
            </div>
            <div class="pl-5 mb-3 hover:text-yellow-500 {{request()->routeIs('product.main')?'text-yellow-500':''}}">
                <a href="{{ route('product.main')}}" class="flex ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
                        <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            <div class="pl-5 mb-3 hover:text-yellow-500 {{request()->routeIs('product.upload')?'text-yellow-500':''}}">
                <a href="{{ route('product.upload')}}" class="flex ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>
                </a>
            </div>
            <div class="pl-5 mb-3 flex hover:text-yellow-500 {{request()->routeIs('product.order')?'text-yellow-500':''}}">
                <a href="{{ route('product.order')}}" class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="">
            <div class="font-bild text-xl mt-3 pl-1 mb-2 rounded-full bg-gray-700">
                {{__('sidebar.others')}}
            </div>
            <div class="pl-5 mb-3 flex  hover:text-yellow-500 {{request()->routeIs('product.category')?'text-yellow-500':''}}">
                <a href="{{route('product.category')}}" class="flex flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                    </svg>
               </a>
            </div>
            <div class="pl-5 mb-3 flex  hover:text-yellow-500 {{request()->routeIs('unknown')?'text-yellow-500':''}}">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </div>
            <div class="pl-5 mb-3 flex hover:text-yellow-500 {{request()->routeIs('unknown')?'text-yellow-500':''}}">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

