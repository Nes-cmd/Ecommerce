<nav class="bavbar">
    <div class="bg-gray-800 h-14 flex items-center">
        <div class="container flex md:flex-row justify-between items-center mx-auto h-10">
            <!-- Mobile menu button -->
           
            @auth
            <div class="md:hidden flex items-center">
                <button class="outline-none mobile-menu-button">
                    <svg class=" w-6 h-6 text-gray-500 hover:text-green-500"
                        x-show="!showMenu"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            @endauth
            <div class="text-3xl text-white">
                Logo
            </div>
            @livewire('search-bar')
            <div class="icons text-white flex items-center md:space-x-3">
                @livewire('customer.cart')
                @auth
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                           
                            <div class="focus:border-gray-300 bg-gray-500 rounded-full">
                                <button class="flex text-sm border-2 border-transparent focus:outline-none transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ asset('storage/'.Auth::user()->profile_photo_path) }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            </div>
                        </x-slot>
                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>


                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
                @else
                <div>
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                            </x-slot>
                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>
                                <x-jet-dropdown-link href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('register') }}">
                                    {{ __('Register') }}
                                </x-jet-dropdown-link>
                            </x-slot>
                        </x-jet-dropdown>
                </div>
                @endauth
            </div>
        </div>
    </div>
</nav>


@push('scripts')
<script>
    $(document).ready(function () {
        $('#select2').select2();
        $('#select2').on('change', function (e) {
            var item = $('#select2').select2("val");
            @this.set('viralSongs', item);
        });
    });
</script>
@endpush