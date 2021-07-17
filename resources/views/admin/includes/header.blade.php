<header class="flex items-center justify-between px-6 py-6 bg-white border-b border-gray-200">
    <div class="flex items-center">
        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>

    <div class="flex items-center">

        <div x-cloak class="relative">
            @if (App::isLocale('en'))
            <a href="{{url('/locale', 'ar')}}" class="flex mx-4 text-primary focus:outline-none">
                AR
            </a>
            @else
            <a href="{{url('/locale', 'en')}}" class="flex mx-4 text-primary focus:outline-none">
                EN
            </a>
            @endif

        </div>

        <div x-cloak x-data="{ dropdownOpen: false }"  class="relative">
            <button @click="dropdownOpen = ! dropdownOpen" class="flex items-center text-gray-600 focus:outline-none">

                <span class="mx-1.5">{{Auth::user()->name}}</span>

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>

            <div x-show="dropdownOpen" @click="dropdownOpen = false"  class="fixed inset-0 z-10 w-full h-full"></div>

            {{-- left-0 --}}
            <div
                x-show="dropdownOpen"
                x-transition:enter="transition ease-out duration-400 transform"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-300 transform"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute right-0 z-10 w-48 mt-2 overflow-hidden bg-white rounded-md shadow-xl">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary hover:text-white">
                    Profile
                </a>
                {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary hover:text-white">المنتجات</a> --}}
                <form id="logout-form" action="{{ route('dashboard.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="{{route('dashboard.logout')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary hover:text-white"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{__('header.Logout')}}
                </a>
            </div>
        </div>
    </div>
</header>
