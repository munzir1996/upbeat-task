<div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>

{{-- right-0 --}}
<div :class="sidebarOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'" class="fixed inset-y-0 z-30 overflow-y-auto transition duration-300 transform bg-white border-l w-60 lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center mt-8">
        <div class="flex items-center">
            {{-- <img src="/assets/images/logo.svg" class="h-7" alt="logo"> --}}

            <span class="mx-4 text-xl font-semibold text-gray-700 ">Online Car Store</span>
        </div>
    </div>

    <nav class="mt-10">
        <a class="flex items-center px-6 py-2 mt-4 {{ Request::is('admin') ? 'text-gray-600 bg-gray-300 bg-opacity-25' : 'text-gray-500 hover:bg-gray-300 hover:bg-opacity-25 hover:text-gray-600' }}" href="/">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
            </svg>

            <span class="mx-3 font-semibold">{{__('sidebar.Dashboard')}}</span>
        </a>

        <a class="flex items-center px-6 py-2 mt-4 {{ Request::is('admin/stores*') ? 'text-gray-600 bg-gray-300 bg-opacity-25' : 'text-gray-500 hover:bg-gray-300 hover:bg-opacity-25 hover:text-gray-600' }}" href="{{route('stores.index')}}">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
            </svg>

            <span class="mx-3 font-semibold">{{__('store.Store')}}</span>
        </a>

        <a class="flex items-center px-6 py-2 mt-4 {{ Request::is('admin/categories*') ? 'text-gray-600 bg-gray-300 bg-opacity-25' : 'text-gray-500 hover:bg-gray-300 hover:bg-opacity-25 hover:text-gray-600' }}" href="{{route('categories.index')}}">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
            </svg>

            <span class="mx-3 font-semibold">Category</span>
        </a>

        <div x-data="{ open: false }" class="mt-4">
            <button @click="open = !open" class="flex items-center justify-between w-full px-6 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
                <span class="flex items-center">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>

                    <span class="mx-4 font-medium">Sub links</span>
                </span>

                <span>
                    <svg class="w-4 h-4 transform rotate-180" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </span>
            </button>

            <div x-cloak
                x-show="open"
                x-transition:enter="transition ease-out duration-150 transform"
                x-transition:enter-start="opacity-0 -translate-y-5"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150 transform"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-5"
                class="bg-gray-100"
            >
                <a class="block px-16 py-2 text-sm text-gray-600 hover:bg-green-500 hover:text-white" href="#">Manage Accounts</a>
                <a class="block px-16 py-2 text-sm text-gray-600 hover:bg-green-500 hover:text-white" href="#">Manage Tickets</a>
            </div>
        </div>
    </nav>
</div>
