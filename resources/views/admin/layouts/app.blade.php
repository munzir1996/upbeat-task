<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        @include('admin.includes.head')
    </head>
    <body>
        <div x-data="{ sidebarOpen: false }" class="relative flex h-screen bg-gray-100 font-cairo" dir="ltr">
            @include('admin.includes.sidebar')

            <div class="flex flex-col flex-1 overflow-hidden">
                @include('admin.includes.header')

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 ">
                    <div class="container px-6 py-8 mx-auto">
                        @yield('body')
                    </div>
                </main>

            </div>
        </div>

        <!-- Scripts -->
        @include('admin.includes.scripts')
        @include('admin.includes.messages')
    </body>
</html>



