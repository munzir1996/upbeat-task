<div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>

{{-- right-0 --}}
<div :class="sidebarOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'" class="fixed inset-y-0 z-30 right-0 overflow-y-auto transition duration-300 transform bg-white border-l w-60 lg:translate-x-0 lg:static lg:inset-0">
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

        <a class="flex items-center px-6 py-2 mt-4 {{ Request::is('admin/cars*') ? 'text-gray-600 bg-gray-300 bg-opacity-25' : 'text-gray-500 hover:bg-gray-300 hover:bg-opacity-25 hover:text-gray-600' }}" href="{{route('cars.index')}}">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
            </svg>

            <span class="mx-3 font-semibold">Car</span>
        </a>


    </nav>
</div>
