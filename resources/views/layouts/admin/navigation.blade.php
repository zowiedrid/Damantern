<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('damantern_icon.png') }}" style="height: 16px" alt="logo" />
                        <!-- <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" /> -->
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                
                    @can('admin')
                        <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
                            {{ __('User') }}
                        </x-nav-link>
                
                        <x-nav-link :href="route('semuapresensi.index')" :active="request()->routeIs('semuapresensi.index')">
                            {{ __('Semua Presensi') }}
                        </x-nav-link>
                
                        <x-nav-link :href="route('semuarekap.index')" :active="request()->routeIs('semuarekap.index')">
                            {{ __('Semua Rekap') }}
                        </x-nav-link>
                
                        <x-nav-link :href="route('semuaizin.index')" :active="request()->routeIs('semuaizin.index')">
                            {{ __('Semua Izin') }}
                        </x-nav-link>
                    @endcan
                </div>
                            </div>

        
                <!-- Sidebar -->

            <!-- <aside class="fixed top-0 left-0 z-10 h-screen w-[calc(100%-3.73rem] border-r border-gray-300/40 bg-white dark:bg-gray-900 dark:border-gray-700 hover:w-56 hover:shadow-2xl">
                    <div class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-white">
                        <div class="text-gray-100 text-xl">
                            <div class="p-2.5 mt-1 flex items-center">
                                <a href="{{ route('dashboard') }}">
                                    <img src="#" alt="logo" srcset="">
                                </a>                                           
                            </div>
                        </div>
                        
                        <hr class="my-2 text-gray-600">                

                        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 
                        cursor-pointer hover:bg-gray-600 text-white">
                            <i class="bx bxs-home"></i>
                            <span class="text-[15px] ml-4 text-gray-200">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                    {{ __('Dashboard') }}
                                </x-nav-link>
                            </span>
                        </div>

                        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 
                        cursor-pointer hover:bg-gray-600 text-white">
                            <i class="bx bxs-data"></i>
                            <span class="text-[15px] ml-4 text-gray-200">
                                <x-nav-link :href="route('rekap.index')" :active="request()->routeIs('rekap.index')">
                                    {{ __('Rekap') }}
                                </x-nav-link>
                            </span>
                        </div>

                        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 
                        cursor-pointer hover:bg-gray-600 text-white">
                            <i class="bx bxs-pencil"></i>
                            <span class="text-[15px] ml-4 text-gray-200">
                                <x-nav-link class="text-white hover:bg-gray-600" :href="route('presensi.index')" :active="request()->routeIs('presensi.index')">
                                    {{ __('Presensi') }}
                                </x-nav-link>
                            </span>
                        </div>

                        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 
                        cursor-pointer hover:bg-gray-600 text-white">
                            <i class="bx bxs-plane"></i>
                            <span class="text-[15px] ml-4 text-gray-200">
                                <x-nav-link :href="route('izin.index')" :active="request()->routeIs('izin.index')">
                                    {{ __('Izin') }}
                                </x-nav-link>
                            </span>
                        </div>

                        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 
                        cursor-pointer hover:bg-gray-600 text-white">
                            <i class="bx bxs-user-circle"></i>
                            <span class="text-[15px] ml-4 text-gray-200">
                                <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')"> 
                                    {{ __('User') }}
                                </x-nav-link>
                            </span>
                        </div>
                    </div>
                </aside> -->
                    
                <!-- Sidebar -->
           
            

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

